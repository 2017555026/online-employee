
<?php include("includes/connect_mysql.php"); ?>
<?php include("includes/functions.php"); ?>
<?php
	session_start();
	if(isset($_GET["choose"]))
	{
		$id = $_GET["choose"];
	}
	$choose = $_SESSION['choose'];
	$table_name = $_SESSION['table_name'];
	if(!isset($_SESSION['id']) && !isset($table_name))
	{
		die("Bir hata oluştu");
	}
	if(isset($_POST["update"]))
	{
		$position = $_POST["position"];
		$monthly_salary = $_POST["monthly_salary"];
		$status = $_POST["status"];
		$contract = $_POST["contract"];
		$result = UpdateEmployee($id, $position, $contract, $monthly_salary, $status, $table_name);
		if(mysqli_affected_rows($con) == 1)
		{
			unset($_SESSION['id']);
			header("Location:admin_show_employee.php?choose=$choose");
		}
		else
		{
			echo "Bilgiler güncellenmedi..! Lütfen daha sonra tekrar deneyiniz.".mysqli_error($con);
		}
	}
	if(isset($_POST["reset"]))
	{
		header("Location:edit_employee.php?choose=$id");
	}
	if(isset($_POST["back"]))
	{
		header("Location:admin_show_employee.php?choose=$choose");
	}
?>
<?php include("includes/admin_header.php"); ?>
			<table id="structure">
					<tr>
						<td id="navigation">
							<div id="menu">
								<ul>
									<li><a href="admin_content.php">Profil Sayfası</a></li>
									<li><a class="active" href="admin_departments.php">Departmanlar</a></li>
									<li><a href="add_employee.php">Yeni çalışan ekle</a></li>
									<li><a href="users.php">Kullanıcılar</a></li>
									<li><a href="register1.php">Kullanıcı ekle</a></li>
									<li><a href="main.php">Çıkış</a></li>								
								</ul>
							</div>
						</td>					
						<td id="page">
							<?php
								$result = GetEmployee($table_name, $id);
								$rows = mysqli_fetch_array($result);
								echo "<h2>".$rows[1]." ".$rows[2]." Çalışanının Bilgileri</h2>";
							?>
							<form action="edit_employee.php?choose=<?php echo $rows[0]; ?>" method="post">
								<table id="tablo">
									<tr> 
										<td><li> Çalışan Adı : </li></td>
										<td><?php echo $rows[1]; ?></td>
									</tr>
									<tr>
										<td><li> Çalışan Soyadı : </li></td>
										<td><?php echo $rows[2]; ?></td>
									</tr>
									<tr>
										<td><li> TC Kimlik Numarası : </li></td>
										<td><?php echo $rows[3]; ?></td>
									</tr>
									<tr>
										<td><li> Pozisyon : </li></td>
										<td><input type="text" value="<?php echo $rows[4]; ?>" required placeholder="" name="position" id="position"/></td>
									</tr>
									<tr>
										<td><li> İşe Başlama Tarihi : </li></td>
										<td><?php echo $rows[5]; ?></td>
									</tr>
									<tr>
										<td><li> SGK Sicil No : </li></td>
										<td><?php echo $rows[6]; ?></td>
									</tr>
									<tr>
										<td><li> Sözleşme Durumu : </li></td>
										<td>
											<select name="contract">
												<option value="<?php echo $rows[7]; ?>" selected><?php echo $rows[7]; ?></option>
												<?php
													if($rows[7] == "6 ay")
													{
														echo "<option value='1 yıl'>1 yıl</option>";
														echo "<option value='3 yıl'>3 yıl</option>";
														echo "<option value='Yok'>Sözleşme Yok</option>";
													}
													else if($rows[7] == "1 yıl")
													{
														echo "<option value='6 ay'>6 ay</option>";
														echo "<option value='3 yıl'>3 yıl</option>";
														echo "<option value='Yok'>Sözleşme Yok</option>";
													}
													else if($rows[7] == "3 yıl")
													{
														echo "<option value='6 ay'>6 ay</option>";
														echo "<option value='1 yıl'>1 yıl</option>";
														echo "<option value='Yok'>Sözleşme Yok</option>";
													}
													else
													{
														echo "<option value='6 ay'>6 ay</option>";
														echo "<option value='1 yıl'>1 yıl</option>";
														echo "<option value='3 yıl'>3 yıl</option>";
													}
												?>
											</select>
										</td>
									</tr>
									<tr>
										<td><li> Aylık Maaşı : </li></td>
										<td><input type="number" value="<?php echo $rows[8]; ?>" required placeholder="" name="monthly_salary" id="monthly_salary"/> TL</td>
									</tr>
									<tr>
										<td><li> Çalışma Durumu : </li></td>
										<td>
											<select name="status">
											<?php
												$result = GetStatus();
												$count = 0;
												while($rows2 = mysqli_fetch_array($result))
												{
													if($rows[9] == $rows2["statuscode"])
														echo "<option value='$count' selected>".$rows2["status_info"]."</option>";
													else
														echo "<option value='$count'>".$rows2["status_info"]."</option>";
													$count++;
												}
											?>
											</select>
										</td>
									</tr>
								</table>
								<input type="submit" value="Bilgileri Güncelle" name="update" id="update" onClick="return UpdateEmployeeControl()" />
								<input type="submit" value="Değişiklikleri Sıfırla" name="reset" id="reset"/>
								<input type="submit" value="Geri" name="back" id="back"/>
							</form>
						</td>
					</tr>
			</table>
<?php include("includes/footer.php"); ?>