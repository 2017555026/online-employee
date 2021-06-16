
<?php include("includes/connect_mysql.php"); ?>
<?php include("includes/functions.php"); ?>
<?php 
	session_start();
	$user_tckn = $_SESSION['tckn'];
	if(isset($_GET["choose"]))
	{
		$choose = $_GET["choose"];
		$_SESSION['choose'] = $choose;
		$result = GetDepartment($choose);
		if(mysqli_num_rows($result) == 1)
		{
			$rows = mysqli_fetch_array($result);
			$table_name = $rows["tablo_ad"];
			$title_name = $rows["departman_ad"];
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
								<li><a class="active" href="admin_departments.php">Departmanlar</a></li>
								<li><a href="add_employee.php">Yeni çalışan ekle</a></li>
								<li><a href="users.php">Kullanıcılar</a></li>
								<li><a href="register1.php">Kullanıcı ekle</a></li>
								<li><a href="main.php">Çıkış</a></li>								
							</ul>
						</div>
					</td>				
					<td id="page">
						<?php echo "<h2><font face='tahoma' size='5' color='maroon'><b>".$title_name."</b></font></h2>"; ?>
						<table id="tablo">
							<tr>
								<th> ID </th>
								<th> Çalışan Adı </th>
								<th> Çalışan Soyadı </th>
								<th> TC Kimlik Numarası </th>
								<th> Pozisyon </th>
								<th> İşe Başlama Tarihi </th>
								<th> SGK Sicil No </th>
								<th> Sözleşme Durumu </th>
								<th> Aylık Maaşı </th>
							</tr>
							<?php
								$_SESSION['table_name'] = $table_name;
								$result = GetEmployees($table_name);
								while($rows = mysqli_fetch_array($result))
								{
									echo "<tr>
									<td>".$rows[0]."</td>
									<td>".$rows[1]."</td>
									<td>".$rows[2]."</td>
									<td>".$rows[3]."</td>
									<td>".$rows[4]."</td>
									<td>".$rows[5]."</td>
									<td>".$rows[6]."</td>
									<td>".$rows[7]."</td>
									<td>".$rows[8]."TL</td>
									<td><a href='edit_employee.php?choose=$rows[0]'>Bilgileri Güncelle</td>";
									if($rows["TCKN"] != $user_tckn)
										echo "<td><a href='delete_employee.php?emp_id=$rows[0]'>İşten Çıkart</td>";
									else
										echo "<td></td>";
									echo "</tr>";
								}
							?>
						</table><br>
						<a href="admin_departments.php">
							<font face="tahoma" size="4" color="maroon"><b>Geri</b></font>
						</a>
					</td>
				</tr>
			</table>
<?php include("includes/footer.php"); ?>
