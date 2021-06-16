
<?php include("includes/connect_mysql.php"); ?>
<?php include("includes/functions.php"); ?>
<?php 
	session_start();
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
<?php include("includes/user_header.php"); ?>
			<table id="structure">
				<tr>
					<td id="navigation">
						<div id="menu">
							<ul>
								<li><a href="user_content.php">Profil Sayfası</a></li>
								<li><a class="active" href="user_departments.php">Departmanlar</a></li>
								<li><a href="main.php">Çıkış</a></li>
							</ul>
						</div>
					</td>
					<td id="page">
						<?php echo "<h2><font face='tahoma' size='5' color='maroon'><b>".$title_name."</b></font></h2>"; ?>
						<table id="tablo">
							<tr>
								<th>Çalışan Adı</th>
								<th>Çalışan Soyadı</th>
								<th>Pozisyon</th>
							</tr>
							<?php
								$_SESSION['table_name'] = $table_name;
								$query = "SELECT * FROM ".$table_name;
								$result = mysqli_query($con, $query);
								$verified_result = query_control($result);
								while($rows = mysqli_fetch_array($verified_result))
								{
									echo "<tr>
									<td>".$rows[1]."</td>
									<td>".$rows[2]."</td>
									<td>".$rows[4]."</td>
									</tr>";
								}
							?>
						</table>
						<a href="user_departments.php">
							<p>
								<font face="tahoma" size="4" color="maroon"><b>Geri</b></font>
							</p>
						</a>
					</td>
				</tr>
			</table>
<?php include("includes/footer.php"); ?>
