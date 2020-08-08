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
	<link rel="stylesheet" type="text/css" href="css/product.css">
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
             $_GET['currentPage']= 'index.php';
              include_once('menu.php');
         ?>
          <table style=" border:5px solid pink">
            <tr>
              <th>Car_Model</th>
              <th>Car_Name</th>
              <th>Car_Price</th>
              <th>Available_Cars</th>
              <th>Made_In</th>
              <th>Company</th>
            </tr>
          <?php
          $query = "SELECT * from car,company where car.makeid = company.compid";
          $data = mysqli_query($db, $query);
          while($result = mysqli_fetch_assoc($data))
          {
            // $_SESSION['model'] = $result['model'];

              ?>
               <tr>
              <th><?php echo $result['model']; ?></th>
              <th><?php echo $result['carname']; ?></th>
              <th><?php echo $result['cprice'];?></th>
              <th><?php echo $result['qntty']; ?></th>
              <th><?php echo $result['year']; ?></th>
              <th><?php echo $result['compname'];?></th>
              <th><div class="input-group"><a type="submit" class="btn" href="deletecar.php?carno= <?php echo $result['carno'] ?>">Delete item</a></div></th>
              </tr>
            
            <?php
            
          }
          ?>
               </table>
</body>
</html>