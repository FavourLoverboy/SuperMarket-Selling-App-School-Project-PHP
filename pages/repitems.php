<div class='dynamicBodyNav'>
    
</div>

<div class="dynamicMainBodyBoxDelete">
    <table class="table table-bordered table-hover">
        <tr>
            <th>Product Name</th>
            <th>Unit Price</th>
            <th>Reg No</th>
            <th>Date</th>
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
                        <tr>
                            <td>$proName</td>
                            <td>$proPrice</td>
                            <td>$proReg</td>
                            <td>$date</td>
                        </tr>
                    ";
                ?>
                <?php 
            }
        ?>
    <table>
</div>
