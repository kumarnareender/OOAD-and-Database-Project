<?php include('server.php'); ?>
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
	<title>incoming</title>
	<link rel="stylesheet" type="text/css" href="css/product.css">
</head>
<body>

<div class="header">
	<h2>Coming soon</h2>
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
          <table style="border:5px solid blue" >
            <tr>
              <th>Car_Model</th>
              <th>Car_Name</th>
              <th>Company</th>
              <td>Arriving</td>
            </tr>
          <?php
          $query = "SELECT * from car,company where car.makeid = company.compid and qntty <=2";
          $data = mysqli_query($db, $query);
          function return_date()
          {
              $start = strtotime("7 december 2018");
              $end = strtotime("20 december 2018");
              $timestamp = mt_rand($start, $end);
              return date("d-M-Y", $timestamp);
          }

          while($result = mysqli_fetch_assoc($data))
          {
              ?>
              <tr>
              <th><?php echo $result['model']; ?></th>
              <th><?php echo $result['carname']; ?></th>
              <th><?php echo $result['compname'];?></th>
              <td><?php echo return_date(); ?></td>
              </tr>
            
            <?php
            
          }
          ?>
               </table>

</body>
</html>