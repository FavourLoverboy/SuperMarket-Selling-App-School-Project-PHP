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
                        <th>Cashier Name</th>
                        <th>Customer Name</th>
                        <th>InvNo</th>
                        <th>Payment Method</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>View</th>
                        <th>Print</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $tblquery = "SELECT * FROM mainsales ORDER BY date DESC";
                        $tblvalue = array();
                        $select = $collect->tbl_select($tblquery, $tblvalue);
                        foreach($select as $data){
                            extract($data);
                            ?>
                            <?php
                            echo "
                                <tr>
                                    <td>$accountId</td>
                                    <td>$cusName</td>
                                    <td>$invNo</td>
                                    <td>$payMethod</td>
                                    <td>$total</td>
                                    <td>$date</td>
                                    <td>
                                        <a href='view/$invNo' class='btn btn-info'>View</a>
                                    </td>
                                    <td>
                                        <form action='dashboard' method='POST'>
                                            <input type='hidden' name='invNo' value='$invNo'>
                                            <input type='submit' class='btn btn-primary' name='print' value='Print'>
                                        </form>
                                    </td>
                                </tr>
                            ";
                        }
                    ?>
                </tbody>
                <tfooter>
                    <tr>
                        <td colspan="6"></td>
                        <th>Total</th>
                        <th>
                            <?php
                                $tblquery = "SELECT sum(total) as allTotal FROM mainSales";
                                $tblvalue = array();
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    ?>
                                    <?php
                                    echo $allTotal;
                                }
                            ?>
                        </th>
                    </tr>
                </tfooter>
            </table>
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