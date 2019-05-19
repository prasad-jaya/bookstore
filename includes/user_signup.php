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
<body>

<!-- <form action="user_signup.php" method="POST">
        <div class="input-group mb-3">
            <span class="input-group-text" >User Name</span>
            <input type="text" id="user" name="user">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" >Password</span>
            <input type="text" id="pass" name="pass">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" >Name</span>
            <input type="text" id="pass" name="pass">
        </div>

        <input type="submit" id="btn" value="login" class="btn btn-secondary btn-lg">Login</button>
    </form>  -->

<div class="container"> 
    <h1 class="display-4">Sign Up !</h1> 
    <form style="margin-top:4%;"action="user_signup.php" method="POST">
    
    <div class="form-group">
        <label for="exampleInputPassword1">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
    </div>
    
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="user" name="user" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
    </div>

    <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input class="form-control" aria-label="With textarea" id="Address" name="Address" placeholder="Address"/>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Mobile Number</label>
        <input type="text" class="form-control" id="Number" name="Number" placeholder="Number">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>

<?php 
    
    include_once 'dbconnect.php';

    if(isset($_POST['user'])){
        $user_id = uniqid('user');
        $USER = $_POST['user'];
        $PASS = $_POST['pass'];
        $NAME = $_POST['name'];
        $address = $_POST['Address'];
        $number = $_POST['Number'];
        //$USER = stripcslashes($USER);

        $sql = "Insert into users (username,password,name,user_id,Address,Mobile_Number) values('$USER','$PASS','$NAME','$user_id','$address','$number');";
        $result = mysqli_query($conn,$sql);
        echo $result;
        if($result > 0) {
        header("Refresh:0; url=user_login.php");
        }
        else{
            $message = '<h3>Invalid Username ! Please try Another</h3>'; 
           print $message;
        }
    }
?>