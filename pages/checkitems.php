<div class='dynamicBodyNav'>
    <?php 
        if($_SESSION['position'] == 'Admin'){
        ?>
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
        <?php
        }else{
            
        }
    ?>
    
</div>

<div class="dynamicMainBodyBoxDelete">
    <table class="table table-bordered table-hover">
        <tr>
            <th>Product Name</th>
            <th>Unit Price</th>
            <th>Reg No</th>
            <th>Date</th>
            <?php 
                if($_SESSION['position'] == 'Admin'){
                ?>
                    <th>Delete</th>
                <?php
                }else{
                    
                }
            ?>
        </tr>

        <?php 
            $tblquery = "SELECT * FROM tblItm GROUP BY proName";
            $tblvalue = array();
            $select = $collect->tbl_select($tblquery, $tblvalue);
            foreach($select as $data){
                extract($data);
            ?>
                <?Php 
                    if($_SESSION['position'] == 'Admin'){
                        echo  "
                            <tr>
                                <td>$proName</td>
                                <td>$proPrice</td>
                                <td>$proReg</td>
                                <td>$date</td>
                                <td>
                                    <form action='checkitems' method='POST'>
                                        <input type='hidden' name='del' value='$itmId'>
                                        <input type='submit' name='delete' value='Delete' class='btn btn-danger'>
                                    </form>
                                </td>
                            </tr>
                        ";
                    }else{
                        echo  "
                            <tr>
                                <td>$proName</td>
                                <td>$proPrice</td>
                                <td>$proReg</td>
                                <td>$date</td>
                            </tr>
                        ";
                    }
                ?>
                <?php 
            }
        ?>
    <table>
</div>
<?php
    if($_POST['delete']){
        extract($_POST);

        $tblquery = "DELETE FROM tblItm WHERE itmId = :id";
        $tblvalue = array(
            ':id' => $del
        );
        $delete = $collect->tbl_delete($tblquery, $tblvalue);
        if($delete){
            echo '<script> window.location="http://localhost/vivian/checkitems/deleted"; </script>';
        }
    }
?>