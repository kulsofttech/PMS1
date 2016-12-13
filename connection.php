<?php
$con=mysql_connect("localhost","webadmin_admin","@kulsoft*123");
$sel=mysql_select_db("webadmin_plmdb");
if($sel)
{
//echo "Connection successful";
}
else
{
die(mysql_error());
}

?>