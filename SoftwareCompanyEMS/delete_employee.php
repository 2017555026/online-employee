

<?php include("includes/connect_mysql.php"); ?>
<?php include("includes/functions.php"); ?>
<?php
	session_start();
	$choose = $_SESSION['choose'];
	$result4 = GetDepartment($choose);
	if(mysqli_num_rows($result4) == 1)
	{
		$rows1 = mysqli_fetch_array($result4);
		$table_name = $rows1["tablo_ad"];
		$title_name = $rows1["departman_ad"];
	}
	if(isset($_GET["emp_id"]))
	{
		$_SESSION['emp_id'] = $_GET["emp_id"];
	}
	if(isset($_POST["delete"]))
	{
		if(isset($_POST['reason']) && count($_POST['reason']) <= 3 && count($_POST['reason']) > 0)
		{
			$specialreason = $_POST['specialreason'];
			$reason = $_POST['reason'];
			$emp_id = $_SESSION['emp_id'];
			$result = GetEmployee($table_name, $emp_id);
			if(mysqli_num_rows($result) == 1)
			{
				$rows2 = mysqli_fetch_array($result);
				$tckn = $rows2["TCKN"];
				if($specialreason == "")
					$specialreason == null;
				if(count($reason) == 3)
					$result5 = SaveInf($rows2["ad"],$rows2["soyad"],$tckn,$reason[0],$reason[1],$reason[2],$specialreason);
				else if(count($reason) == 2)
					$result5 = SaveInf($rows2["ad"],$rows2["soyad"],$rows2["TCKN"],$reason[0],$reason[1],0,$specialreason);	
				else
					$result5 = SaveInf($rows2["ad"],$rows2["soyad"],$rows2["TCKN"],$reason[0],0,0,$specialreason);
				if(mysqli_affected_rows($con) == 1)
				{
					$result2 = DeleteUser($tckn);
					$result3 = DeleteEmployee($emp_id, $table_name);
					if(mysqli_affected_rows($con) == 1)
					{
						$choose = $_SESSION['choose'];
						header("Location:admin_show_employee.php?choose=$choose");
					}
					else
					{
						echo "Çalışan sistemden silinemedi..!";
					}
				}
				else
				{
					echo "Veritabanına erişmeye çalışırken hata oluştu..!";
				}
			}
			else
			{
				echo "Çalışanın bilgilerini getirirken bir hata oluştu..!";
			}
		}
		else
		{
			echo "Lütfen 1 ile 3 arasında neden seçin..!";
		}
	}
	if(isset($_POST["back"]))
	{
		header("Location:admin_show_employee.php?choose=$choose");
	}
	if(isset($_POST["reset"]))
	{
		$emp_id = $_SESSION['emp_id'];
		header("Location:delete_employee.php?choose=$emp_id");
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
								$emp_id = $_SESSION['emp_id'];
								$result = GetEmployee($table_name, $emp_id);
								$rows = mysqli_fetch_array($result);
								echo "<h2>".$rows[1]." ".$rows[2]." çalışanını işten çıkarma nedenlerinizi seçiniz</h2>";
							?>
							<form action="delete_employee.php?choose=<?php echo $rows[0]; ?>" method="post">
								<table>
									<tr>
										<p><font face='tahoma' size='4' color='maroon'>Lütfen en az '1' en fazla '3' neden seçiniz..</font></p>
									</tr>
									<?php
										$result2 = GetReasons();
										while($rows2 = mysqli_fetch_array($result2))
										{
											if($rows2[0] > 0)
											{
												echo "<tr><input type='checkbox' name='reason[]' value='$rows2[0]'>".$rows2[1]."</tr>";
												echo "<br><br>";
											}
										}
									?>
									<tr>
										<td>Özel Nedenler (Optional)</td>
									</tr>
									<tr>
										<td><textarea name="specialreason" rows="5" cols="100" wrap="soft"></textarea></td>
									</tr>
								</table><br>
								<input type="submit" value="Çalışanı İşten Çıkart" name="delete" id="delete" onClick="return DeleteEmployeeControl()" />
								<input type="submit" value="Değişiklikleri Sıfırla" name="reset" id="reset"/>
								<input type="submit" value="Geri" name="back" id="back"/>
							</form>
						</td>
					</tr>
			</table>
<?php include("includes/footer.php"); ?>