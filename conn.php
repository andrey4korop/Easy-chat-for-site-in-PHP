<?php
$serverName = "ZED";
$connOptions = array("UID"=>"sa", "PWD"=>"", "Database"=>"test", "CharacterSet"=>"UTF-8");
$conn = sqlsrv_connect( $serverName, $connOptions );
?>