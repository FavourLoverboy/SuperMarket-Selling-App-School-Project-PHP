<div class='dynamicBodyNav'>
    <ul>
        <li>
            <a href='createsalesrep'>Create Rep</a>
        <li>
        <li>
            <a href='checkrep'>Check Rep</a>
        <li>
        <li>
            <a href='controlrep'>Control Rep</a>
        <li>
    </ul>
</div>

<div class="dynamicMainBodyBox">
    <table class="table table-bordered table-hover">
        <tr>
            <th>Rep Name</th>
            <th>Email</th>
            <th>Change</th>
        </tr>

        <?php 
            $tblquery = "SELECT * FROM users WHERE position = 'Rep' ORDER BY name";
            $tblvalue = array();
            $select = $collect->tbl_select($tblquery, $tblvalue);
            foreach($select as $data){
                extract($data);
            ?>
                <?Php
                    if($status == "Active"){
                        echo  "
                            <tr>
                                <td>$name</td>
                                <td>$email</td>
                                <td>
                                    <form action='controlrep' method='POST'>
                                        <input type='hidden' name='dis' value='$userId'>
                                        <input type='submit' name='disable' value='Disable' class='btn btn-danger'>
                                    </form>
                                </td>
                            </tr>
                        ";
                    }else{
                        echo  "
                            <tr>
                                <td>$name</td>
                                <td>$email</td>
                                <td>
                                    <form action='controlrep' method='POST'>
                                        <input type='hidden' name='ena' value='$userId'>
                                        <input type='submit' name='enable' value='Enable' class='btn btn-success'>
                                    </form>
                                </td>
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
    if($_POST['disable']){
        extract($_POST);

        $tblquery = "UPDATE users SET status = 'Inactive' WHERE userId = :id";
        $tblvalue = array(
            ':id' => $dis
        );
        $update = $collect->tbl_update($tblquery, $tblvalue);
        if($update){
            echo '<script> window.location="http://localhost/vivian/controlrep/updated"; </script>';
        }
    }
?>

<?php
    if($_POST['enable']){
        extract($_POST);

        $tblquery = "UPDATE users SET status = 'Active' WHERE userId = :id";
        $tblvalue = array(
            ':id' => $ena
        );
        $update = $collect->tbl_update($tblquery, $tblvalue);
        if($update){
            echo '<script> window.location="http://localhost/vivian/controlrep/updated"; </script>';
        }
    }
?>