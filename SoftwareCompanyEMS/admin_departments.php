

<?php include("includes/connect_mysql.php"); ?>
<?php include("includes/functions.php"); ?>
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
						<h2><font face="tahoma" size="6" color="maroon">Departmanlar</font></h2><br>
						<?php
							$result = GetDepartments();
							while($rows = mysqli_fetch_array($result))
							{
								echo "<li><a href='admin_show_employee.php?choose=$rows[0]'><font face='tahoma' size='4' color='maroon'>".$rows['departman_ad']."</font></a></li><br>";
							}
						?>
					</td>
				</tr>
			</table>
<?php include("includes/footer.php"); ?>
