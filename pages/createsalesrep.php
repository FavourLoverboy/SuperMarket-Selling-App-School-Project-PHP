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
    <form action="createsalesrep" method="POST">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <label for="name">Rep Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <label for="email">Rep Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <label for="uname">Username:</label>
                <input type="text" id="uname" name="username" required>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <label for="pword">Password:</label>
                <input type="password" id="pword" name="password" required>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <label for="level">Choose Level:</label>
                <input list="position" name="level" type="text" required>

                <datalist id="position">
                    <option value="Admin">Admin</option>
                    <option value="Rep">Rep</option>
                    
                </datalist>
            </div>

            <br/>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <input type="submit" name="create" value="Add" class="btn btn-success">
            </div>
        </div>
    </form>
</div>

<?php

    if($_POST['create']){

        extract($_POST);
    
        $tblquery = "INSERT INTO users VALUES(:userId, :name, :email, :username, :password, :position, :date, :status)";
        $tblvalue = array(
            ':userId' => null,
            ':name' => htmlspecialchars(ucfirst($name)),
            ':email' => htmlspecialchars($email),
            ':username' => htmlspecialchars(ucfirst($username)),
            ':password' => htmlspecialchars($password),
            ':position' => htmlspecialchars($level),
            ':date' => strftime("%Y-%m-%d %H:%M:%S", time()),
            ':status' => "Active"
        );
        // print_r($tblvalue);
        $insert = $collect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            echo "<script>alert('New account has been added.');</script>";
        }else{
            echo "<script>alert('Something went wrong, this may be a duplicate entry of email.');</script>";
        }
    }
?>