<?php 
include('adminproduct.php'); ?>

<?php

	$carno = $_GET['carno'];
    echo "$carno";
	$car_query = "SELECT * FROM car where carno = '$carno'";
	$car_results = mysqli_query($db, $car_query);

    if(mysqli_num_rows($car_results) == 1){
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
          $query = "SELECT * from car, company where car.makeid = company.compid and carno = '$carno'";
          $data = mysqli_query($db, $query);
          $result = mysqli_fetch_assoc($data);
              ?>
               <tr>
              <th><?php echo $result['model']; ?></th>
              <th><?php echo $result['carname']; ?></th>
              <th><?php echo $result['cprice'];?></th>
              <th><?php echo $result['qntty']; ?></th>
              <th><?php echo $result['year']; ?></th>
              <th><?php echo $result['compname'];?></th>
              </tr>
            
            <?php
                $query = "DELETE from car where carno = '$carno'";
                        mysqli_query($db,$query);
            echo "Car deleted successfully";
          }
          ?>
               </table>