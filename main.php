<?php
    session_start();
    if($_SESSION['username']){
        
    }else{
        header('location: login.php');
    }

    if($url[0] == 'dashboard'){
        $dashboard = 'active';
        echo "<title>Dashboard | Vivian Store</title>";
    }
    else if($url[0] == 'checkrep'){
        $cashiers = 'active';
        echo "<title>Cashiers | Vivian Store</title>";
    }
    else if($url[0] == 'controlrep'){
        $controlCashiers = 'active';
        echo "<title>Control Cashiers | Vivian Store</title>";
    }
    else if($url[0] == 'createsalesrep'){
        $createCashiers = 'active';
        echo "<title>Create Cashiers | Vivian Store</title>";
    }
    else if($url[0] == 'sales'){
        $sales = 'active';
        echo "<title>Make Sales | Vivian Store</title>";
    }
    else if($url[0] == 'mysales'){
        $mySales = 'active';
        echo "<title>My Sales | Vivian Store</title>";
    }
    else if($url[0] == 'additems'){
        $addItems = 'active';
        echo "<title>Add Product | Vivian Store</title>";
    }
    else if($url[0] == 'updateitems'){
        $updateItems = 'active';
        echo "<title>Update Product | Vivian Store</title>";
    }
    else if($url[0] == 'checkitems'){
        $checkItems = 'active';
        echo "<title>Check Product | Vivian Store</title>";
    }
?>
<?php include('includes/header.php'); ?>

    <!-- ============ Main Parent Body Container -->
    <div class="mainContainer">
        <div class="container-fluid">
            <div class="row">
                <!-- ============ Left Side ============ -->
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 leftNavSection">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 topLeftLogo">
                            <h2><span>V</span>ivian's<span> S</span>tore</h2>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 menuBox">
                            <?php include('pages/menu.php'); ?>
                        </div>
                    </div>
                </div>

                <!-- ============ Right Side ============ -->
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                    <div class="row">
                        <!-- ============ Top Nav =========== -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 topNavSection">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 topNavLeftSection">
                                    <h1>Welcome</h1>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 topNavRightSection">
                                    <img src="assets/2.jpg" alt="profile picture" width="50px" height="50px" style="border-radius:50%;">
                                    <h1><?php echo $_SESSION['username']; ?></h1>
                                </div>
                            </div>
                        </div>

                        <!-- Main Dynamic Section -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 dynamicBodyBox">
                            <?php include($pages);?>
                        </div>

                        <!-- ============ Footer Section -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 footerSection">
                            2021 All Rights Reserve.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>