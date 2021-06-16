
<?php include("includes/connect_mysql.php"); ?>
<?php include("includes/functions.php"); ?>
<?php
	session_start();
	$user_tckn = $_SESSION['tckn'];
	if(isset($_GET["choose"]))
	{
		$id = $_GET["choose"];
		$result = GetUserRole($id);
		if(mysqli_num_rows($result) == 1)
		{
			$rows = mysqli_fetch_array($result);
			if($rows["rol_id"] == 1)
			{
				$rol_id = 2;
			}
			elseif($rows["rol_id"] == 2)
			{
				$rol_id = 1;
			}
			$result2 = UpdateUser($id, $rol_id);
			if(mysqli_affected_rows($con) == 1)
			{
				echo "<script> alert('Kullanıcı rolü başarıyla güncellendi.') </script>";
			}
			else
			{
				echo "<script> alert('Kullanıcı rolü güncellenemedi..!') </script>";
			}
		}
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
								<li><a class="active" href="users.php">Kullanıcılar</a></li>
								<li><a href="register1.php">Kullanıcı ekle</a></li>
								<li><a href="main.php">Çıkış</a></li>								
							</ul>
						</div>
					</td>				
					<td id="page">
						<h2><font face="tahoma" size="6" color="maroon">Sistemde kayıtlı kullanıcılar</font></h2>
						<table id="tablo">
							<tr>
								<th> ID </th>
								<th> Çalışan Adı </th>
								<th> Çalışan Soyadı </th>
								<th> TC Kimlik Numarası </th>
								<th> Kullanıcı Rolü </th>
							</tr>
							<?php
								$result = GetUsers();
								while($rows = mysqli_fetch_array($result))
								{
									echo "<tr>
									<td>".$rows['id']."</td>
									<td>".$rows['k_ad']."</td>
									<td>".$rows['k_soyad']."</td>
									<td>".$rows['TCKN']."</td>";
									$result2 = GetRole($rows["rol_id"]);
									if(mysqli_num_rows($result2) == 1)
									{
										$rows2 = mysqli_fetch_array($result2);
										echo "<td>".$rows2['rol_ad']."</td>";
										if($rows2["rol_id"] == 1)
										{
											if($rows["TCKN"] != $user_tckn)
												echo "<td><a href='users.php?choose=$rows[0]' onClick='return UpdateRoleControl()'/>Kullanıcı Yap</td>";
											else
												echo "<td></td>";
										}
										else
										{
											echo "<td><a href='users.php?choose=$rows[0]' onClick='return UpdateRoleControl()'/>Yönetici Yap</td>";
										}
									}
									else
									{
										echo "-";
									}
									echo "</tr>";
								}
							?>
						</table>
					</td>
				</tr>
			</table>
<?php include("includes/footer.php"); ?>
