<script type="text/javascript">

	function discount(){
		var totalamt = '<?php echo $_SESSION["total"]; ?>';
		var discount = document.getElementById("discount").value; 
		alert(discount);
	}
</script>

<script>
	function check() {
		var datalist = document.getElementById('browser');
		//­ var datalist = document.getElementById­("a").children; // this did not work as well
		//­ console.log("Chrome" in datalist);
		var browserChildren = document.getElementById('browsers').children;

		var flag = false;
		for(let i = 0; i < browserChildren.length; i++){
			flag = browserChildren[i].value === datalist.value || flag
		}
		//console.log(flag)

		if(flag == true){
			//alert("You selected a value from the list");
			var button = document.getElementById("button");
			button.disabled = false;
		}
		else {
			alert("Please select an Item / Product from the list");
			var button = document.getElementById("button");
			button.disabled = true;
		}

	}
</script>

<script>
	function checkc() {
		var datalist = document.getElementById('browserr');
		//­ var datalist = document.getElementById­("a").children; // this did not work as well
		//­ console.log("Chrome" in datalist);
		var browserChildren = document.getElementById('browserss').children;

		var flag = false;
		for(let i = 0; i < browserChildren.length; i++){
			flag = browserChildren[i].value === datalist.value || flag
		}
		//console.log(flag)

		if(flag == true){
		//alert("You selected a value from the list");
		var button = document.getElementById("buttonc");
		button.disabled = false;
		}
		else {
		alert("Please select a Customer from the list");
		var button = document.getElementById("buttonc");
		button.disabled = true;
		}

	} 
</script>



