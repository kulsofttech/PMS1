<?php
/**********MYSQL Settings****************/
$host="localhost";
$databasename="webadmin_plmdb";
$user="webadmin_admin";
$pass="@kulsoft*123";
/**********MYSQL Settings****************/


$conn=mysql_connect($host,$user,$pass);

if($conn)
{
$db_selected = mysql_select_db($databasename, $conn);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}
}
else
{
    die('Not connected : ' . mysql_error());
}
?>