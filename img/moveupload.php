<?php
include("mysqlconnect.php");
session_start();
//$target_path=$_SESSION['img'];
$select_query = "SELECT * FROM  images_tbl ";
$sql = mysql_query($select_query) or die(mysql_error());	
while($row = mysql_fetch_array($sql,MYSQL_BOTH)){

?>

<table style="border-collapse: collapse; font: 12px Tahoma;" border="1" cellspacing="5" cellpadding="5">
<tbody><tr>
<td>

<img src = "<?php echo $row["images_path"]; ?>" alt="" width="180" height="180"/>

</td>
</tr>
</tbody></table>

<?php
}
?>
