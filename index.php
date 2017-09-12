<?php
$max_size = 1024;
$allowed_ext = array("png", "jpg", "gif");
if(isset($_FILES['image'])){
      if ($_FILES['image']['size']< $max_size) {
      	$file_extension = explode(".", $_FILES['image']['name'])[1];
      	if (in_array($file_extension, $allowed_ext) ) {
      		(move_uploaded_file($_FILES["image"]["tmp_name"], "uploads")) {
        
      	}
      }


      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpg","png","gif");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPG or PNG or GIF file.";
      }
      
      if($file_size < 1000000){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }

?>


<!DOCTYPE html>
<html>
<head>
	<title>File upload</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container" id="heading">
		<div class="row">
			<h1>File Upload</h1>
		</div>
		
	</div>
	<div class="container">
		<div class="row">
			<div class="col-6">
				<h2>Upload form</h2>
				<form method="post" enctype="multipart/form-data">
    				<input type="file" name="image">
    				<input type="submit" value="Upload Image" name="submit">
				</form>
			</div>
			<div class="col-6">
				<h2>Debug</h2>
				<pre>
				<?php print_r($_FILES['image']); ?>
				</pre>
			</div>
		</div>
	</div>
</body>
</html>