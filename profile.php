
     
<?php
 include("auth.php");
 require_once 'conn.php';
 if (isset($_GET['user_id'])){
     $user= $_GET['user_id'] ;
  
		
    $query="SELECT * FROM member where mem_id='".$user."'" ;
    $my_result = $conn->query($query) ;
			
			if($my_row=$my_result->fetchArray()){
                $my_row = (object) $my_row;
                
                $my_id=$my_row->mem_id;
                // echo $my_id;
                $my_username=$my_row->username;
                // echo $my_username;
                $my_firstname=$my_row->firstname;
                // echo $my_firstname;
                $my_lastname=$my_row->lastname;
                // echo $my_lastname;
                $my_password=$my_row->password;
                // echo $my_password;
                
            }
           else{
            $_SESSION['error'] = "Invalid username or password";
			header('location:login.php');
        }
 }
 
 else {
     echo "user id not found";
     die();
}
?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Weather App</title>    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

      <script type="text/javascript" src="js/weather.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
		 <div class="container-fluid"  style="float:left">
			<a class="navbar-brand" >Hsoub Acadimy</a>
		</div>
        <div style="float:right">
			<a class="navbar-brand" href="weatherapp.php" >The App </a>
		</div> 
	</nav>
<div class="container-fluid">

<p>Welcome <?php echo $my_username; ?>!</p>
<p> <?php echo $my_id; ?>!</p>
<p> <?php echo $my_firstname; ?>!</p>
<p> <?php echo $my_lastname; ?>!</p>
<p> <?php echo $my_password; ?>!</p>
<p>This is secure area.</p>
<a href="logout.php">Logout</a>
<!-- <p> <?php echo '<script> alert("message successfully sent") </script>'; ?></p> -->

</div>
</body>
</html>