<?php include('server.php'); ?>

<?php 
  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
  
<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> 
        <a href="index.php?logout='1'" style="color: red;">Logout</a>
        </p>
      <p>
        <a href="edit.php?edit='1'" style="color: green">Change password</a>
      </p>
    <?php endif ?>

    <?php if($_SESSION['email'] != 'k164008@nu.edu.pk') :?>
    <p>
        <a href="delete.php?delete='1'" style="color: blue">Delete</a>
    </p>

<?php endif ?>
</div>

          <?php
             $_GET['currentPage']= 'index';
              include_once('menu.php'); 
          ?>
		
</body>
</html>