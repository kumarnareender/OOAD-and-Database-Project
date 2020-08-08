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
	<title>Transaction</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Your Transactions</h2>
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
    <?php
          $_GET['currentPage']= 'index';
          include_once('menu.php');
    ?>

    <table style="border:1px solid blue" >
            <tr>
              <td>Car_Model</td>
              <th>Car_Name</th>
              <td>Company</td>
              <th>Total Amount</th>
              <td>Transac Time</td>
              <td>Receiving Time</td>
            </tr>
          <?php
          $email = $_SESSION['email'];
          $query = "SELECT * from car, Transactions, company where Transactions.carno = car.carno and car.makeid = company.compid and email = '$email'";
          $data = mysqli_query($db, $query);
          function receive_date()
          {
              $start = strtotime("5 december 2018");
              $end = strtotime("15 december 2018");
              $timestamp = mt_rand($start, $end);
              return date("d-M-Y", $timestamp);
          }
          $actualamount = 0;
          while($result = mysqli_fetch_assoc($data))
          {
              ?>
              <tr>
              <th><?php echo $result['model']; ?></th>
              <td><?php echo $result['carname']; ?></td>
              <th><?php echo $result['compname'];?></th>
              <td><?php echo $result['amount']; ?></td>
              <td><?php echo $result['date']; ?></td>
              <th><?php echo receive_date(); ?></th>
              </tr>
            <?php
            $actualamount = $actualamount+$result['amount'];
          }
          echo "<br/><br/>Total Amount is:  $".$actualamount;
          ?>
               </table>
</body>
</html>