<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../stylesheets/stylesheetstore.css">
    <link rel="stylesheet" type="text/css" href="cart.css">
    <link rel="stylesheet" type="text/css" href="../stylesheets/search.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    

    <div id="temp_container">
		<div id="temp_menu">
    	<ul>
           
            <li><a href="/bookstore" class="current">HOME</a></li>
            <li><a href="/bookstore/search/search.php">Search</a></li>
            <!-- <li><a href="D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\mywatchlist.html">WATCH LIST</a></li> -->            
             
            <li><a href="../includes/user_edit_profile.php">PROFILE</a></li>
            <li><a href = "../cart/my-cart.php"> My Cart</a></li> 
            <li><a href="../About_us.html">ABOUT US</a></li>
			<li><a href="../contactus.html">CONTACT US</a></li>
			<li><a href = "../includes/user_login.php"> Log In</a></li>
            <li><a href = "../includes/user_signup.php"> Sign Up</a></li>
            <li><a href = "../includes/logout.php"> Log Out</a></li>
		</ul>
	   </div> 
</div>

</head>
<body>
<?php
session_start();
include_once '../includes/dbconnect.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?> 
  
<div class="container" >
    <?php $no =0; ?>
    
    <div class="row" style="display:flex;margin-top: 6%;" >
    <?php
    include_once '..\includes\dbconnect.php';
    $status = 'PENDING';
    $userid = $_SESSION['username'];
    $sqll = "SELECT item_id FROM cart WHERE status ='$status' AND user_id='$userid';"; //Get the cart from Logged User
    $result = mysqli_query($conn,$sqll);
    $resultCheck = mysqli_num_rows($result);
    $no=0;
    $totprice=0;
    if($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)){          
            $item_id = $row['item_id'];
            
            $sql = "SELECT * FROM books_details WHERE book_id ='$item_id';";
            $result2 = mysqli_query($conn,$sql);
            $resultCheck2 = mysqli_num_rows($result);

            
            if($resultCheck2 > 0) {
                $price = 0;
                $itms = 0;
                while ($row = mysqli_fetch_assoc($result2)){
                    $img = '../img/';
                    $id = $row['book_id'];
                    $name = $row['book_name'];
                    $price = $row['price'];
                    $image = $row['image_src'];
                    $no++;
                    $result_card = '<div class="col-md-3"style="margin-right: 0px;">
                    <div class="card" style="width: 15rem;margin: 10px;">
                    <img class="card-img-top" src="'.$img.$image.'" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">'.$name.'</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card s content.</p>
                    <a type="button" href="cart-process.php?id='.$id.'" class="btn btn-danger">Remove</a>
                    <a type="button" href="../payment/payment.php?items=1&total='.$price.'" class="btn btn-success">Buy Now </a>
                    </div>
                </div>
                </div>';
                
                print $result_card;
                
                }
                $no += $itms;
                $totprice += $price;
                
            } 
        
        }
    }
    
    
    //echo "NO of Items : " ;print $no;
    //echo "NO of Items : " ;print $totprice;
    ?>
    </div>
    </div>

<?php
$items = '<div class="row headding"><h6 class="offset-2 col-md-5">Total No Of Items : '.$no.' </h6><h6 class="col-md-5">Total Amount : '.$totprice.' </h6></div>';
$amount = '';
print $items;
//print $amount;

?>
    
    
<a href="../payment/payment.php?items=<?php echo $no?>&total=<?php echo $totprice?>" class="offset-4 col-3 btn btn-primary btn-lg" type="button">Buy Now !</a>
<?php } 
else{
    print '<h1 style="text-align:center;margin-top:10%; class="display-4">Please log in first to see this page.</h1>';
}

?>                 

</body>
</html>