<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'inventory');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phone = mysqli_real_escape_string($db,$_POST['phone']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($phone)) { array_push($errors, "Mobile_no is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	   array_push($errors, "Passwords does not match");
  }
  if (strlen($username) > 20 && strlen($phone) > 15 && strlen($password_1) > 20) {
    array_push($errors, "Maximum character for Name is 20 and Maximum character for Password is 20 and Maximum character for Phone is 15");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "Email already exists please enter different email");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, phone,password) 
  			  VALUES('$username', '$email', '$phone', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    $_SESSION['email'] = $email;
  	header('location: index.php');
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
    array_push($errors, "Email is require");
  }
  if (empty($password)) {
    array_push($errors, "Password is require");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $results = mysqli_query($db, $query);
    $data = mysqli_fetch_assoc($results);
    if (mysqli_num_rows($results) == 1 && $email != 'k164008@nu.edu.pk') {
      $_SESSION['username'] = $data['username'];
      $_SESSION['success'] = "You are now logged in";
      $_SESSION['email'] = $data['email'];
      header('location: index.php');
    }else {
      array_push($errors, "Incorrect email or password");
    }
  }
}

//deleting account
if(isset($_POST['delete'])){

    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)) { array_push($errors, "Email is require"); }
    if (empty($password)) { array_push($errors, "Password is require"); }

    if (count($errors) == 0) {
    $password = md5($password);
    // echo $_POST['email']." ".$_POST['password'];
    $query = "SELECT * FROM users WHERE email = '$email' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $query = "DELETE from users WHERE email = '$email' AND password = '$password'";
      mysqli_query($db,$query);
    }else {
      array_push($errors, "Incorrect email or password");
    }
  }
    echo "Your account Has been deleted successfully";
    // header("location: register.php");
  }

//changing password
if(isset($_POST['update'])){

    $oldpassword = mysqli_real_escape_string($db, $_POST['oldpassword']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    if (empty($oldpassword)) { array_push($errors, "Current password is require"); }
    if (empty($password_1)) { array_push($errors, "New password is require"); }
    if ($password_1 != $password_2) {
     array_push($errors, "Passwords does not match");
  }

  // Finally, change the password of  user account if there are no errors in the form
  
  if (count($errors) == 0) {
    $oldpassword = md5($oldpassword);//encrypt the password before saving in the database
    
    if (isset($_SESSION['email'])){ 
      
      $email = $_SESSION['email'];
}

    $query = "SELECT password from users where email = '$email' and password = '$oldpassword'";
          $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) {
      $password_1 = md5($password_1);
      $query = " UPDATE users SET password='$password_1' WHERE email='$email'";
      mysqli_query($db,$query);
      com_message_pump("Your password changed successfully");
      header('location:index.php');

    }else {
      array_push($errors, "Incorrect Password");
    }
  }
}

//Login Admin.
if (isset($_POST['login_admin'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
    array_push($errors, "Email is require");
  }
  if (empty($password)) {
    array_push($errors, "Password is require");
  }

  if (count($errors) == 0 ) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $results = mysqli_query($db, $query);
    $data = mysqli_fetch_assoc($results);
    if (mysqli_num_rows($results) == 1 && $email == 'k164008@nu.edu.pk') {
      $_SESSION['username'] = $data['username'];
      $_SESSION['success'] = "You are now logged in";
      $_SESSION['email'] = $data['email'];
      header('location: index.php');
    }else {
      array_push($errors, "Incorrect email or password");
    }
  }
}


//inserting Items
if (isset($_POST['insert'])) {
  // receive all input values from the form
  $model = mysqli_real_escape_string($db, $_POST['model']);
  $carname = mysqli_real_escape_string($db, $_POST['carname']);
  $cprice = mysqli_real_escape_string($db,$_POST['cprice']);
  $qntty = mysqli_real_escape_string($db, $_POST['qntty']);
  $year = mysqli_real_escape_string($db, $_POST['year']);
  $makeid = mysqli_real_escape_string($db, $_POST['makeid']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($model)) { array_push($errors, "What is the Model"); }
  if (empty($carname)) { array_push($errors, "What is Car Name"); }
  if (empty($cprice)) { array_push($errors, "How much Price"); }
  if (empty($qntty)) { array_push($errors, "How much Quantity"); }
  if (empty($year)) { array_push($errors, "Car made year"); }
  if (empty($makeid)) { array_push($errors, "Company Id is required");}

  $check_car = "SELECT compid from company where compid = '$makeid' LIMIT 1";
  $result = mysqli_query($db,$check_car);
  if(mysqli_num_rows($result) != 1){ array_push($errors, "Sorry there is not company of this Company id");}
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $car_check_query = "SELECT * FROM car WHERE model='$model' and makeid = '$makeid' LIMIT 1";
  $result = mysqli_query($db, $car_check_query);
  $car = mysqli_fetch_assoc($result);
  
  if ($car) { // if user exists
    if ($car['model'] == $model && $car['makeid'] == $makeid) {
      array_push($errors, "Car already exists Enter new Car data or Update it");
    }
  }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $query = "INSERT INTO car(model, carname, cprice, qntty, year, makeid) 
                    VALUES('$model', '$carname', '$cprice', '$qntty', '$year','$makeid')";
      
      mysqli_query($db, $query);
      echo "Inserted successfully";
  }
}

if(isset($_POST['updateitem']))
{
  $qntty = mysqli_real_escape_string($db, $_POST['qntty']);
  $cprice = mysqli_real_escape_string($db, $_POST['cprice']);

  if (empty($qntty) && empty($cprice)) { 

    array_push($errors, "Please Enter Quantity Or Car price you want to change"); 
}
}

?>