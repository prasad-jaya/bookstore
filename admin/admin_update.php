<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Items</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../stylesheets/stylesheethome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function () {
        $(".delete_book").click(function() {
            var book_id = $(this).attr("id");
            //alert(book_id);
            $.ajax({
                url : "ajax-delete.php?book_id=" + book_id,
                success : function() {
                    $("#book-" + book_id).hide();
                }
            });
        });
    });
    
    </script>
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
      <li class="nav-item ">
        <a class="nav-link" href="admin_add.php">Add Books <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="admin_update.php">Update Items</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin-payment.php">Payment</a>
      </li>
    </ul>
    <span class="navbar-text active">
    <p style="text-align: center;">Welcome to Admin Panel <?php echo $username ?></p> 
    </span>
  </div>
</nav>
</div>

<body>


<div class="container"> 

<!--   <label class="sr-only" for="inlineFormInput">Name</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" name="book_id" placeholder="Book ID">

  <label class="sr-only" for="inlineFormInputGroup">Username</label>
  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon">Or</div>
    <input type="text" class="form-control" id="inlineFormInputGroup" name="book_name" placeholder="Book Name">
  </div>

  <button type="submit" class="btn btn-primary">Search</button>
</form> -->

<div style="margin-top:50px">

<div style="margin:50px 0 50px 0"> 
<form action="admin_update.php" method="POST" class="form-inline ">

<div class="form-group row" style="margin-bottom:50px"></div>
  <div class="col-4">
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" name="book_id" placeholder="Book ID">
  </div>
  <label for="example-date-input" class="col-1 col-form-label" style="text-align:center">OR</label>
  <div class="col-4">
  <input type="text" class="form-control" id="inlineFormInputGroup" name="book_name" placeholder="Book Name">
  </div>
  <button type="submit" class="btn btn-secondary col-3 ">Search</button>
  </form>
</div>


<?php 
   include_once '..\includes\dbconnect.php';

   if(isset($_POST['book_id'])){

        $B_NAME = $_POST['book_name'];
        $B_ID = $_POST['book_id'];
        echo $B_NAME;
        $sql = "SELECT * FROM books_details WHERE book_id='$B_ID' OR book_name='$B_NAME';";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
    
        $result_form = '   
        <table class="table" >
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            </tr>
        </thead>
        <tbody>';
            
        
        if($resultCheck > 0) {
             while ($row = mysqli_fetch_assoc($result)){
                 $ID = $row['book_id'];
                $NAME = $row['book_name'];
                 $PRICE = $row['price'];
                
                $result_form .= '
                <tr>
                <th scope="row">'.$ID.'</th>
                <td>'.$NAME.'</td>
                <td>'.$PRICE.'</td>
                </tr>';
            }
        }
        $result_form .='</tbody>
        </table>';
            print $result_form;
    }
    else{
        $sql = "SELECT * FROM books_details;";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result); 

        $result_form = '   
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">BOOK ID</th>
            <th scope="col">BOOK NAME</th>
            <th scope="col">PRICE</th>
            <th scope="col">Function</th>
            </tr>
        </thead>
        <tbody>';
            
        
        if($resultCheck > 0) {
             while ($row = mysqli_fetch_assoc($result)){
                 $ID = $row['book_id'];
                $NAME = $row['book_name'];
                 $PRICE = $row['price'];
                
                $result_form .= '
                <tr id="book-'.$ID.'">
                <th scope="row">'.$ID.'</th>
                <td>'.$ID.'</td>
                <td>'.$NAME.'</td>
                <td>'.$PRICE.'</td>
                <td> <a class="btn btn-info" type="button" href="admin_edit.php?book_id='.$ID.'">View</a> | <a id="'.$ID.'" class="delete_book btn btn-danger" type="button">Delete</a> </td> 
                </tr>';
            }
        }
        $result_form .='</tbody>
        </table>';
            print $result_form;
        
    }
?>
    
</div>

<?php } 
else{
    print '<h1 style="text-align:center;margin-top:10%; class="display-4">Please log in first to see this page.</h1>';
}
?>  

</body>
</html>


