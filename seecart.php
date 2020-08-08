<?php include('server.php'); ?>
<?php 
  // session_start(); 

  if (!isset($_SESSION['username'])) {
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
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="css/product.css">
</head>
<body>

<div class="header">
	<h2>Your Cart</h2>
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
    	<p> <a href="index.php?logout='1'" style="color: purple;">logout</a> </p>
    <?php endif ?>
</div>
</div>
          <?php
             $_GET['currentPage']= 'index';
              include_once('menu.php'); 
          ?>
          <?php 
          $email = $_SESSION['email'];
          $query = "SELECT carname, cart.qntty, cprice, totalamount from cart, car where car.carno = cart.carno and email = '$email'";
          $data = mysqli_query($db,$query);
          $actualamount = 0;
          ?>
          <table style=" border:5px solid purple">
            <tr>
              <th>Car Name</th>
              <th>Cars In Cart</th>
              <th>Car Price</th>
              <th>Total Amount</th>
            </tr>

          <?php
          while ($results = mysqli_fetch_assoc($data)) {
            ?>
            <tr>
              <td><?php echo $results['carname']; ?></td>
              <td><?php echo $results['qntty']; ?></td>
              <td><?php echo $results['cprice']; ?></td>
              <td><?php echo $results['totalamount']; ?></td>
              <td><a type="submit" class="btn" href="transaction.php?carno= <?php echo $results['carno']?>">Adding in Transaction</a></td>
            </tr>
            <?php
            $actualamount = $actualamount+$results['totalamount'];
          }
          echo "<br/><br/><br/>Total amount is:  $".$actualamount;

          ?>
        </table>
</body>
</html>