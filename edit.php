<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>edit account</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
	<p>Changing password</p>
</div>
	<form method="post" action="edit.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Current password</label>
  		<input type="password" name="oldpassword" >
  	</div>
  	<div class="input-group">
  	  <label>Enter new password</label>
  	  <input type="password" name="password_1">
  	</div>
  	
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="update">Update</button>
  	</div>


</body>
</html>