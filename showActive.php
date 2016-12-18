<?php
include("conn.php");

$sel = "select name from dbo.[usersActive]";
$query = sqlsrv_query($conn, $sel);

echo "<div id='active'>Сейчас онлайн:<br>";
$i = 1;
while($row = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC)){
	echo $i.". ".$row['name']."<br>";
	$i++;
};
echo "</div>";
?>