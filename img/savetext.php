<?php
	include("mysqlconnect.php");
	function GetImageExtension($imagetype)
    {
		if(empty($imagetype)) return false;
		switch($imagetype)
		{
			case 'docs/docx': return '.docx';
			case 'docs/pdf': return '.pdf';
			case 'docs/txt': return '.txt';
			case 'docs/bmp': return '.bmp';
           case 'docs/gif': return '.gif';
           case 'docs/jpeg': return '.jpg';
           case 'docs/png': return '.png';
		     case 'docs/txt': return '.txt';
			default: return false;
		}
		
	}

	$custid=$_POST['customer'];
	$custuprop=$_POST['custprop'];

	if (!empty($_FILES["uploadedimage"]["name"])) {
		
		$file_name=$_FILES["uploadedimage"]["name"];
		$temp_name=$_FILES["uploadedimage"]["tmp_name"];
		$imgtype=$_FILES["uploadedimage"]["type"];
		$ext= GetImageExtension($imgtype);
		$imagename=$_FILES["uploadedimage"]["name"];
		
		$target_path = "docs/".$file_name;
		$_SESSION['img']=$target_path;
		if(move_uploaded_file($temp_name, $target_path)) {
			$query_upload="INSERT INTO `documentstb`(`docname`,`customerid`,`custpropid`,`documentpath`) VALUES ('$file_name','$custid','$custuprop','$target_path')";
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
		
		$target_path = "docs/".$file_name;
		$_SESSION['img']=$target_path;
		if(move_uploaded_file($temp_name, $target_path)) {
			$query_upload="INSERT INTO `documentstb`(`docname`,`customerid`,`custpropid`,`documentpath`) VALUES ('$file_name','$custid','$custuprop','$target_path')";
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
		
		$target_path = "docs/".$file_name;
		$_SESSION['img']=$target_path;
		if(move_uploaded_file($temp_name, $target_path)) {
			$query_upload="INSERT INTO `documentstb`(`docname`,`customerid`,`custpropid`,`documentpath`) VALUES ('$file_name','$custid','$custuprop','$target_path')";
			//$query_upload="INSERT into images_tbl ('images_path','submission_date') VALUES 
			
			//('$target_path',now())";
			mysql_query($query_upload) or die("error  ".mysql_error());  
			
			}else{
			
			exit("Error While uploading file on the server");
		} 
		
	}
	header("location:../uploaddocument.php");
?>
