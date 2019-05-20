<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel = "stylesheet" type = "text/css" href = "../stylesheets/stylesheetlogin.css">
    
</head>
<div class="headerLogo">
	<a href="--home page--"><img src="../images/cento books.png"></a>
</div>

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

<body> 


<div class="container">

<div class="loginwrapper">
		<img src="../images/final.jpg">
		<div class = "loginwindow1">
		
			<img style="width: 100px; height: auto; margin-top: -100px;margin-left: -15px;" src="../images/unknown.png">
			<h3>Log in to your Account</h3>	
	

			<br/>
			<form class ="loginscreen" action="user_login.php" method="POST">
				<input type="text" id="user" name="user" placeholder="  Your E-mail"><br/><br/>
				<input type="password" id="pass" name="pass" placeholder="  Your Password"><br/><br/>
				<div class="sub">
				<input type="submit" name="Login" value="Login"> <br/><br/>
				<span class="psw"><a href="user_signup.php">Create a new account <br/> <br/>
				</div> 
				 <!-- <span class="psw"><a href="#">Forgot password?</a></span> -->
			</form>

		</div>
</div>





<!--     <form action="user_login.php" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" class="form-control" id="user" name="user" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
    </div>
   
    <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div> -->
<?php 
    include_once 'dbconnect.php';
    
    if(isset($_POST['user'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        //$user = stripcslashes($user);

        $sql = "Select name,user_id from users where username='$user' and password='$pass';";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
    
        if($resultCheck > 0) {
             while ($row = mysqli_fetch_assoc($result)){
                $id = $row['user_id'];
                $name = $row['name'];
                echo $name;
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $id;
                $_SESSION['name'] = $name;
                setcookie("myCookie", $id, time() + 3600, "/php/"); 
                header("Refresh:0; url=../index.html");
               
            }
            //echo "Susseee";
        }
        else{
           $message = '<h3>Invalid Username or Password!</h3>'; 
           print $message;
        }
    }
    //echo $_COOKIE["myCookie"]; 
?>

</body>
</html>





