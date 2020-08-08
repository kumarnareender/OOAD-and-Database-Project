<?php 
include('product.php'); ?>

<?php

// $db = mysqli_connect('localhost', 'root', '', 'inventory');
	$carno = $_GET['carno'];
	$email = $_SESSION['email'];
	// echo $model;

	$car_query = "SELECT * FROM car where carno = '$carno'";
	$car_results = mysqli_query($db, $car_query);
    $car_data = mysqli_fetch_assoc($car_results);
    
    	// echo $car_data['year']."<br/>";
    $makeid = $car_data['makeid'];
    $price = $car_data['cprice'];

    $cart_query = "SELECT * from cart where email = '$email' and carno ='$carno'";
    $cart_results = mysqli_query($db,$cart_query);
    $cart_data = mysqli_fetch_assoc($cart_results);
    
    if($cart_data['email'] == $email){
    	// echo "$email";
    	if($car_data['qntty'] > 0){
    		$car_qntty = $car_data['qntty']-1;
    $cart_query = "SELECT * from cart where email = '$email' and carno ='$carno'";
    $cart_results = mysqli_query($db,$cart_query);
    $cart_data = mysqli_fetch_assoc($cart_results);

    $amount = $cart_data['totalamount']+$price;
    $qntty = $cart_data['qntty']+1;

    $query = "UPDATE cart SET qntty='$qntty', totalamount = '$amount' 
    		WHERE email='$email' and carno = '$carno'";
    
    		mysqli_query($db,$query);
    		echo "Adding to cart";

    $query = "UPDATE car SET qntty='$car_qntty' WHERE carno = '$carno'";
    
    		mysqli_query($db,$query);
    }
    else{
    	echo "Sorry Car is not available in the stock";
    }
    }
    else{
        if($car_data['qntty'] > 0){
    	$qntty = 1;
    	$query = "INSERT INTO cart(email,compid,carno,qntty,totalamount) 
    				values('$email','$makeid','$carno','$qntty','$price')";
    		mysqli_query($db,$query);
            $car_qntty = $car_data['qntty']-1;
            $query = "UPDATE car SET qntty='$car_qntty' WHERE carno = '$carno'";
            mysqli_query($db,$query);

            echo "Adding to cart successfully";
    	}
        else{
        echo "Sorry Car is not available in the stock";
    }

    }
 ?>