1633082904
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
                        <th>Description</th>
                        <th>Unit Cost</th>
                        <th>Qty</th>
                        <th>Amount</th>
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
                                    <td>$proName</td>
                                    <td>N$price</td>
                                    <td>$qty</td>
                                    <td>N$amt</td>
                                </tr>
                            ";
                        }
                    ?>
                </tbody>
            </table>
            
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9"></div>
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <h4>Sub Total</h4>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
                <?php
                    $tblquery = "SELECT sum(amt) as total FROM sale WHERE invNo = $url[1]";
                    $tblvalue = array();
                    $select = $collect->tbl_select($tblquery, $tblvalue);
                    foreach($select as $data){
                        extract($data);
                        ?>
                        <?php
                        echo "<h4>N$total</h4>";
                    }
                ?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9"></div>
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <h4>Tax</h4>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
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
                        echo "<h4>N$_SESSION[taxx]</h4>";
                    }
                ?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9"></div>
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <h4>Total</h4>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
                <?php
                    $tblquery = "SELECT sum(amt) as total FROM sale WHERE invNo = $url[1]";
                    $tblvalue = array();
                    $select = $collect->tbl_select($tblquery, $tblvalue);
                    foreach($select as $data){
                        extract($data);
                        ?>
                        <?php
                        $grandTotal = $total + $_SESSION['taxx'];
                        echo "<h4>N$grandTotal</h4>";
                    }
                ?>
            </div>

            
        </div>
    </div>
</div>