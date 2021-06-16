
<?php include("includes/connect_mysql.php"); ?>
<?php include("includes/functions.php"); ?>
<?php 
	session_start();
	if(isset($_SESSION['name']) && isset($_SESSION['surname']))
	{
		unset($_SESSION['name']);
		unset($_SESSION['surname']);
	}
?>
<?php include("includes/header.php"); ?>
			<table id="structure">
				<tr>
					<td id="navigation">
						<div id="menu">
							<ul>
								<li><a class="active" href="main.php">Anasayfa</a></li>
								<li><a href="about.php">Hakkında</a></li>
							</ul>
						</div>
					</td>
					<td id="page">
						<table>
							<tr>
								<h2><font face="tahoma" size="6" color="maroon">Yazılım Şirketi Çalışan Yönetim Sistemi</font></h2>
							</tr>
							<tr>
								<td>
									<div id="image1">
										<img src="pictures/yazılım3.jpg" />
									</div>
								</td>
								<td>
									<div id="image1">
										<img src="pictures/yazılım2.jpg" />
									</div>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
<?php include("includes/footer.php"); ?>
