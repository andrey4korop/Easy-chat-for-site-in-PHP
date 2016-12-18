<?php
include("conn.php");

//Удаляем сообщения старше 30 минут
$sel = "delete from dbo.[messages] where d <= (select DATEADD (minute , -30 , getdate()))";
sqlsrv_query($conn, $sel);

//Выбираем сообщения
$sel = "select name, [message], d FROM [dbo].[messages] AS u left outer join [dbo].[users] AS m ON m.id = u.id order by d desc";
$query = sqlsrv_query($conn, $sel);

while($row = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC)){
	$name = $row['name'];
	$msg = $row['message'];
	
	echo "
	<div id='message'>
	<b>$name пишет:</b>
	<br>
	$msg
	</div>
	";
};

?>