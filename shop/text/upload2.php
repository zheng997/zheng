<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多文件上传</title>
</head>

<body>
<form action="doAction3.php" method="post" enctype="multipart/form-data">
      请选择上传文件：<input type="file" name="myFile[]" /><br/>
     请选择上传文件：<input type="file" name="myFile[]" /><br/>
     请选择上传文件：<input type="file" name="myFile[]" /><br/>
      请选择上传文件：<input type="file" name="myFile1" /><br/>
       <input type="submit" value="上传"  />

</form>



</body>
</html>
