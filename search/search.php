<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Search</title>
</head>
<link rel="stylesheet" type="text/css" href="../stylesheets/stylesheetstore.css">
<link rel="stylesheet" type="text/css" href="./search.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<!-- <button onclick="goBack()" style= "float:left; font-size:10px;">Go Back</button>
<button style="float:right; font-size:10px;" onclick="signOut()">Sign out</button> -->
<br/>

        <div id="temp_container">
		<div id="temp_menu">
    	<ul>
            <li><a href="/bookstore" class="current">HOME</a></li>
            <li><a href="/bookstore/search/search.php">Search</a></li>
            <li><a href="D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\mywatchlist.html">WATCH LIST</a></li>            
            <li><a href="D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\category.html">CATEGORIES</a></li>  
            <li><a href="D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\userprof.html">PROFILE</a></li>

            <li><a href="D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\About_us.html">ABOUT</a></li>
			<li><a href="D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\contactus.html">CONTACT US</a></li>   
			<li><a href = "D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\login.html"> Log In</a></li>
            <li><a href = "D:\Study Materials\Year 01\Semester 02\Assignments\IWT ASSIGNMENT\HTML Pages\Registration Page.html"> Sign Up</a></li>
            <li><a href = "../cart/my-cart.php"> My Cart</a></li>
		</ul>
	   </div> 
</div>
<body>
    
    <!-- Search form -->
    <!-- <div class="container">    
        <form action="search.php" method="POST" class="form-inline active-cyan-4">
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
    </div> -->

    <div class="container" style="margin-top: 2%;">
    <form action="search.php" method="POST">
    <br/>
	<div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form class="card card-sm">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input id="book_name" name="book_name" class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search Books">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
</form>
</div>
<div class="container" style="margin-top: 2%;">
<div style="display:flex;margin-top: 2%;">
    <?php
        include_once '..\includes\dbconnect.php';

        if(isset($_POST['book_name'])){
        $book_name = $_POST['book_name'].'%';
        $img = '../img/';
        $Hello = $book_name.'%';

            $sql = "SELECT * FROM books_details WHERE book_name LIKE '$book_name';";
            $result = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)){
                    $id = $row['book_id'];
                    $name = $row['book_name'];
                    $price = $row['price'];
                    $image = $row['image_src'];

                    $result_card = '<div class="col-md-3" style="width: 450px;">
                    <div class="card card2 style="width:18rem; display:table">
                    <img class="card-img-top" src="'.$img.$image.'" alt="Card image cap" style="height: 233px; width: 100%;">
                    <div class="card-body">
                      <h5 class="card-title">'.$name.'</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card s content.</p>
                      <div class="row">
                      <a type="button" href="search-process.php?id='.$id.'" class="btn btn-primary col-6">Add to Cart</a>
                      <a type="button" href="../payment/payment.php?items=1&total='.$price.'" class="btn btn-success col-6">Buy Now </a>
                      </div>
                    </div>
                  </div>
                  </div>';
                  
                  print $result_card;
                } 
                
            }
            
        
        }else{

        $img = '../img/';

		$sql = "SELECT * FROM books_details;";
		$result = mysqli_query($conn,$sql);
		$resultCheck = mysqli_num_rows($result);
            print '<div class="row">';
		if($resultCheck > 0) {
			while ($row = mysqli_fetch_assoc($result)){
				$id = $row['book_id'];
				$name = $row['book_name'];
				$price = $row['price'];
                $image = $row['image_src'];

				$result_card = '<div class="col-md-3" style="width: 450px;">
				<div class="card card2 style="width:18rem; display:table">
				<img class="card-img-top" src="'.$img.$image.'" alt="Card image cap" style="height: 233px; width: 100%;">
				<div class="card-body">
				  <h5 class="card-title">'.$name.'</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card s content.</p>
                  <div class="row">
				  <a type="button" href="search-process.php?id='.$id.'" class="btn btn-primary col-6">Add to Cart</a>
                  <a type="button" href="../payment/payment.php?items=1&total='.$price.'" class="btn btn-success col-6">Buy Now </a>
                  </div>
				</div>
              </div>
              </div>';
			  
			  print $result_card;
            } 
        }
        print '</div>';
    }

?>
</div>
</div>

</body>
</html>