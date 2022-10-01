<?php
    include('config/dblink.php');
    $collect = new Vic();

    session_start();
    if($_SESSION['username']){
        //allow
    } else{
        header('location: login');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Invoice - Vivian's Store</title>
    <link rel="stylesheet" href="styles/bootstrap.css">
    <link rel="stylesheet" href="styles/print.css" media="print">
    <style>
        body{
            color-adjust: exact !important;
            -webkit-print-color-adjust: exact !important;
        }
    </style>
</head>
<body>
    <div class="container" style="width:800px;">
        <div class="row" style="background:cornflowerblue;color:#fff;padding:20px;">
            <div class="col-md-7 col-lg-7 col-xs-7">
                <h1 style="font-size:50px;margin-left:70px;">Vivian's Store</h1>
            </div>
            <div class="col-md-2 col-lg-2 col-xs-2">
                <p>0903 905 5321</p>
                <p>Vivian@gmail.com</p>
                <p>www.Vivian.com</p>
            </div>
            <div class="col-md-3 col-lg-3 col-xs-3">
                <p>Ceap Rumuola</p>
                <p>PH, Rivesr, Nigeria</p>
                <p>1476</p>
            </div>
        </div>

        <div class="row" style="border-bottom:1px solid cornflowerblue;margin-top:30px;padding:5px;">
            <div class="col-md-2 col-lg-2 col-xs-2">
                <p style="font-weight:bolder">Billed To:</p>
                <?php
                    $tblquery = "SELECT * FROM sale WHERE invNo = $_SESSION[invNo] Limit 1";
                    $tblvalue = array();
                    $select = $collect->tbl_select($tblquery, $tblvalue);
                    foreach($select as $data){
                        extract($data);
                        ?>
                        <?php
                        echo "<p>$cusName</p>";
                    }
                ?>

                <p style="font-weight:bolder">Date Of issue:</p>
                <p><?php echo date('m/d/Y')?></p>
            </div>

            <div class="col-md-3 col-lg-3 col-xs-3">
                <p style="font-weight:bolder">Invoice No:</p>
                <p><?php echo $_SESSION['invNo']; ?></p>

                <p style="font-weight:bolder">Payment method:</p>
                <?php 
                    $tblquery = "SELECT * FROM mainSales WHERE invNo = $_SESSION[invNo]";
                    $tblvalue = array();
                    $select = $collect->tbl_select($tblquery, $tblvalue);
                    foreach($select as $data){
                        extract($data);
                        ?>
                        <?php
                        echo "<p>$payMethod</p>";
                    }
                ?>
            </div>
            
            <div class="col-md-7 col-lg-7 col-xs-7">
                <p style="font-size:20px;font-weight:bolder;text-align:right;">Total Cost</p>
                <?php 
                    $tblquery = "SELECT * FROM sale WHERE invNo = $_SESSION[invNo] Limit 1";
                    $tblvalue = array();
                    $select = $collect->tbl_select($tblquery, $tblvalue);
                    foreach($select as $data){
                        extract($data);
                        ?>
                        <?php
                        echo "<h1 style='color:cornflowerblue;font-size:50px;font-weight:bolder;text-align:right;'>$total</h1>";
                    }
                ?>
            </div>
        </div>

        <div class="row">
            <table class="table table-bordered table-hover" id="table">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Unit Cost</th>
                        <th>Qty</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                       
                        $tblquery = "SELECT * FROM sale WHERE invNo = $_SESSION[invNo]";
                        $tblvalue = array();
                        $select = $collect->tbl_select($tblquery, $tblvalue);
                        foreach($select as $data){
                            extract($data);
                            ?>
                            <?php
                            echo "
                                <tr>
                                    <td>$proName</td>
                                    <td>N$price</td>
                                    <td>$qty</td>
                                    <td>N$amt</td>
                                </tr>
                            ";
                        }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <th>Sub Total</th>
                        <th>
                            <?php
                                $tblquery = "SELECT sum(amt) as total FROM sale WHERE invNo = $_SESSION[invNo]";
                                $tblvalue = array();
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    ?>
                                    <?php
                                    echo "N$total";
                                }
                            ?>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <th>Tax</th>
                        <th>
                            <?php
                                $tblquery = "SELECT sum(amt) as total FROM sale WHERE invNo = $_SESSION[invNo]";
                                $tblvalue = array();
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    ?>
                                    <?php
                                    $percent = 0.5 / 100;
                                    $_SESSION['taxx'] = $total * $percent;
                                    echo "N$_SESSION[taxx]";
                                }
                            ?>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <th>Total</th>
                        <th>
                            <?php
                                $tblquery = "SELECT sum(amt) as total FROM sale WHERE invNo = $_SESSION[invNo]";
                                $tblvalue = array();
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    ?>
                                    <?php
                                    $grandTotal = $total + $_SESSION['taxx'];
                                    echo "N$grandTotal";
                                }
                            ?>
                        </th>
                    </tr>
                </tfoot>
            </table>

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"></div>
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <?php echo "<a href='javascript:history.go(-1)' class='btn btn-primary' id='goBack'>Go Back</a>"; ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <button onclick="window.print()" class="btn btn-primary" id="printBtn" style="margin:0px 5px 5px 5px;width:100px;">Print</button>
            </div>
        </div>
    </div>
</body>
</html>