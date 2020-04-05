<?php
if(isset($_GET['page'])){


	$page="files/".$_GET['page'];



	$file="$page.php";
	
	if (!file_exists($file)){
		include ("404.php");
		//echo "<h2 class='error'>ERROR file tidak ditemukan</h2>";
	}else{
		//define('hda', TRUE);
		include ("$page.php");
	}
	
	
}else{
	include ("files/dashboard.php");
}

?>

