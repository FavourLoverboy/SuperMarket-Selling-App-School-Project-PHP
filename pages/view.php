<div class="dynamicBodyNav">
    <ul>
        <li>
            <a href="sales">Make Sales</a>
        <li>
        <li>
            <a href="mysales">My Sales</a>
        <li>
    </ul>
</div>

<div class="dynamicMainBodyBox" id="itemList">
    <div class="container-fluid">
        <div class="row">
            <table class="table table-bordered table-hover" id="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $tblquery = "SELECT * FROM sale WHERE invNo = $url[1]";
                        $tblvalue = array();
                        $select = $collect->tbl_select($tblquery, $tblvalue);
                        foreach($select as $data){
                            extract($data);
                            ?>
                            <?php
                            echo "
                                <tr>
                                    <td>$code</td>
                                    <td>$proName</td>
                                    <td>$qty</td>
                                    <td>$price</td>
                                    <td>$amt</td>
                                    <td>$date</td>
                                </tr>
                            ";
                        }
                    ?>
                </tbody>
                <tfooter>
                    <tr>
                        <td colspan="4"></td>
                        <th>Sub Total</th>
                        <th>
                            <?php
                                $tblquery = "SELECT sum(amt) as total FROM sale WHERE invNo = $url[1]";
                                $tblvalue = array();
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    ?>
                                    <?php
                                    
                                    echo $total;
                                }
                            ?>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <th>Tax</th>
                        <th>
                            <?php
                                $tblquery = "SELECT sum(amt) as total FROM sale WHERE invNo = $url[1]";
                                $tblvalue = array();
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    ?>
                                    <?php
                                    $percent = 0.5 / 100;
                                    $_SESSION['taxx'] = $total * $percent;
                                    echo $_SESSION['taxx'];
                                }
                            ?>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <th>Total</th>
                        <th>
                            <?php
                                $tblquery = "SELECT sum(amt) as total FROM sale WHERE invNo = $url[1]";
                                $tblvalue = array();
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    ?>
                                    <?php
                                    echo $total + $_SESSION['taxx'];
                                }
                            ?>
                        </th>
                    </tr>
                </tfooter>
            </table>

            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10"></div>
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <form action='dashboard' method='POST'>
                    <input type='hidden' name='invNo' value='<?php echo $url[1]?>'>
                    <input type='submit' class='btn btn-primary' name='print' value='Print'>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
    if(isset($_POST['print'])){
        extract($_POST);
        $_SESSION['invNo'] = $invNo;

        echo "<script>window.location='http://localhost/vivian/print.php';</script>";
    }
?>