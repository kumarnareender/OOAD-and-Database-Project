<?php include('admintransactions.php'); ?>

<?php

	$transacno = $_GET['transacno'];
	$query = "SELECT * from transactions where transacno = '$transacno'";
	$data = mysqli_query($db, $query);
	if(mysqli_num_rows($data) == 1)
	{
		$query = "DELETE from transactions where transacno = $transacno";
		mysqli_query($db,$query);
		echo "Transaction Cancelled";
	}
?>