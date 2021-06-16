<?php
$host ="localhost";
$user="root";
$password="";
$dbname="employeedb";
$con = mysqli_connect($host,$user,$password);
if(!$con)
	die("Veritabanına bağlanırken hata oluştu..!");
$db_select = mysqli_select_db($con, $dbname);
if(!$db_select)
	die("Veritabanı seçilirken hata oluştu..! ");
?>