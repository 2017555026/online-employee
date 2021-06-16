
<?php include("includes/connect_mysql.php"); ?>
<?php include("includes/functions.php"); ?>
<?php
	session_start();
	$employee = $_SESSION['employee'];
	$department_id = $_SESSION['department_id'];
	if(isset($_POST["create"]))
	{
		$password = $_POST["sifre"];
		$role = $_POST["rol_id"];
		$result = AddUser($employee, $password, $role, $department_id);
		if($result)
		{
			unset($_SESSION['employee']);
			header("Location:admin_content.php?message=1");
		}
		else
			echo "Kullanıcı oluşturulamadı. Lütfen tekrar deneyiniz!";
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
						<form action="register2.php" method="post">
							<p><?php echo $employee["ad"]." ".$employee["soyad"]." çalışanı için bir şifre belirleyiniz;"?></p>
							<table>
								<tr>
									<td>Şifre: 
										<input type="password" name="sifre" placeholder="" id="sifre" />
									</td>
								</tr>
								<tr>
									<td>Bir rol seçiniz: 
										<select name="rol_id">
										<?php
											$result = GetRoles();
											$count = 1;
											while($rows = mysqli_fetch_array($result))
											{
												echo "<option value='$count'>".$rows["rol_ad"]."</option>";
												$count++;
											}
										?>
										</select>
									</td>
								</tr>
								<tr>
									<td><input type="submit" name="create" id="create" value="Oluştur" /></td>
								</tr>
							</table>
						</form>
					</td>
				</tr>
			</table>
<?php include("includes/footer.php"); ?>
