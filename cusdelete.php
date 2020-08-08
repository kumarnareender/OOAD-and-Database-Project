<?php include('account.php'); ?>

<?php
$cusid = $_GET['cusid'];
		$query = "SELECT email from users where cusid = '$cusid'";
		$data = mysqli_query($db,$query);
		$result = mysqli_fetch_assoc($data);
		$email = $result['email'];
		if(mysqli_num_rows($data) == 1){

			$query = "DELETE from cart where email = '$email'";
			mysqli_query($db, 	$query);

			$query = "DELETE from users where cusid = '$cusid'";
			mysqli_query($db, $query);
			echo "Customer Account and its Cart is Deleted";
		}
?>