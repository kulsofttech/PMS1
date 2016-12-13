<?php
include("mysqlconnect.php");
session_start();
  $userid=$_SESSION["logid"];
 function GetImageExtension($imagetype)
    {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'images/bmp': return '.bmp';
           case 'images/gif': return '.gif';
           case 'images/jpeg': return '.jpg';
           case 'images/png': return '.png';
		     case 'images/txt': return '.txt';
           default: return false;
       }

     }

     $proprid=$_POST['proprid'];
  $untid=$_POST['untid'];


	 if (!empty($_FILES["uploadedimage"]["name"])) {

	$file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename=$_FILES["uploadedimage"]["name"];

	$target_path = "images/".$imagename;
	//$_SESSION['img']=$target_path;
if(move_uploaded_file($temp_name, $target_path)) {
$query_upload="INSERT INTO `unitimagestb`(`propertyid`, `unitid`, `imagepath`, `imagename`, `addedby`, `addedon`) VALUES ('$proprid','$untid','$target_path','$imagename','$userid',now())";
 	//$query_upload="INSERT into images_tbl ('images_path','submission_date') VALUES 

//('$target_path',now())";
	mysql_query($query_upload) or die("error  ".mysql_error());  

}else{
 
   exit("Error While uploading image on the server");
} 

}




if (!empty($_FILES["file2"]["name"])) {

  $file_name=$_FILES["file2"]["name"];
  $temp_name=$_FILES["file2"]["tmp_name"];
  $imgtype=$_FILES["file2"]["type"];
  $ext= GetImageExtension($imgtype);
  $imagename=$_FILES["file2"]["name"];

  $target_path = "images/".$imagename;
  //$_SESSION['img']=$target_path;
if(move_uploaded_file($temp_name, $target_path)) {
$query_upload="INSERT INTO `unitimagestb`(`propertyid`, `unitid`, `imagepath`, `imagename`, `addedby`, `addedon`) VALUES ('$proprid','$untid','$target_path','$imagename','$userid',now())";
  //$query_upload="INSERT into images_tbl ('images_path','submission_date') VALUES 

//('$target_path',now())";
  mysql_query($query_upload) or die("error  ".mysql_error());  

}else{
 
   exit("Error While uploading image on the server");
} 

}




if (!empty($_FILES["file3"]["name"])) {

  $file_name=$_FILES["file3"]["name"];
  $temp_name=$_FILES["file3"]["tmp_name"];
  $imgtype=$_FILES["file3"]["type"];
  $ext= GetImageExtension($imgtype);
  $imagename=$_FILES["file3"]["name"];

  $target_path = "images/".$imagename;
  //$_SESSION['img']=$target_path;
if(move_uploaded_file($temp_name, $target_path)) {
$query_upload="INSERT INTO `unitimagestb`(`propertyid`, `unitid`, `imagepath`, `imagename`, `addedby`, `addedon`) VALUES ('$proprid','$untid','$target_path','$imagename','$userid',now())";
  //$query_upload="INSERT into images_tbl ('images_path','submission_date') VALUES 

//('$target_path',now())";
  mysql_query($query_upload) or die("error  ".mysql_error());  

}else{
 
   exit("Error While uploading image on the server");
} 

}
header("location:../uploadimages.php");
?>
