<?php 
include('seecart.php'); ?>

<?php

// $db = mysqli_connect('localhost', 'root', '', 'inventory');
  $carno = $_GET['carno'];
  $email = $_SESSION['email'];
    $cart_query = "SELECT * from cart where email = '$email' and carno ='$carno'";
    $cart_results = mysqli_query($db,$cart_query);
    if(mysqli_num_rows($cart_results) == 1){
    $cart_data = mysqli_fetch_assoc($cart_results);
    
    $carno = $cart_data['carno'];
    $qntty = $cart_data['qntty'];
    $totalamount = $cart_data['totalamount'];

    $query = "INSERT INTO transactions(email,carno,amount) 
          values('$email','$carno','$totalamount')";
          mysqli_query($db,$query);
          echo "Transaction added successfully";
        }
 ?>