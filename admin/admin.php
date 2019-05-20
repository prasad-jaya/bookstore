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
      <li class="nav-item">
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


<div class="container"></div>
<h1 class="display-4" style="text-align:center;margin:20px;">Welcome To Admin Panel <?php echo $username ?></h1>

<!-- <a href="admin_add.php"type="button" class="btn btn-primary">Add book</a>
<a href="admin_update.php" type="button" class="btn btn-primary">Update Items</a>
<a type="button" class="btn btn-primary">Primary</a> -->

<?php 

if(isset($_COOKIE["myCookie"])){  
    echo $_COOKIE["myCookie"];
}
else{
    echo "heloo";
}
    
 ?>

<?php } 
else{
    print '<h1 style="text-align:center;margin-top:10%; class="display-4">Please log in first to see this page.</h1>';
}

?> 
 </div>
</body>
</html>


  