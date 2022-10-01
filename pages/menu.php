    <ul>        
        <?php 
            if($_SESSION['position'] == 'Admin'){
            ?>
                <li class="<?php echo $cashiers; ?>">
                    <a href="checkrep">
                        <span class="title">Cashiers</span>
                    </a>
                </li>
                <li class="<?php echo $controlCashiers; ?>">
                    <a href="controlrep">
                        <span class="title">Control Cashier</span>
                    </a>
                </li>
                <li class="<?php echo $createCashiers; ?>">
                    <a href="createsalesrep">
                        <span class="title">Create Cashier</span>
                    </a>
                </li>
                <li class="<?php echo $dashboard; ?>">
                    <a href="dashboard">
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="<?php echo $sales; ?>">
                    <a href="sales">
                        <span class="title">Make Sales</span>
                    </a>
                </li>
                <li class="<?php echo $mySales; ?>">
                    <a href="mysales">
                        <span class="title">My Sales</span>
                    </a>
                </li>
                <li class="<?php echo $addItems; ?>">
                    <a href="additems">
                        <span class="title">Products</span>
                    </a>
                </li>
                <li class="<?php echo $updateItems; ?>">
                    <a href="updateitems">
                        <span class="title">Update Products</span>
                    </a>
                </li>
                <li class="<?php echo $checkItems; ?>">
                    <a href="checkitems">
                        <span class="title">View Products</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="title">Logout</span>
                    </a>
                </li>

            <?php
            }
        ?>
    </ul>



    <ul>        
        <?php 
            if($_SESSION['position'] == 'Rep'){
            ?>
                <li class="<?php echo $dashboard; ?>">
                    <a href="repdashboard">
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="<?php echo $sales; ?>">
                    <a href="sales">
                        <span class="title">Make Sales</span>
                    </a>
                </li>
                <li class="<?php echo $mySales; ?>">
                    <a href="mysales">
                        <span class="title">My Sales</span>
                    </a>
                </li>
                <li class="<?php echo $checkItems; ?>">
                    <a href="checkitems">
                        <span class="title">View Products</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="title">Logout</span>
                    </a>
                </li>
            <?php
            }
        ?>
    </ul>
    