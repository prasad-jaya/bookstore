<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../stylesheets/stylesheethome.css">
</head>
<div id="temp_container">
		<div id="temp_menu">
    	<ul>
            <li><a href="/bookstore" class="current">HOME</a></li>    
            <li><a href="../includes/user_edit_profile.php">PROFILE</a></li>
			<li><a href = "../includes/user_login.php"> Log In</a></li>
            <li><a href = "../includes/logout.php"> Log Out</a></li>
		</ul>
	   </div> 
</div>
<div>
<?php
session_start();
include_once '../includes/dbconnect.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if (isset($_SESSION['name'])){
        $username=$_SESSION['name'];
    }
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="admin_add.php">Add Books <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_update.php">Update Items</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="admin-payment.php">Payment</a>
      </li>
    </ul>
    <span class="navbar-text">
    <p style="text-align: center;">Welcome to Admin Panel <?php echo $username ?></p>  
    </span>
  </div>
</nav>
</div>
<body>


<div class="container">  
<form action="admin_add.php" method="POST" enctype="multipart/form-data">
    <h3 >Add New Items</h3>
    <div class="form-group">
        <label for="exampleInputPassword1">Book Name</label>
        <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Book Name">
    </div>
    
    <div class="form-group">
        <label for="exampleInputEmail1">Price</label>
        <input type="text" class="form-control" id="price" name="price" placeholder="Price">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Author</label>
        <input type="text" class="form-control" id="author" name="author" placeholder="Author">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="Description">
    </div>

    <div class="form-group">
    <label for="exampleInputFile">File input</label>
        <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">Only JPG, JPEG, PNG & GIF files are allowed.</small>
    </div>
    
    <button type="submit" value="Upload Image" class="btn btn-primary" name="submit">Add</button>
    </form>
</div> 
<?php } 
else{
    print '<h1 style="text-align:center;margin-top:10%; class="display-4">Please log in first to see this page.</h1>';
}
?> 

</body>
</html>

<?php
if(isset($_POST["submit"])) {
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imgname = basename($_FILES["fileToUpload"]["name"]);
echo $imgname;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}

   include_once '..\includes\dbconnect.php';
   
   if(isset($_POST['book_name'])){

    $BOOK_NAME = $_POST['book_name'];
    $PRICE =  $_POST['price'];
    $author = $_POST['author'];
    $description =  $_POST['description'];
    echo $PRICE;

    $sql = "Insert into books_details (book_name,price,author,description,image_src) values('$BOOK_NAME','$PRICE','$author','$description','$imgname');";
    mysqli_query($conn,$sql);
    header("Refresh:0; url=admin.php");
   }   
?>

<?php

?>