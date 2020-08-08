<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
  <title>delete</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Deleting</h2>
  </div>
  <form method="post" action="delete.php">
  	<?php include('errors.php'); ?>

     <div class="input-group">
      <label>Email Address</label>
      <input type="text" name="email" >
    </div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="delete">Delete</button>
  	</div>
  </form>
</body>
</html>