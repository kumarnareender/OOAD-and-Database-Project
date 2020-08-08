<?php include('update.php'); ?>


<?php

	$carno = $_GET['carno'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>update</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Change the Quantity And Price of Car<?php echo $carno; ?></h2>
  </div>
	 
  <form method="post" action="updateitem.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Quantity</label>
  		<input type="text" name="qntty" >
  	</div>
  	<div class="input-group">
  		<label>Price</label>
  		<input type="password" name="cprice">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="updateitem">Update</button>
  	</div>
  </form>
</body>
</html>