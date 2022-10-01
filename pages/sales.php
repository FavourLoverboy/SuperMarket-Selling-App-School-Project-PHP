<?php 
	//if ($_GET["reset"] == 'true')
		if($url[1] == 'reset'){
			unset($_SESSION["qty"]); //The quantity for each product
			unset($_SESSION["amounts"]); //The amount from each product
			unset($_SESSION["total"]); //The total cost
			unset($_SESSION["cart"]); //Which item has been chosen
			unset($_SESSION["subTotal"]); //the subtotal
			unset($_SESSION["tax"]); //the tax	
		}
		if($url[1] != ''){
			unset($_SESSION["qty"]); //The quantity for each product
			unset($_SESSION["amounts"]); //The amount from each product
			unset($_SESSION["total"]); //The total cost
			unset($_SESSION["cart"]); //Which item has been chosen
			unset($_SESSION["subTotal"]); //the subtotal
			unset($_SESSION["tax"]); //the tax	
		}
	//}
	//---------------------------


	//Add
	if( isset($_POST["Add"])){
		$item = $_POST["product"]; //product
		$item = explode('-',$item);
        $price = $item[2];
		$i = $item[0];//$_POST["product"];
		$amounts[$i] = (double)$price;
		$qty = $_SESSION["qty"][$i] + $_POST["qty"];//1;
		$_SESSION["amounts"][$i] = $amounts[$i] * $qty;
		$_SESSION["cart"][$i] = $i;
		$_SESSION["qty"][$i] = $qty;
		$_SESSION["product"][$i]  = $item[1];
		$_SESSION["price"][$i] = $price;
	}
	//---------------------------


	//Delete
	$delete = $url[1];
	//if ( isset($_POST["delete"]) )
	if ($delete){
		$i = $url[2]; //$_POST["delete"];
		$qty = $_SESSION["qty"][$i];
		$qty--;
		$_SESSION["qty"][$i] = $qty;
		//remove item if quantity is zero
		if ($qty == 0) {
			$_SESSION["amounts"][$i] = 0;
			unset($_SESSION["cart"][$i]);
		}else{
			$_SESSION["amounts"][$i] = $_SESSION["price"][$i] * $qty;
			//$_SESSION["amounts"][$i] = $amounts[$i] * $qty;
		}
	}
?>
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
            <form action="sales" method="POST" id="addItems">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                    <input type='text' name="product" list='list' placeholder='Select Product'>
                    <datalist id='list'>
                        <?php
                            $tblquery = "SELECT * FROM tblitm";
                            $tblvalue = array();
                            $select = $collect->tbl_select($tblquery, $tblvalue);
                            foreach($select as $data){
                                extract($data);
                            ?>
                                <?Php 
                                    echo  "
                                        <option value='$itmId-$proName-$proPrice'>$proName $proPrice</option>
                                    ";
                                ?>
                                <?php 
                            }
                        ?>
                    </datalist>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                    <input type="number" name="qty" value="1" required>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                    <input type="submit" name="Add" class="btn btn-primary" value="Add Item">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 checkbox">
                    <input type="checkbox" id="hide">
                    <label for="hide" class="checkboxLabel">Hide Cart Items</label>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                
                </div>
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                    <a href="sales/reset" class="btn btn-danger">New Sale</a>    
                </div>
            </form>
        </div>

        <table class="table table-bordered table-hover" id="table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Amount</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php
							$total = 0;
							if($_SESSION["cart"] != ''){
								foreach ( $_SESSION["cart"] as $i ) {
                                    
									?>
									<tr>
										<td>&nbsp;<?php echo $_SESSION["cart"][$i]; ?></td>
										<td>&nbsp;<?php echo $_SESSION["product"][$i]; ?></td>

										<td><?php echo( $_SESSION["qty"][$i] ); ?></td>
										<td width="10px"><?php echo $_SESSION["price"][$i]; ?></td>
										<td><?php echo( $_SESSION["amounts"][$i] ); ?></td>
										<td><a href="sales/delete/<?php echo($i); ?>">Remove</a></td>
									</tr>
									<?php
										$total = $total + $_SESSION["amounts"][$i];
								}
								$_SESSION["subTotal"] = $total;
                                $percent = 0.5 / 100;
								$_SESSION["tax"] = $_SESSION["subTotal"] * $percent;
								$_SESSION["total"] = $_SESSION["subTotal"] + $_SESSION["tax"];
							}
						?>
						<!--<tr>
						<td colspan="7">Total : <?php echo($total); ?></td>
						</tr>-->
						<?php
							//}
						?>
            </tbody>
        </table>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"></div>
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <h4>SubTotal</h4>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <h5><?php echo 'N' . number_format($_SESSION["subTotal"]);?></h5>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"></div>
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <h4>Tax</h4>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <h5><?php echo 'N' . number_format($_SESSION["tax"]);?></h5>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"></div>
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <h4>Total</h4>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <h5><?php echo 'N' . number_format($_SESSION["total"]);?></h5>
            </div>
        </div>

        <div class="row">
            <form action="sales" method="POST">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                    <input type="hidden" name="invNo" value="<?php echo time(); ?>">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                    <input type="text" list="pM" name="payMethod" placeholder="Payment Method">
                    <datalist id="pM">
                        <option value="Cash">Cash</option>
                        <option value="POS">POS</option>
                        <option value="Transfer">Transfer</option>
                    </datalist>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <input type="text" name="cusName" placeholder="Customer Name" required>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                    <input type="submit" name="pay" value="Proceed" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
    if(isset($_POST["pay"])){
        extract($_POST);
        $_SESSION['invNo'] = $invNo;
        foreach ( $_SESSION["cart"] as $i ) {
            $tblquery = "INSERT INTO sale VALUES(:saleId, :cusName, :code, :proName, :qty, :price, :amt, :invNo, :account, :date)";
            $tblvalue = array(
                ':saleId' => NULL,
                ':cusName' => htmlspecialchars($cusName),
                ':code' => htmlspecialchars($_SESSION["cart"][$i]),
                ':proName' => htmlspecialchars($_SESSION["product"][$i]),
                ':qty' => htmlspecialchars($_SESSION["qty"][$i]),
                ':price' => htmlspecialchars($_SESSION["price"][$i]),
                ':amt' => htmlspecialchars($_SESSION["amounts"][$i]),
                ':invNo' => htmlspecialchars($invNo),
                ':account' => htmlspecialchars($_SESSION['userId']),
                ':date' => strftime("%Y-%m-%d %H:%M:%S", time())
            );
            //print_r($tblvalue);
            $insert = $collect->tbl_insert($tblquery, $tblvalue);
        }
        if($insert){
            echo "<script>window.location='http://localhost/vivian/print.php';</script>";
        }  
    }
?>
<?php 
    if(isset($_POST["pay"])){
        extract($_POST);
        $tblquery = "INSERT INTO mainsales VALUES(:msId, :accountId, :cusName, :invNo, :payMethod, :total, :date)";
        $tblvalue = array(
            ':msId' => NULL,
            ':accountId' => htmlspecialchars($_SESSION['email']),
            ':cusName' => htmlspecialchars($cusName),
            ':invNo' => htmlspecialchars($invNo),
            ':payMethod' => htmlspecialchars($payMethod),
            ':total' => htmlspecialchars($_SESSION["total"]),
            ':date' => strftime("%Y-%m-%d %H:%M:%S", time())
        );
        //print_r($tblvalue);
        $insert = $collect->tbl_insert($tblquery, $tblvalue);
    }
?>