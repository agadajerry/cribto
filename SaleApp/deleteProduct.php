<?php

include_once 'script/dbConnect.php';
error_reporting(0);

if(isset($_GET['rno'])){


	$qry = "DELETE FROM product_List WHERE id='" .$_GET['rno']."'";

	$rsult = mysqli_query($conn,$qry);

if ($rsult) {


?>

	<META HTTP-EQUIV="Refresh" CONTENT="5; url= http://localhost:8080/BusinessApp/SaleApp/index.php">

<?php
	echo "data deleted successfully";

}else{
	
	echo "Not deleted".mysqli_error($conn);


	// header("location: index.php");

}
}
mysli_close($conn);


?>