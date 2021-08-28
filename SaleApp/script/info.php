<style type="text/css">
	table{
			width: 100%;
			margin-left: auto;
			margin-right: auto;
			margin-top: 10px;
		}
		tr,td,th{
			border-collapse: collapse;
			border: 1px solid #ccc;
		}

		.success
		{
			width: 100%;
			background: lightgreen;
			font-size: 16px;
			line-height: 40px;
			padding: 5px;

		}
		.error
		{
			width: 100%;
			background: #dc3545;
			border-color:#dc3545;
			color: #fff; 
			font-size: 16px;
			line-height: 40px;
			padding-left: 10px;

		}
</style>

<?php
include_once('script/dbConnect.php');
 $conn  = connect2Db();

 /* Insert into table of student*/


 
 	if (isset($_POST['add'])) {
 	
 	addData();
 }
 if (isset($_POST['invadd'])) {
 	
 	itemInventory();
 }

 if (isset($_POST['update'])) {
 
	updateProduct($_POST['rolNo']);
 }
 

if (isset($_POST['delete'])) {

	deleteProduct($_POST['rolNo']);
}

 
 function addData()
 {
 	$productName = getInputData("productname");
 	$category = getInputData("category");
 	$itemlocation = getInputData("itemlocation");
 	$vendorname = getInputData("vendorname");
 	$date = getInputData("date");

 	if ($productName && $category && $date&&$vendorname&& $itemlocation) {
	$qry  ="INSERT INTO product_List (id,productName,vendor, itemlocation, category,saveDate) values(
 	'','$productName','$vendorname','$itemlocation','$category','$date')";

 	if (mysqli_query($GLOBALS['conn'],$qry)) {

 		 actionMsg("success", "Data save successful.....");
 // 		 echo '<div class="alert alert-primary" role="alert">
 //  				A simple primary alert—check it out!
	// </div>';
 	}else{
 		echo "Error";
 	}

 	}else{

 		actionMsg("error","input Fields are empty----");
 	}
 	
 	

 }

 // function that get input data 

 function getInputData($textvalue)
 {
 	$inputText  = mysqli_real_escape_string($GLOBALS['conn'],trim($_POST[$textvalue]));

 	if(empty($inputText)){
 		return false;
 	}else{
 		return $inputText;
 	}
 }

 function actionMsg($class,$msg)
 {
 	$msg = "<h6 class ='$class'>$msg</h6>";

 	echo $msg;
 }

//get all store data

 function getData()
 {
 	$qry ="Select * from product_List";

 	$result = mysqli_query($GLOBALS['conn'],$qry);

 		return $result;
 	
 }

 // refresh table

 function productTable()
 {
 	$qry = "Select * from product_List";

 	$result = mysqli_query($GLOBALS['conn'],$qry);

 		
 		return $result;
 	
 }

 function inventoryTable()
 {
 	$qry = "Select * from productinventory";

 	$result = mysqli_query($GLOBALS['conn'],$qry);

 		
 		return $result;
 	
 }

 function deleteProduct($rolNo)
 {
 	$qry = "DELETE FROM product_List WHERE id='$rolNo'";

			if(mysqli_query($GLOBALS['conn'],$qry))
			{
				actionMsg("success","The product is deleted data successfully ".$rolNo);
			}else{

			actionMsg("error","No value is deleted");

			}
 }

 ##############Update function #####################

 function updateProduct($idno){

	$productName = getInputData("productname");
 	$category = getInputData("category");
 	$itemlocation = getInputData("itemlocation");
 	$vendorname = getInputData("vendorname");
 	$date = getInputData("date");


 	$qry  = "UPDATE product_List set productName='$productName',category='$category',vendor ='$vendorname',saveDate='$date', itemlocation='$itemlocation' WHERE id='$idno'";
 	if (mysqli_query($GLOBALS['conn'],$qry)) {
 		
 		echo "<script>confirm('Are you sure you want to update this')".
 		actionMsg('success','The product with ID '.$idno .' is updated successfully ');

 		echo"</script>";
 	}else
 	{

 	actionMsg("error","The product is not updated");

 	}
 }

 // Taking Inventory of the product

 function itemInventory()
 {

			$invqry = "CREATE TABLE IF NOT EXISTS productInventory ( serialNo INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,productId INTEGER NOT NULL, itemname TEXT NOT NULL, quantity INTEGER NOT NULL, costprice INTEGER NOT NULL, sellingprice INTEGER NOT NULL, itemlocation TEXT NOT NULL, supplier TEXT NOT NULL,dateNow VARCHAR(45) NOT NULL,FOREIGN KEY(productId) REFERENCES Product_list(id) ON DELETE CASCADE ON UPDATE CASCADE)";

if(mysqli_query($GLOBALS['conn'],$invqry))
{
	$productName = getInputData("productname");
 	$costprice = getInputData("costprice");
 	$itemlocation = getInputData("itemlocation");
 	$sellingprice = getInputData("sellingprice");
 	$quantity = getInputData("qtty");
 	$supplier = getInputData("supplier");
 	$serialno = getInputData("serialno");
 	$date = getInputData("date");

 	if($costprice && $itemlocation && $sellingprice && $supplier && $date){

 		$qry  = "INSERT INTO productinventory(serialNo,productId,itemname,quantity,costprice,sellingprice,itemlocation,supplier,dateNow)
 		  values('','$serialno','$productName',
 		'$quantity','$costprice','$sellingprice','$itemlocation','$supplier','$date')";

 	if (mysqli_query($GLOBALS['conn'],$qry)) {

 		 actionMsg("success", "Data save successful.....");
 // 		 echo '<div class="alert alert-primary" role="alert">
 //  				A simple primary alert—check it out!
	// </div>';
 	}else{
 		actionMsg("error","Error, No such product name with the specified ID".mysqli_error($GLOBALS['conn']));
 	}

 	}else{

 		actionMsg("error","input Fields are empty----");
 	}

 	}else{
 		actionMsg("error","input Fields are empty----");
 	}

 }
