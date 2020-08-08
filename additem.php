<?php include('server.php') ?>

<?php 
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Products</title>
  <link rel="stylesheet" type="text/css" href="css/additem.css">
</head>
<body>

<div class="header">
  <h2>Available Products In Stocks</h2>
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
      <p> <a type="submit" class="btn" href="index.php?logout='1'" style="color: purple;">logout</a> </p>
    <?php endif ?>
</div>


<?php
             $_GET['currentPage']= 'additem.php';
              include_once('menu.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Adding Items</title>
  <link rel="stylesheet" type="text/css" href="css/additem.css">
</head>
<body>
  <div class="header">
  	<h2>Adding items</h2>
  </div>
	
  <form method="post" action="additem.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Model</label>
  	  <input type="text" name="model">
  	</div>
  	<div class="input-group">
  	  <label>Car name</label>
  	  <input type="text" name="carname">
  	</div>
    <div class="input-group">
      <label>Car Price</label>
      <input type="number" name="cprice">
    </div>
  	<div class="input-group">
  	  <label>Quantity</label>
  	  <input type="number" name="qntty">
  	</div>
  	<div class="input-group">
  	  <label>Year</label>
  	  <input type="number" name="year">
  	</div>
    <div class="input-group">
      <label>Company Id</label>
      <input type="number" name="makeid">
    </div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="insert">Insert</button>
  	</div>
  </form>
</body>
</html>