<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login</title>
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
<div class="headerLogo">
	<a href="--home page--"><img src="../images/cento books.png"></a>
</div>
<?php
session_start();
include_once 'dbconnect.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    
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
    //echo "Welcome to the member's area, " .$NAME . "!";
    print '<h3 style="text-align: center;">Welcome to the profile, '.$NAME .' !"</h3> ';

//include_once 'dbconnect.php';

if(isset($_POST['user'])){
    
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];
    $address = $_POST['Address'];
    $number = $_POST['Number'];
    //$USER = stripcslashes($USER);
    //echo $name;
    $sql = "Update users SET username = '$user', password = '$pass', name = '$name',Address='$address', Mobile_Number='$number' where user_id ='$userid';";
    mysqli_query($conn,$sql);
    header("Refresh:0");
}

    
$html = '<div class="container">
    <h1 class="display-4">My Profile !</h1>  
    <form action="user_edit_profile.php" method="POST">
    
    <div class="form-group">
        <label for="exampleInputPassword1">Name</label>
        <input type="text" class="form-control" id="name" name="name" value= '.$NAME.'  placeholder=<?php echo $NAME ?>
    </div>
    
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" class="form-control" id="user" name="user" value= '.$EMAIL.'>
        
    </div>
    
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="pass" name="pass" value= '.$PASS.'>
    </div>

    <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input class="form-control" aria-label="With textarea" id="Address" name="Address" value= '.$ADDRESS.'>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Mobile Number</label>
        <input type="text" class="form-control" id="Number" name="Number" value= '.$NUMBER.'>
    </div>
    
    <button href="/"type="submit" class="btn btn-primary">Save</button>

    </form>
</div>';
    print $html;
   



} else {
    echo "Please log in first to see this page.";

} 


?>

</body>
</html>



