
<html>
	<title>just trial</title>
	<body>
	<table border="1">
	<center>
<?php

	$f = fopen("xyz.txt", "r");

	// Read line by line until end of file
	while(!feof($f)) { 
	    echo fgets($f) . "<br />";
	}

	fclose($f);

	?>
	</center>
	</table>
	</body>
	</html>