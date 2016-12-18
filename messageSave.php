<?php
include("conn.php");

//Защита от вредоносных символов
function protect($var){
	$var = trim($var);
	$var = strip_tags($var);
	$var = mysql_escape_string($var);
	return $var;
}

//Добавление сообщения
if(isset($_POST['name']) && !empty($_POST['name'])){
	$name = protect($_POST['name']);
	$msg = protect($_POST['msg']);
	
	//Кто добавил?
	$sql = "select * from dbo.users where name = '$name'";
	$query = sqlsrv_query($conn, $sql);
	$row = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC);
	
	$id = $row['id'];
	
	$sql = "insert into dbo.messages(id, message, d) values('$id', '$msg', GETDATE())";
	sqlsrv_query($conn, $sql);
	
	echo 1;
}else{
	echo 0;
};

?>