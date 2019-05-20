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
      <li class="nav-item ">
        <a class="nav-link" href="admin_add.php">Add Books <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_update.php">Update Items</a>
      </li>
      <li class="nav-item active">
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


<div class="container">
<div style="margin-top:50px"> 
<form action="admin-payment.php" method="POST" class="form-inline">
<div class="form-group row" style="margin-bottom:50px">
  <label for="example-date-input" class="col-1 col-form-label">Date</label>
  <div class="col-8">
    <input class="form-control" type="date" id="date" name="date" value="2019-05-19" id="example-date-input">
  </div>
  <button type="submit" class="btn btn-secondary col-3 ">Search</button>
</div>
</form>

<?php
   include_once '..\includes\dbconnect.php';
   
   $sql = 'SELECT * FROM payment;';
   $result = mysqli_query($conn,$sql);
   $resultCheck = mysqli_num_rows($result);

   $result_form = '   
   <table class="table">
   <thead>
       <tr>
       
       <th scope="col">PAY ID</th>
       <th scope="col">USER ID</th>
       <th scope="col">AMOUNT</th>
       <th scope="col">#ITEMS</th>
       <th scope="col">#DATE</th>
       </tr>
   </thead>
   <tbody>';

  

    if(isset($_POST['date'])){
        $date = $_POST['date'];
        $origDate = $date;
        $newDate = date("Y/m/d", strtotime($origDate));

        $sql = "SELECT * FROM payment WHERE date='$newDate';";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)){
                $i=1;
                $id = $row['pay_id'];
                $name = $row['user_id'];
                $price = $row['amount'];
                $no_of_items = $row['no_of_items'];
                $date = $row['date'];
                
                $result_form .= '
                     <tr>
                     
                     <td>'.$id.'</td>
                     <td>'.$name.'</td>
                     <td>'.$price.'</td>
                     <td>'.$no_of_items.'</td>
                     <td>'.$date.'</td>
                     </tr>';
           }

    }
}

    if($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)){

            

            $i=1;
            $id = $row['pay_id'];
            $name = $row['user_id'];
            $price = $row['amount'];
            $no_of_items = $row['no_of_items'];
            $date = $row['date'];
            
            $result_form .= '
                 <tr>
                 
                 <td>'.$id.'</td>
                 <td>'.$name.'</td>
                 <td>'.$price.'</td>
                 <td>'.$no_of_items.'</td>
                 <td>'.$date.'</td>
                 </tr>';
       }     
     }


    $result_form .='</tbody>
        </table>';
            print $result_form;

    
?>

</div>
</div>
<?php } 
else{
    print '<h1 style="text-align:center;margin-top:10%; class="display-4">Please log in first to see this page.</h1>';
}
?>

</body>
</html>