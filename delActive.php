<?php
include("conn.php");
//Информация о тех, кто - онлайн
$activeName = $_GET['name'];

//Удаляем пользователей не обновлявшихся больше 1 минут
$sel = "delete from dbo.[usersActive] where d <= (select DATEADD (minute , -1 , getdate())) or name = ''";
sqlsrv_query($conn, $sel);

$sel = "select name from dbo.[usersActive] where name = '$activeName'";
$query = sqlsrv_query($conn, $sel);
$row = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC);

//Если пользователь не онлайн - добавим
if(!$row['name']){
	$sel = "insert into dbo.[usersActive](name, d) values('$activeName', GETDATE())";
	sqlsrv_query($conn, $sel);
};
?>