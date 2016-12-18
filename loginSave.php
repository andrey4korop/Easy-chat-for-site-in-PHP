<?php
include("conn.php");

//Защита от вредоносных символов
function protect($var){
	$var = trim($var);
	$var = strip_tags($var);
	$var = mysql_escape_string($var);
	return $var;
}

//Добавление логина
if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['pass']) && !empty($_POST['pass'])){
	$name = protect($_POST['name']);
	$pass = protect($_POST['pass']);
	
	//А был ли мальчик?
	$sql = "select name from dbo.users where name = '$name'";
	$query = sqlsrv_query($conn, $sql);
	$row = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC);
	
	if(!empty($row['name'])){
		echo 2;
	}else{
		$sql = "insert into dbo.users(name,pass) values('$name','$pass')";
		sqlsrv_query($conn, $sql);
		echo 1;
	};
}else{
	echo 0;
};
?>