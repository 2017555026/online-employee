
<?php include("includes/connect_mysql.php"); ?>
<?php include("includes/functions.php"); ?>
<?php
	session_start();
	if(isset($_POST["submit"]))
	{
		if($_POST["tckn"] != null)
		{
			$tckn = $_POST["tckn"];
			$department_id = $_POST["department_id"];
			$_SESSION['department_id'] = $department_id;
			$result1 = GetUserSSN();
			while($rows1 = mysqli_fetch_array($result1))
			{
				if($rows1[0] == $tckn)
					break;
			}
			if($rows1["TCKN"] == $tckn)
				header("Location:register1.php?error=2");
			else
			{
				$result2 = GetTableByDepartmentID($department_id);
				if(mysqli_num_rows($result2) == 1)
				{
					$rows2 = mysqli_fetch_array($result2);
					$table_name = $rows2["tablo_ad"];
					$result3 = GetEmployees($table_name);
					while($rows3 = mysqli_fetch_array($result3))
					{
						if($rows3["TCKN"] == $tckn)
							break;
					}
					if($rows3["TCKN"] == $tckn)
					{
						$_SESSION['employee'] = $rows3;
						header("Location:register2.php");
					}
					else
						header("Location:register1.php?error=1");
				}
				else
					die("Sorgu hatası");
			}
		}
		else
			header("Location:register1.php?error=3");
	}
?>
<?php include("includes/admin_header.php"); ?>
			<table id="structure">
				<tr>
					<td id="navigation">
						<div id="menu">
							<ul>
								<li><a href="admin_content.php">Profil Sayfası</a></li>
								<li><a href="admin_departments.php">Departmanlar</a></li>
								<li><a href="add_employee.php">Yeni çalışan ekle</a></li>
								<li><a href="users.php">Kullanıcılar</a></li>
								<li><a class="active" href="register1.php">Kullanıcı ekle</a></li>
								<li><a href="main.php">Çıkış</a></li>								
							</ul>
						</div>
					</td>				
					<td id="page">
						<h2><font face="tahoma" size="6" color="maroon">Kullanıcı ekle</font></h2>
						<form action="register1.php?error=0" method="post" autoComplete="off">
							<table>
								<tr>
									<td>Çalışanın TC kimlik numarasını giriniz: 
										<input type="text" name="tckn" value="" id="tckn" maxlength="11" />
									</td>
								</tr>
								<tr>
									<td>Çalıştığı departmanı seçiniz: 
										<select name="department_id">
										<?php
											$result = GetDepartments();
											$count = 1;
											while($rows = mysqli_fetch_array($result))
											{
												echo "<option value='$count'>".$rows["departman_ad"]."</option>";
												$count++;
											}
										?>
										</select>
									</td>
								</tr>
								<tr>
									<td><input type="submit" name="submit" id="submit" value="Kaydet" /></td>
								</tr>
								<tr>
									<?php
										if(isset($_GET["error"]))
										{
											if($_GET["error"] == 1)
												echo "<p>Girilen bilgilere uygun bir kayıt bulunamadı..!</p>";
											else if($_GET["error"] == 2)
												echo "<p>Girilen TC numarasına ait bir kullanıcı zaten mevcut..!</p>";
											else if($_GET["error"] == 3)
												echo "<p>Lütfen bir TC Kimlik numarası giriniz..!</p>";
										}
									?>
								</tr>
							</table>
						</form>
					</td>
				</tr>
			</table>
<?php include("includes/footer.php"); ?>
