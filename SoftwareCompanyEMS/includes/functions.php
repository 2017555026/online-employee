
<?php
	function query_control($result)
	{
		global $con;
		if(!$result)
			die("Veritabanı sorgu hatası..!");
		else
			return $result;
	}
	
	function mysql_prep($value)
	{
		global $con;
		$value = mysqli_real_escape_string($con, $value);
		return $value;
	}
	
	function ControlSSN($tckn)
	{
		global $con;
		$query = "SELECT *FROM departman_bilgi";
		$result = mysqli_query($con,$query);
		while($rows = mysqli_fetch_array($result))
		{
			$result2 = GetEmployees($rows["tablo_ad"]);
			while($rows2 = mysqli_fetch_array($result2))
			{
				if($rows2["TCKN"] == $tckn)
				{
					return false;
				}
			}
		}
		return true;
	}
	
	function GetUserSSN()
	{
		global $con;
		$query = "SELECT TCKN FROM kullanicilar";
		$result = mysqli_query($con, $query);
		$verified_result = query_control($result);
		return $verified_result;
	}
	
	function GetTableByDepartmentID($department_id)
	{
		global $con;
		$query = "SELECT tablo_ad FROM departman_bilgi WHERE departman_id=".$department_id;
		$result = mysqli_query($con, $query);
		$verified_result = query_control($result);
		return $verified_result;
	}
	
	function GetEmployees($table_name)
	{
		global $con;
		$query = "SELECT * FROM ".$table_name;
		$result = mysqli_query($con, $query);
		$verified_result = query_control($result);
		return $verified_result;
	}
	
	function GetEmployee($table_name, $id)
	{
		global $con;
		$table_name = mysql_prep($table_name);
		$query = "SELECT * FROM ".$table_name." WHERE id=".$id;
		$result = mysqli_query($con,$query);
		$verified_result = query_control($result);
		return $verified_result;
	}
	
	function GetEmployeeByTCKN($table_name, $tckn)
	{
		global $con;
		$table_name = mysql_prep($table_name);
		$tckn = mysql_prep($tckn);
		$query = "SELECT * FROM ".$table_name." WHERE TCKN=".$tckn;
		$result = mysqli_query($con,$query);
		$verified_result = query_control($result);
		return $verified_result;
	}
	
	function GetDepartments()
	{
		global $con;
		$query = "SELECT *FROM departman_bilgi";
		$result = mysqli_query($con,$query);
		$verified_result = query_control($result);
		return $verified_result;
	}
	
	function GetDepartment($id)
	{
		global $con;
		$id = mysql_prep($id);
		$query = "SELECT *FROM departman_bilgi WHERE departman_id=$id";
		$result = mysqli_query($con,$query);
		$verified_result = query_control($result);
		return $verified_result;
	}	
	
	function GetRole($roleid)
	{
		global $con;
		$query = "SELECT *FROM roller WHERE rol_id=$roleid";
		$result = mysqli_query($con,$query);
		$verified_result = query_control($result);
		return $verified_result;
	}
	
	
	function GetRoles()
	{
		global $con;
		$query = "SELECT *FROM roller";
		$result = mysqli_query($con,$query);
		$verified_result = query_control($result);
		return $verified_result;
	}

	function AddUser($employee, $password, $role, $department_id)
	{
		global $con;
		$name = $employee["ad"];
		$surname = $employee["soyad"];
		$tckn = trim(mysql_prep($employee["TCKN"]));
		$edited_password = trim(mysql_prep($password));
		$hashed_password = md5($edited_password);
		$query = "INSERT INTO kullanicilar(id,k_ad,k_soyad,TCKN,sifre,rol_id,departman_id) 
				  VALUES (NULL,'$name','$surname','$tckn','$hashed_password','$role','$department_id')";
		$result = mysqli_query($con,$query);
		return $result;
	}
	
	function GetUsers()
	{
		global $con;
		$query = "SELECT * FROM kullanicilar";
		$result = mysqli_query($con,$query);
		$verified_result = query_control($result);
		return $verified_result;
	}	
	
	function GetUser($tckn, $password)
	{
		global $con;
		$edited_tckn = trim(mysql_prep($tckn));
		$edited_password = trim(mysql_prep($password));
		$hashed_password = md5($edited_password);
		$query = "SELECT * FROM kullanicilar WHERE TCKN='$edited_tckn' and sifre='$hashed_password'";
		$result = mysqli_query($con,$query);
		return $result;
	}
	
	function GetUserRole($id)
	{
		global $con;
		$query = "SELECT * FROM kullanicilar WHERE id=$id";
		$result = mysqli_query($con,$query);
		$verified_result = query_control($result);
		return $verified_result;
	}
	
	function GetStatus()
	{
		global $con;
		$query = "SELECT *FROM status";
		$result = mysqli_query($con,$query);
		$verified_result = query_control($result);
		return $verified_result;
	}
	
	function AddEmployee($emp_name,$emp_surname,$tckn,$position,$date,$sicil_no,$contract,$monthly_salary,$department_id,$table_name)
	{
		global $con;
		$emp_name = trim(mysql_prep($emp_name));
		$emp_surname = trim(mysql_prep($emp_surname));
		$tckn = trim(mysql_prep($tckn));
		$position = trim(mysql_prep($position));
		$date = trim(mysql_prep($date));
		$sicil_no = trim(mysql_prep($sicil_no));
		$contract = trim(mysql_prep($contract));
		$monthly_salary = trim(mysql_prep($monthly_salary));
		$table_name = mysql_prep($table_name);
		$query = "INSERT INTO $table_name
				  (id,ad,soyad,TCKN,pozisyon,baslama_tarihi,sicil_no,sozlesme_suresi,aylik_maas,statuscode,departman_id)
				  VALUES (NULL,'$emp_name','$emp_surname','$tckn','$position','$date','$sicil_no','$contract','$monthly_salary',0,'$department_id')";
		$result = mysqli_query($con,$query);
		$verified_result = query_control($result);
		return $verified_result;
	}
	
	function UpdateEmployee($id, $position, $contract, $monthly_salary, $status, $table_name)
	{
		global $con;
		$id = mysql_prep($id);
		$position = mysql_prep($position);
		$table_name = mysql_prep($table_name);
		$contract = mysql_prep($contract);
		$monthly_salary = mysql_prep($monthly_salary);
		$status = mysql_prep($status);
		$query = "UPDATE $table_name SET
				  pozisyon= '$position',
				  sozlesme_suresi= '$contract',
				  aylik_maas= $monthly_salary,
			      statuscode= $status
				  WHERE id= $id";
		$result = mysqli_query($con,$query);
		return $result;
	}
	
	function DeleteEmployee($emp_id, $table_name)
	{
		global $con;
		$emp_id = mysql_prep($emp_id);
		$table_name = mysql_prep($table_name);
		$query = "DELETE FROM $table_name 
				  WHERE id=$emp_id";
		$result = mysqli_query($con, $query);
		$verified_result = query_control($result);
		return $verified_result;
	}
	
	function UpdateUser($id, $rol_id)
	{
		global $con;
		$id = mysql_prep($id);
		$rol_id = mysql_prep($rol_id);
		$query = "UPDATE kullanicilar SET
				  rol_id=$rol_id
				  WHERE id=$id";
		$result = mysqli_query($con, $query);
		$verified_result = query_control($result);
		return $verified_result;
	}
	
	function DeleteUser($tckn)
	{
		global $con;
		$tckn = mysql_prep($tckn);
		$query = "DELETE FROM kullanicilar
				  WHERE TCKN=$tckn";
		$result = mysqli_query($con, $query);
		$verified_result = query_control($result);
		return $verified_result;
	}
	
	function GetReasons()
	{
		global $con;
		$query = "SELECT * FROM isten_cıkma_nedenleri";
		$result = mysqli_query($con,$query);
		$verified_result = query_control($result);
		return $verified_result;
	}
	
	function SaveInf($name,$surname,$tckn,$reason1,$reason2,$reason3,$specialreason)
	{
		global $con;
		$name = mysql_prep($name);
		$surname = mysql_prep($surname);
		$tckn = mysql_prep($tckn);
		$specialreason = mysql_prep($specialreason);
		$query = "INSERT INTO isten_cikanlar
				  (id,ad,soyad,TCKN,neden_1,neden_2,neden_3,ozel_neden)
				  VALUES (NULL,'$name','$surname','$tckn','$reason1','$reason2','$reason3','$specialreason')";
		$result = mysqli_query($con,$query);
		$verified_result = query_control($result);
		return $verified_result;
	}
	
?>