
<?php include("includes/connect_mysql.php"); ?>
<?php include("includes/functions.php"); ?>
<?php
	session_start();
	if(isset($_POST["login"]))
	{
		$tckn = $_POST["tckn"];
		$password = $_POST["sifre"];
		$result = GetUser($tckn, $password);
		if(mysqli_num_rows($result) == 1)
		{
			$rows = mysqli_fetch_array($result);
			$_SESSION['name'] = $rows["k_ad"];
			$_SESSION['surname'] = $rows["k_soyad"];
			$_SESSION['tckn'] = $rows["TCKN"];
			$_SESSION['department_id'] = $rows["departman_id"];
			if($rows["rol_id"] == 1)
				header("Location:admin_content.php");
			else
				header("Location:user_content.php");
		}
		else
		{
			if($tckn == null || $password == null)
				header("Location:login.php?error=2");
			else
				header("Location:login.php?error=1");
		}
	}
?>
<?php include("includes/header.php"); ?>
			<table id="structure">
				<tr>
					<td id="navigation">
						<div id="menu">
							<ul>
								<li><a href="main.php">Anasayfa</a></li>
								<li><a href="about.php">Hakkında</a></li>
							</ul>
						</div>
					</td>
					<td id="page">
						<h2>Giriş Yap</h2>
						<form action="login.php" method="post" autocomplete="off">
							<p>TCKN: 
								<input type="text" name="tckn" id="tckn" maxlength="11" />
							</p>
							<p>Şifre: 
								<input type="password" name="sifre" placeholder="" id="sifre" />
							</p>
							<p>
								<input type="submit" name="login" value="Giriş" id="login" />
							</p>
							<p>
							<?php 
							if(isset($_GET["error"]))
							{
								if($_GET["error"] == 1) 
									echo "Girdiğiniz bilgiler doğru değil..!"; 
								else if($_GET["error"] == 2)
									echo "Lütfen alanları doldurunuz..!";
							} ?> </p>					
						</form>
					</td>
				</tr>
			</table>
<?php include("includes/footer.php"); ?>
