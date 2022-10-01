<div class='dynamicBodyNav'>
    <ul>
        <li>
            <a href='additems'>Create Product</a>
        <li>
        <li>
            <a href='checkitems'>Check Product</a>
        <li>
        <li>
            <a href='updateitems'>Update Product</a>
        <li>
    </ul>
</div>

<div class="dynamicMainBodyBoxUpdate">
    
    <table class="table table-bordered table-hover">
        <tr>
            <th>Product Name</th>
            <th>Unit Price</th>
            <th>Reg No</th>
            <th>Date</th>
            <th>Update</th>
        </tr>

        <?php 
            $tblquery = "SELECT * FROM tblItm GROUP BY proName";
            $tblvalue = array();
            $select = $collect->tbl_select($tblquery, $tblvalue);
            foreach($select as $data){
                extract($data);
            ?>
                <?Php 
                    echo  "
                        <form action='updateitems' method='POST'>
                            <tr>
                                <td>$proName</td>
                                <td>
                                    <input type='number' name='priceUpdate' value='$proPrice' required>
                                </td>
                                <td>$proReg</td>
                                <td>$date</td>
                                <td>
                                    <input type='hidden' name='up' value='$itmId'>
                                    <input type='submit' name='update' value='Update' class='btn btn-primary'>
                                </td>
                            </tr>
                        </form>
                    ";
                ?>
                <?php 
            }
        ?>
    <table>
</div>
<?php
    if($_POST['update']){
        extract($_POST);

        $tblquery = "UPDATE tblitm SET proPrice = '$priceUpdate' WHERE itmId = :id";
        $tblvalue = array(
            ':id' => $up
        );
        $update = $collect->tbl_update($tblquery, $tblvalue);
        if($update){
            echo "<script>alert('Product has been updated.');</script>";
        }
    }
?>