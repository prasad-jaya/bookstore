<!DOCTYPE html>
<html lang="en">
<?php
// Start the session
//session_start();
?>


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

<!-- <div class="loginwrapper">
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
				<input name="Log" value="Create a new account"> <br/> <br/>
				</div> 
				 <span class="psw"><a href="#">Forgot password?</a></span>
			</form>

		</div>
</div>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 4</div>
  <img src="../images/ss1.jpg" width = "100%">
  
</div>
<div class="mySlides fade">
  <div class="numbertext">2 / 4</div>
  <img src="../images/ss2.jpg" width = "100%">
  
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 4</div>
  <img src="../images/ss3.jpg" width="100%" >
  
</div>




</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> <br/><br/>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 3 seconds
}
</script>

<div id="temp_footer">
    
	       <a href="subpage.html">Home</a> | <a href="subpage.html">Search</a> | <a href="subpage.html">Books</a> | <a href="#">New Releases</a> | <a href="#">FAQs</a> | <a href="#">Contact Us</a><br />
       </br></br>
	   <div class="social">
<a href ="https://www.facebook.com/">
<img src ="../images/facebook.png" width="30px" height="30px"></a>
<a href ="https://www.instgram.com/">
<img src ="../images/insta.png" width="30px" height="30px"></a>
<a href ="https://www.twitter.com/">
<img src ="../images/twitter.png" width="30px" height="30px"></a>
<a href ="https://www.whatsapp.com/">
<img src ="../images/3.png" width="30px" height="30px"></a>
<a href ="https://www.viber.com/">
<img src ="../images/viber.png" width="30px" height="30px"></a>
</div>


	   
	   
	   
     </div> -->


    <form action="user_login.php" method="POST">
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
</div>
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
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $id;
                //setcookie("myCookie", $id, time() + 3600, "/php/"); 
                //header("url=../index.html");
                //header("Location: ../index.html");
                if (headers_sent()) {
                    die("Redirect failed. Please click on this link: <a href=...>");
                }
                else{
                    exit(header("../index.html"));
                }
               
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





