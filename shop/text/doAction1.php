<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
		require_once'../lib/string.func.php';
		require_once'../text/upload.func.php';
		$fileinfo=$_FILES['myFile'];
		$info=uploadFile($fileinfo);
		echo $info;
		
		
?>