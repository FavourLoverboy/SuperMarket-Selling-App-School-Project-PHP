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

<div class="dynamicMainBodyBox">
    <form action="additems" method="POST">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <label for="name">Product Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <label for="price">Unit Price:</label>
                <input type="number" id="price" name="price" required>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <label for="reg">Reg No:</label>
                <input type="text" id="reg" name="reg" required>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"></div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <input type="submit" name="addItem" value="Add" class="btn btn-success">
            </div>
        </div>
    </form>
</div>

<?php

    if($_POST['addItem']){

        extract($_POST);
    
        $tblquery = "INSERT INTO tblItm VALUES(:itmId, :proName, :proPrice, :proReg, :date)";
        $tblvalue = array(
            ':itmId' => null,
            ':proName' => htmlspecialchars(strtoupper($name)),
            ':proPrice' => htmlspecialchars($price),
            ':proReg' => htmlspecialchars(strtoupper($reg)),
            ':date' => strftime("%Y-%m-%d %H:%M:%S", time())
        );
        //print_r($tblvalue);
        $insert = $collect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            echo "<script>alert('Product has been added.');</script>";
        }else{
            echo "<script>alert('Something went wrong, Please check if this product already exit in the database.');</script>";
        }
    }
?>