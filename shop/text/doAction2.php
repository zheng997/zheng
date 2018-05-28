<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
		require_once'../lib/string.func.php';
		require_once'../text/upload.func.php';
		//print_r($_FILES);
		foreach($_FILES as $val){
		 $mes=uploadFile($val);
		  echo $mes;	
		}
		
?>