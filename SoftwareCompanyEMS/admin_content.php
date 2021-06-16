
<?php include("includes/connect_mysql.php"); ?>
<?php include("includes/functions.php"); ?>
<?php
	session_start();
	$department_id = $_SESSION['department_id'];
	$tckn = $_SESSION['tckn'];
	$result2 = GetDepartment($department_id);
	if(mysqli_num_rows($result2) == 1)
	{
		$rows2 = mysqli_fetch_array($result2);
		$table_name = $rows2["tablo_ad"];
		$result3 = GetEmployeeByTCKN($table_name, $tckn);
		if(mysqli_num_rows($result3) == 1)
		{
			$rows3 = mysqli_fetch_array($result3);
			$id = $rows3["id"];
		}
	}
	if(isset($_GET["message"]))
	{
		if($_GET["message"] == 1)
			echo "Kullanıcı başarılı bir şekilde oluşturuldu.";
		elseif($_GET["message"] == 2)
			echo "Yeni çalışan başarıyla eklendi.";
	}
?>
<?php include("includes/admin_header.php"); ?>
			<table id="structure">
				<tr>
					<td id="navigation">
						<div id="menu">
							<ul>
								<li><a class="active" href="admin_content.php">Profil Sayfası</a></li>
								<li><a href="admin_departments.php">Departmanlar</a></li>
								<li><a href="add_employee.php">Yeni çalışan ekle</a></li>
								<li><a href="users.php">Kullanıcılar</a></li>
								<li><a href="register1.php">Kullanıcı ekle</a></li>
								<li><a href="main.php">Çıkış</a></li>								
							</ul>
						</div>
					</td>				
					<td id="page">
						<h2><font face="tahoma" size="6" color="maroon">Profil Bilgileriniz</font></h2>
						<?php
							$result = GetEmployee($table_name, $id);
							$rows = mysqli_fetch_array($result);
						?>
						<table id="tablo2">
							<tr>
								<div id="image4">
									<img src="pictures/profil.jpg" />
								</div><br>
							</tr>
							<tr> 
								<td><li> Adınız : </li></td>
								<td><?php echo $rows[1]; ?></td>
							</tr>
							<tr>
								<td><li> Soyadınız : </li></td>
								<td><?php echo $rows[2]; ?></td>
							</tr>
							<tr>
								<td><li> TC Kimlik Numaranız : </li></td>
								<td><?php echo $rows[3]; ?></td>
							</tr>
							<tr>
								<td><li> Pozisyon : </li></td>
								<td><?php echo $rows[4]; ?></td>
							</tr>
							<tr>
								<td><li> İşe Başlama Tarihiniz : </li></td>
								<td><?php echo $rows[5]; ?></td>
							</tr>
							<tr>
								<td><li> SGK Sicil Numaranız : </li></td>
								<td><?php echo $rows[6]; ?></td>
							</tr>
							<tr>
								<td><li> Sözleşme Durumu : </li></td>
								<td><?php echo $rows[7]; ?></td>
							</tr>
							<tr>
								<td><li> Aylık Maaşınız : </li></td>
								<td><?php echo $rows[8]; ?>TL</td>
							</tr>
							<tr>
								<td><li> Çalışma Durumu : </li></td>
								<td>
									<?php
										$result4 = GetStatus();
										while($rows4 = mysqli_fetch_array($result4))
										{
											if($rows4["statuscode"] == $rows[9])
											{
												echo $rows4["status_info"];
												break;
											}
										}
									?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
<?php include("includes/footer.php"); ?>