<?php 
	//if ($_GET["reset"] == 'true')
		if ($url[1] == 'reset'){
			unset($_SESSION["qty"]); //The quantity for each product
			unset($_SESSION["amounts"]); //The amount from each product
			unset($_SESSION["total"]); //The total cost
			unset($_SESSION["cart"]); //Which item has been chosen
		}
	//}
	//---------------------------


	//Add
	if ( isset($_POST["add"]) )
	{
		$item = $_POST["product"]; //product
		$price = $_POST["price"];
		$item = explode('-',$item);
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

<div class="panel panel-primary">
	<div class="panel-heading btn-success" style="padding:10px; color:#fff;">
	<h3>Invoice</h3>
</div> 
  
<br />
<a href="listinvoices" class="btn btn-success" style="padding:10px; color:#fff;"> View Invoices</a> 
<div class="panel-body" style="background:#fff; padding:20px;">
    <br/>
	<div class="row">
		<div class="col-lg-9">
			<div class="panel-body" style="background:#fff; padding:20px;">
				<form role="form" action="invoice2" method='post'>
                	<div class="row delete">
						<div class="form-group col-lg-1">
							<label>Select Item </label>
						</div>

						<div class="form-group col-lg-3">
                            <input type="text" list="browsers" name="product" id="browser" class="form-control" autofocus required onchange="check()">
							<datalist id="browsers">
								<?php 
									$cltid = $_SESSION['cltid'];
									$brnid = $_SESSION['brnid'];
									$tblquery = "SELECT * FROM tblpurchase WHERE pur_status = 'Active' && pur_cltid = '$cltid' && pur_brnid = '$brnid' GROUP BY pur_itmid";
									$tblvalue = array();
									$select = $ebmp->tbl_select($tblquery,$tblvalue);
									foreach($select as $data){
										extract($data);
										$itemid = $pur_itmid;	
										$itmname = $ebmp->getitemname($itemid);
										$itemprice = $ebmp->getitemprice($itemid); 
										echo "
											<option value='$pur_itmid-$itmname-$itemprice'>$itmname</option>
										";
									}				
								?>	
							</datalist>
							<input type="hidden" name="add" value="add">
						</div>
							
						<div class="col-lg-1">Qty</div>
							<div class="col-lg-2">
								<input type="number" step="0.5" class="form-control" name="qty" value="1">
							</div>
                            <div class="col-lg-1">Price</div>
                                <div class="col-lg-2">
									<input type="number" step="any" class="form-control" name="price" required>
								</div>
								<div class="col-lg-2">
									<button type="submit" class="btn btn-success" name="submit" id="button">Add</button>												  
								</div>							
							</div> 
												 
				</form>
			</div>

			<div id="shopping-cart" style="background:#fff; padding:10px; border-radius:10px;">
				<p style="text-align:right;">
					<a href="invoice2/reset" class="btn delete btn btn-danger">Cancel/New Sale</a>
				</p>
				<table cellpadding="10" cellspacing="1" class="table">
					<tbody>
						<tr class="delete">
							<th style="text-align:left;">
								<strong>Code</strong>
							</th>
							<th style="text-align:left;">
								<strong>Name</strong>
							</th>
							<th style="text-align:left;">
								<strong>Quantity</strong>
							</th>
							<th style="text-align:left;">
								<strong>Price</strong>
							</th>
							<th style="text-align:left;">
								<strong>Amount</strong>
							</th>
							<th class="delete" style="text-align:center;">
								<strong> </strong>
							</th>
						</tr>

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
										<td><a href="invoice2/delete/<?php echo($i); ?>">Remove</a></td>
									</tr>
									<?php
										$total = $total + $_SESSION["amounts"][$i];
								}
								$_SESSION["total"] = $total;
							}
						?>
						<!--<tr>
						<td colspan="7">Total : <?php echo($total); ?></td>
						</tr>-->
						<?php
							//}
						?>			
						<tr>
							<td class="showprint" style="display:none" colspan='5' align="right">
								<strong>Total: </strong><?php echo "N".$item_total; ?>
							</td>
						</tr>
				</tbody>
			</table>		
		</div>
	</div>

	<div class="col-lg-3" style="background:;height:500px;border-radius:20px;">
		<section class="panel">
            <p style='height:60px; margin-top:10px; padding:20px 50px; font-size:20px;color:#ffffff;background:teal; border-radius:10px;' >Invoice Summary</p>
			<form action="invoice2"  method="post">
				<ul class="nav nav-pills nav-stacked">
 					<li>
						<a href="javascript:;"> 
 							<h4>Customer:<!--<select name='custid' class="form-control" required>
								<option> </option>-->
								<input type="text" list="browserss" name="custid" id="browserr" class="form-control" required onchange="checkc()">
								<datalist id="browserss">
									<?php 
										echo $ebmp->getallcustomer();
									?>
								</datalist>
							</h4>
							<input type="hidden" name="txn_ref" value="<?php echo time(); ?>">
							<input type="hidden" name="txn_date" value="<?php echo date('Y-m-d'); ?>">
							<input type="hidden" name="txn_time" value="<?php echo date('H:s:i'); ?>">
					</li>
                </ul>
				<table style="margin-left:10px;">
  					<tr>
						<td>
							<h5>Date </h5>
						</td>
						<td>
							<h5>
								<input class="form-control" type="date" name="datesold" id="datesold" required>
							</h5>
						</td>
					</tr>
					<!--<tr>
						<td>
							<h5>Sub Total:</h5>
						</td>
						<td>
							<h4><?php echo " N".number_format($total,2,".",","); ?></h4>
						</td>
					</tr>
					<form action="salesinvoice2" method="post">
						<tr>
							<td>
								<h5>Discount: </h5>
							</td>
							<td>
								<h5><input class="form-control" type="text" name="discount" id="discount" value="" onchange="discount();"></h5>
							</td>
						</tr>-->
						<tr>
							<td>
								<h5>Total:</h5>
							</td>
							<td>
								<h4><?php  $sales_total = $total - $discount; echo "N".number_format($sales_total,2,".",","); ?></h4>
							</td>
						</tr>
						<tr>
							<!--<td>
								<h5>Payment:</h5> </td>
							<td>
								<input class="form-control" type="number" step="any" id="payment" name="payment" value="" onchange="payment();"> 
								<input type="hidden" value="Update Invoice">
							</td>-->
						</tr>
					</form>

					</tr>
					<!--<tr>
					<td><h5>Balance:</h5></td>
					<td align="center"><h4><?php $sales_balance = $sales_total - $payment; echo "N".number_format($sales_balance,2,".",","); ?></h4></td>
					</tr>-->



					<td colspan="2" align="center"><br /><h4> <input type="submit" name="pay" value="Save and Receive  Payment" class="btn btn-success" id="buttonc"></h4>
					</form></td>
					</tr>
				</table>
		</section>
		<?php 
			if($_POST['pay']){
				extract($_POST);
				$check = count($_SESSION["cart"]);	
				//start of cart	 
				$sn = 1;
				foreach($_SESSION["cart"] as $i ) {
					if($sn == 1){
						$payment = htmlspecialchars($payment);
						$discount = htmlspecialchars($discount);										
					}else{
						$payment =' ';
						$discount = ' ';		
					}
					//end of cart	  
					$tblquery = "INSERT INTO tblsales VALUES(:sls_id, :sls_itemcode, :sls_invno, :sls_customerid, :sls_qty, :sls_unitprice, :sls_amount, :sls_note, :sls_payment, :sls_discount, :sls_brnid, :sls_cltid, :sls_addedby, :sls_date,:sls_time, :sls_status)"; 
					$tblvalue = array(
					':sls_id'  => NULL,
					':sls_itemcode'  => $_SESSION["cart"][$i],
					':sls_invno'  => $txn_ref,
					':sls_customerid'  => htmlspecialchars($custid),
					':sls_qty'  => $_SESSION["qty"][$i],
					':sls_unitprice'  => $_SESSION["price"][$i],
					':sls_amount'  => $_SESSION["price"][$i] * $_SESSION["qty"][$i], //htmlspecialchars($amount),
					':sls_note'  => htmlspecialchars($note),
					':sls_payment'  => $payment,
					':sls_discount'  => $discount,
					':sls_brnid'  => $_SESSION['brnid'],
					':sls_cltid'  => $_SESSION['cltid'],
					':sls_addedby'  => $_SESSION['userid'],
					':sls_time'  => date('H:s:i'),
					':sls_date'  => htmlspecialchars($datesold), //date('Y-m-d'),
					':sls_status' => 'Active'
					);
					$submit = $ebmp->tbl_insert($tblquery,$tblvalue); 
					$sn++;
				}
				if($submit){
					echo '<script>window.location="addpayment/$txn_ref";</script>';
				}
			}
		?>
		<!--<a href='salesinvoice2/?inv=<?php echo $txn_ref; ?>' onclick="centeredPopup(this.href,'myWindow','1000','600','yes');return false" class='btn btn-success'>Print Invoice</a>-->

		<?php 
			//echo '<script>window.location="salesinvoice2/$txn_ref";</script>';	 
			//echo "Done";	
		?>
		<?php  
			echo "<h3 color='red'>Saved</h3>";
			unset($_SESSION["cart"]);	  
			//echo '<script>window.location="invoice2";</script>';						
				////
			// $etext = "ASTED GROUP";
			//echo $dtext = $ebmp->etext($etext);
			//echo $ebmp->dtext($dtext);
				// echo "<br />".base64_decode($dtext);
			// $epass = $_POST['password'];
			// echo $ebmp->epass($epass);
		?>
	</div>
</div>


</div>
</div>
</div>
</div>
