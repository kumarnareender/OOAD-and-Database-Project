
	<div id="menu">
    <ul>
        <?php if ($_SESSION['email'] != 'k164008@nu.edu.pk'):?>

            <li><a href="product.php" <?php if($_GET['currentPage'] == 'product') echo 'class="active"'; ?>>Products</a></li>
        
        <li><a href="seecart.php" <?php if($_GET['currentPage'] == 'seecart') echo 'class="active"'; ?>>Your cart</a></li>
        <li><a href="seetransaction.php" <?php if($_GET['currentPage'] == 'seetransaction') echo 'class="active"'; ?>>Your Transaction</a></li>

        <?php endif ?>
        <li><a href="incoming.php" <?php if($_GET['currentPage'] == 'incoming') echo 'class="active"'; ?>>Incoming products</a></li>
        <?php if($_SESSION['email'] == 'k164008@nu.edu.pk'): ?>
        
        <li><a href="adminproduct.php" <?php if($_GET['currentPage'] == 'adminproduct') echo 'class="active"'; ?>>Products</a></li>

        <li><a href="additem.php" <?php if($_GET['currentPage'] == 'additem') echo 'class="active"'; ?>>Add new car in the database</a></li>
        <li><a href="update.php" <?php if($_GET['currentPage'] == 'update') echo 'class="active"'; ?>>Update Car</a></li>
        <li><a href="reports.php" <?php if($_GET['currentPage'] == 'reports') echo 'class="active"'; ?>>Reports</a></li>

        <li><a href="account.php" <?php if($_GET['currentPage'] == 'account') echo 'class="active"'; ?>>Accounts</a></li>

        <li><a href="admintransactions.php" <?php if($_GET['currentPage'] == 'transactions') echo 'class="active"'; ?>>Transactions</a></li>
        <?php endif ?>
   	</ul>
	</div>