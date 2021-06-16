
<?php include("includes/connect_mysql.php"); ?>
<?php include("includes/functions.php"); ?>
<?php
	if(isset($_POST["reset"]))
	{
		header("Location:add_employee.php");
	}
	if(isset($_POST["add"]))
	{
		$emp_name = $_POST["emp_name"];
		$emp_surname = $_POST["emp_surname"];
		$tckn = $_POST["tckn"];
		$position = $_POST["position"];
		$date = $_POST["date"];
		$sicil_no = $_POST["sicil_no"];
		$contract = $_POST["contract"];
		$monthly_salary = $_POST["monthly_salary"];
		$department_id = $_POST["department"];
		$control = ControlSSN($tckn);
		if($control)
		{
			$result = GetTableByDepartmentID($department_id);
			if(mysqli_num_rows($result) == 1)
			{
				$rows = mysqli_fetch_array($result);
				$result2 = AddEmployee($emp_name,$emp_surname,$tckn,$position,$date,$sicil_no,$contract,$monthly_salary,$department_id,$rows[0]);
				if(mysqli_affected_rows($con) == 1)
				{
					header("Location:admin_content.php?message=2");
				}
				else
				{
					echo "Çalışan eklenemedi..!";
				}
			}
		}
		else
		{
			echo "Girilen TC numarasına ait bir çalışan sistemde mevcut..!";
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
								<li><a class="active" href="add_employee.php">Yeni çalışan ekle</a></li>
								<li><a href="users.php">Kullanıcılar</a></li>
								<li><a href="register1.php">Kullanıcı ekle</a></li>
								<li><a href="main.php">Çıkış</a></li>								
							</ul>
						</div>
					</td>				
					<td id="page">
						<h2><font face="tahoma" size="6" color="maroon">Yeni çalışan ekle</font></h2>
						<form action="add_employee.php" method="post" autocomplete="off">
							<table id="tablo">
								<tr> 
									<td><li>* Çalışan Adı : </li></td>
									<td><input type="text" required placeholder="" name="emp_name" id="emp_name"/></td>
								</tr>
								<tr>
									<td><li>* Çalışan Soyadı : </li></td>
									<td><input type="text" required placeholder="" name="emp_surname" id="emp_surname"/></td>
								</tr>
								<tr>
									<td><li>* TC Kimlik Numarası : </li></td>
									<td><input type="text" required placeholder="" name="tckn" id="tckn" maxlength="11" /></td>
								</tr>
								<tr>
									<td><li>* Pozisyon : </li></td>
									<td><input type="text" required placeholder="" name="position" id="position"/></td>
								</tr>
								<tr>
									<td><li>* İşe Başlama Tarihi : </li></td>
									<td><input type="date" required placeholder="" name="date" id="date"/></td>
								</tr>
								<tr>
									<td><li>* SGK Sicil Numarası : </li></td>
									<td><input type="text" required placeholder="" name="sicil_no" id="sicil_no" maxlength="13" /></td>
								</tr>
								<tr>
									<td><li>* Sözleşme Durumu : </li></td>
									<td>
										<select name="contract">
											<option value="6 ay" selected>6 ay</option>
											<option value="1 yıl">1 yıl</option>
											<option value="3 yıl">3 yıl</option>
											<option value="Yok">Sözleşme Yok</option>
										</select>
									</td>
								</tr>
								<tr>
									<td><li>* Aylık Maaşı : </li></td>
									<td><input type="number" required placeholder="" name="monthly_salary" id="monthly_salary"/> TL</td>
								</tr>
								<tr>
									<td><li> Çalışma Durumu : </li></td>
									<td><input type="text" value="Yeni çalışan" name="status" id="status" readonly="readonly" /></td>
								</tr>
								<tr>
									<td><li> Çalışacağı Departman : </li></td>
									<td>
										<select name="department">
										<?php
											$result = GetDepartments();
											while($rows2 = mysqli_fetch_array($result))
											{
												echo "<option value='$rows2[0]'>".$rows2['departman_ad']."</option>";
											}
										?>
										</select>
									</td>
								</tr>
							</table>
							<input type="submit" value="Çalışan ekle" name="add" id="add" onClick="return AddEmployeeControl()" />
							<input type="submit" value="Sıfırla" name="reset" id="reset"/>
						</form>
					</td>
				</tr>
			</table>
<?php include("includes/footer.php"); ?>