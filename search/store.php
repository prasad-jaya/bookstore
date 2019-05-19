<!DOCTYPE html>
<html>
<head>
		
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Store </title>

<link rel="stylesheet" type="text/css" href="../stylesheets/stylesheetstore.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<button onclick="goBack()" style= "float:left; font-size:10px;">Go Back</button>
<button style="float:right; font-size:10px;" onclick="signOut()">Sign out</button>
<br/>

        <div id="temp_container">
		<div id="temp_menu">
    	<ul>
            <li><a href="D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\home.html">HOME</a></li>
            <li><a href="D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\store.html"class="current">STORE</a></li>
            <li><a href="D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\mywatchlist.html">WATCH LIST</a></li>            
            <li><a href="D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\category.html">CATEGORIES</a></li>  
            <li><a href="D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\userprof.html">PROFILE</a></li> 
            <li><a href="D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\About_us.html">ABOUT</a></li>
			<li><a href="D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\contactus.html">CONTACT US</a></li>   
			<li><a href = "D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\login.html"> Log In</a></li>
			<li><a href = "D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\Registration Page.html"> Sign Up</a></li>
		</ul>
	   </div> 
</div>


<body>


<div class="top">
<h1 class="header">Store</h1>
<!-- Search form -->
<div class="container">    
        <form action="store.php" method="POST" class="form-inline active-cyan-4">
        <input class="form-control form-control-sm mr-3 w-75" id="book_name" name="book_name" type="text" placeholder="Search" aria-label="Search">
        <i class="fas fa-search" aria-hidden="true"></i>

        <select class="mdb-select" searchable="Search here..">
        <option value="1" disabled selected>Choose your option</option>
        <option value="2" data-icon="https://mdbootstrap.com/img/Photos/Avatars/avatar-1.jpg" class="rounded-circle">example
            1</option>
        <option value="3" data-icon="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle">example
            2</option>
        <option value="4" data-icon="https://mdbootstrap.com/img/Photos/Avatars/avatar-3.jpg" class="rounded-circle">example
            1</option>
        </select>

        <button type="submit" class="btn btn-primary">Search</button>

        </form>
</div>
</div>
<br/>

<!-- <div class="MainDiv">
<div  class="pad"> <a href> book 1</a></div>
<div class="pad"><a href>  book 2</a></div>
<div class="pad"><a href>  book 3</a></div>
<div class="pad"><a href>  book 4</a></div>
<div class="pad"><a href>  book 5</a></div>
<div class="pad"><a href>  book 6</a></div>
<div class="pad"> <a href> book 7</a></div>
<div class="pad"><a href>  book 8</a></div>
<div class="pad"> <a href> book 9</a></div>
<div class="pad"> <a href> book 10</a></div>
</div><br/><br/>
</div> -->
<div  style="display:flex;margin-left:10px;margin-right:10px;">
<?php 
	include_once '..\includes\dbconnect.php';

	
	$img = '../img/bo.png';

		$sql = "SELECT * FROM books_details;";
		$result = mysqli_query($conn,$sql);
		$resultCheck = mysqli_num_rows($result);

		if($resultCheck > 0) {
			while ($row = mysqli_fetch_assoc($result)){
				$id = $row['book_id'];
				$name = $row['book_name'];
				$price = $row['price'];

				$result_card = '
				
				<div class="card card2 style="width: 10rem; display:table">
				<img class="card-img-top" src="'.$img.'" alt="Card image cap">
				<div class="card-body">
				  <h5 class="card-title">'.$name.'</h5>
				  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card s content.</p>
				  <a type="button" href="search-process.php?id='.$id.'" class="btn btn-primary">Add to Cart</a>
				  <a type="button" href="payment-process.php?id='.$id.'" class="btn btn-success">Buy Now </a>
				</div>
			  </div>';
			  
			  print $result_card;
			} 
		}
		
	
	
?>
</div>

<div id="temp_footer">
    
	       <a href="subpage.html">Home</a> | <a href="subpage.html">Search</a> | <a href="subpage.html">Books</a> | <a href="#">New Releases</a> | <a href="#">FAQs</a> | <a href="#">Contact Us</a><br />
       </br></br>
	   <div class="social">
<a href ="https://www.facebook.com/">
<img src ="images/facebook.png" width="30px" height="30px"></a>
<a href ="https://www.instgram.com/">
<img src ="images/insta.png" width="30px" height="30px"></a>
<a href ="https://www.twitter.com/">
<img src ="images/twitter.png" width="30px" height="30px"></a>
<a href ="https://www.whatsapp.com/">
<img src ="images/3.png" width="30px" height="30px"></a>
<a href ="https://www.viber.com/">
<img src ="images/viber.png" width="30px" height="30px"></a>
</div>


			

</body>
</html>