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
	<title>Accounts</title>
	<link rel="stylesheet" type="text/css" href="css/product.css">
</head>
<body>

<div class="header">
	<h2>Users Accounts</h2>
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
              <th>Name</th>
              <th>Email</th>
              <th>Phone NO:</th>
            </tr>
          <?php
          $query = "SELECT * from users where email != 'k164008@nu.edu.pk'";
          $data = mysqli_query($db, $query);
          while($result = mysqli_fetch_assoc($data))
          {
            // $_SESSION['model'] = $result['model'];

              ?>
               <tr>
              <th><?php echo $result['username']; ?></th>
              <th><?php echo $result['email']; ?></th>
              <th><?php echo $result['phone'];?></th>
              <th><div class="input-group"><a type="submit" class="btn" href="cusdelete.php?cusid= <?php echo $result['cusid'] ?>">Delete customer</a></div></th>
              </tr>
            
            <?php
            
          }
          ?>
               </table>
</body>
</html>