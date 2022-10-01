<div class='dynamicBodyNav'>
    <ul>
        <li>
            <a href='createsalesrep'>Create Cashier</a>
        <li>
        <li>
            <a href='checkrep'>Check Cashier</a>
        <li>
        <li>
            <a href='controlrep'>Control Cashier</a>
        <li>
    </ul>
</div>

<div class="dynamicMainBodyBox">
    <table class="table table-bordered table-hover">
        <tr>
            <th>Cashier Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Date</th>
            <th>Delete</th>
        </tr>

        <?php 
            $tblquery = "SELECT * FROM users WHERE position = 'Rep' ORDER BY name";
            $tblvalue = array();
            $select = $collect->tbl_select($tblquery, $tblvalue);
            foreach($select as $data){
                extract($data);
            ?>
                <?Php 
                    echo  "
                        <tr>
                            <td>$name</td>
                            <td>$email</td>
                            <td>$username</td>
                            <td>$date</td>
                            <td>
                                <form action='checkrep' method='POST'>
                                    <input type='hidden' name='del' value='$userId'>
                                    <input type='submit' name='delete' value='Delete' class='btn btn-danger'>
                                </form>
                            </td>
                        </tr>
                    ";
                ?>
                <?php 
            }
        ?>
    <table>
</div>

<?php
    if($_POST['delete']){
        extract($_POST);

        $tblquery = "DELETE FROM users WHERE userId = :id";
        $tblvalue = array(
            ':id' => $del
        );
        $delete = $collect->tbl_delete($tblquery, $tblvalue);
        if($delete){
            echo '<script> window.location="http://localhost/vivian/checkrep/deleted"; </script>';
        }
    }
?>