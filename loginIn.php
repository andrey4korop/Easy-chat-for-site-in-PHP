<?php
include("conn.php");

//Защита от вредоносных символов
function protect($var){
	$var = trim($var);
	$var = strip_tags($var);
	$var = mysql_escape_string($var);
	return $var;
}

//Авторизация логина
if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['pass']) && !empty($_POST['pass'])){
	$name = protect($_POST['name']);
	$pass = protect($_POST['pass']);
	
	//А был ли мальчик?
	$sql = "select name from dbo.users where name = '$name' and pass = '$pass'";
	$query = sqlsrv_query($conn, $sql);
	$row = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC);
	
	if(empty($row['name'])){
		echo 3;
	}else{
		echo 1;
	};
}else{
	echo 0;
};
?>