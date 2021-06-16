
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
								<li><a href="main.php">Anasayfa</a></li>
								<li><a class="active" href="about.php">Hakkında</a></li>
							</ul>
						</div>
					</td>
					<td id="page">
						<h2 align="center"><font face="tahoma" size="6" color="maroon">Hakkında</font></h2>
						<p align="center">
							<font face="Verdana" size="4" color="black">
								<br>Bu uygulamanın amacı kısaca, mevcut şirket çalışanlarının bulundukları departman özelinde bilgilerini görüntülemek,<br><br>
								gerektiği durumlarda bilgilerini güncellemek ve işten ayrılan çalışanların bilgilerini sistemden silmektir.<br><br>
								Aynı zamanda şirkete yeni giren bir çalışanın bilgilerinin sisteme girilmesi ve çalışana bir kullanıcı atanması işlemleri<br><br>
								de bu site üzerinden sağlanır. Bu işlemler şirketin yöneticileri ve yetkili diğer birimler tarafından yapılmaktadır.<br><br>
							</font>
						</p> 
					</td>
				</tr>
			</table>
<?php include("includes/footer.php"); ?>
