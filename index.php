<?php
//$max_size = 1024;
//$allowed_ext = array("png", "jpg", "gif");
//if(isset($_FILES['image'])){
      //if ($_FILES['image']['size']< $max_size) {
      	//$file_extension = explode(".", $_FILES['image']['name'])[1];
      	//if (in_array($file_extension, $allowed_ext) ) {
      		//(move_uploaded_file($_FILES["image"]["tmp_name"], "uploads")) 
        
      	//}
     //}
//}
if (isset($_FILES['image'])) {
   $file = $_FILES['image'];
   $naujas_pavadinimas = $_FILES['newname'];
   $naujaas_pavadinimas2 = $naujas_pavadinimas['tmp_name'];
   //File properties
   $file_name = $file['name'];
   $file_tmp = $file['tmp_name'];
   $file_size = $file['size'];
   $max_size = 1024*1024;
   $err = "";
   //$file_new_name = $_POST['newname'];
   //Work out with the file extension
   $file_ext = explode(".", $file_name);
   $file_ext = strtolower(end($file_ext));

   $allowed = array ("png", "jpg", "gif");

   if (in_array($file_ext, $allowed)) {
      if ($file_size <=1024*1024) {
         //$file_name_new = uniqid('', true) . '.' . $file_ext;
         $file_name_new = $naujaas_pavadinimas2 . '.' . $file_ext;
         $file_destination = 'uploads/' . $file_name_new;

        if (move_uploaded_file($file_tmp, $file_destination)) {
            echo "ok";
        } 
      } else {
        $err = "File is larger than" . $max_size;
      }
    } else {
       $err = "File type is not supported";
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
    				New name: <input type="text" name="newname">
            <input type="file" name="image">
    				<input type="submit" value="Upload Image" name="submit">
				</form>

        <?php
        if ($err) {
          echo "Error:" . $err;
        }
        ?>
        
			</div>
			<div class="col-6">
				<h2>Debug</h2>
				<pre>
				<?php 
        print_r($_FILES['image']);
        print_r($_FILES['newname']);
         ?>
				</pre>
			</div>
		</div>
	</div>
</body>
</html>