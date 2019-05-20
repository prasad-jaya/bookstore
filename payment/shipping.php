<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel = "stylesheet" type = "text/css" href = "../stylesheets/stylesheetlogin.css">

    <div id="temp_container">
		<div id="temp_menu">
    	<ul>
            <li><a href="/bookstore" class="current">HOME</a></li>
            <li><a href="/bookstore/search/search.php">Search</a></li>
            <!-- <li><a href="D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\mywatchlist.html">WATCH LIST</a></li> -->            
             
            <li><a href="./includes/user_edit_profile.php">PROFILE</a></li> 
            <li><a href="D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\About_us.html">ABOUT</a></li>
			<li><a href="D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\contactus.html">CONTACT US</a></li>
			<li><a href = "./includes/user_login.php"> Log In</a></li>
			<li><a href = "D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\Registration Page.html"> Sign Up</a></li>
		</ul>
	   </div> 
</div>

</head>
<?php
session_start();
include_once '../includes/dbconnect.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if (isset($_SESSION['name'])){
        $username=$_SESSION['name'];
    }

    $userid=$_SESSION['username'];
    $sql = "Select * from users where user_id ='$userid';";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0) {
         while ($row = mysqli_fetch_assoc($result)){
             $NAME = $row['name'];
             $EMAIL = $row['username'];
             $PASS = $row['password'];
             $ADDRESS = $row['Address'];
             $NUMBER = $row['Mobile_Number'];
            //echo $row['username'];
            //echo $PASS;
        }
    }
?>
<body>

<div class="container">
    <h1 class="display-4">Order Now !</h1>  
    <form action="shipping.php" method="POST">
    
    <div class="form-group">
        <label for="exampleInputPassword1">Name</label>
        <input type="text" class="form-control" id="name" name="name" value= '<?php echo $NAME ?>'  placeholder=<?php echo $NAME ?>>
    </div>
    
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" class="form-control" id="user" name="user" value= '<?php echo $EMAIL?>'>
        
    </div>
    
    <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input class="form-control" aria-label="With textarea" id="Address" name="Address" value= '<?php echo $ADDRESS?>'>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Mobile Number</label>
        <input type="text" class="form-control" id="Number" name="Number" value= '<?php echo $NUMBER?>'>
    </div>
    
    <button href="/"type="submit" class="btn btn-primary">Order Now</button>

    </form>
</div>

<?php 
 if(isset($_POST['Address'])){
    header("Refresh:0; url=../");
}
?>
<?php } 
else{
    print '<h1 style="text-align:center;margin-top:10%; class="display-4">Please log in first to see this page.</h1>';
}
?>
</body>
</html>