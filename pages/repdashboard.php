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
                        <th>TId</th>
                        <th>Cashier Name</th>
                        <th>Customer Name</th>
                        <th>InvNo</th>
                        <th>Payment Method</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $tblquery = "SELECT * FROM mainsales WHERE accountId = '$_SESSION[email]' ORDER BY date DESC";
                        $tblvalue = array();
                        $select = $collect->tbl_select($tblquery, $tblvalue);
                        foreach($select as $data){
                            extract($data);
                            ?>
                            <?php
                            echo "
                                <tr>
                                    <td>$msId</td>
                                    <td>$accountId</td>
                                    <td>$cusName</td>
                                    <td>$invNo</td>
                                    <td>$payMethod</td>
                                    <td>$total</td>
                                    <td>$date</td>
                                    <td>
                                        <a href='view/$invNo' class='btn btn-info'>View</a>
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
                                $tblquery = "SELECT sum(total) as allTotal FROM mainSales WHERE accountId = '$_SESSION[email]'";
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