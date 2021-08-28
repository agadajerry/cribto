
<?php
require_once ('script/info.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sales Inventory Management System</title>

	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link href="font-awesome.css" rel="stylesheet" />


	<!-- data notification syling -->

	<style type="text/css">
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
</head>

<body>

<div class="title-header"><h1>Sales Inventory Management System</h1>
</div>
<div class="row">

	<div class="sideBar1 col-md-2">
	<ul class="nav flex-column">
  	<li class="list-group-item admin-image">
     <li class="list-group-item"><img src="images/jerry.jpg" class="text-center">
     <h2 class="text-center">Idoko Jerry A</h2>
 	</li>

  </li>
   <li class="list-group-item">
    <a class="nav-link active" aria-current="page" href="index.php">Product Record</a>
  </li>
  <li class="list-group-item">
    <a class="nav-link" href="inventory.php"> product Invenory</a>
  </li>
  <li class="list-group-item">
    <a class="nav-link" href="invoice.php">New invoice</a>
  </li>
  <li class="list-group-item">
    <a class="nav-link" href="#">Suppliers</a>
  </li>
  <li class="list-group-item">
    <a class="nav-link" href="#">Customers</a>
  </li>
  <li class="list-group-item">
    <a class="nav-link" href="#">Daily sales</a>
  </li>
  <li class="list-group-item">
    <a class="nav-link" href="#">Monthly sales records</a>
  </li>
  <li class="list-group-item">
    <a class="nav-link" href="#">Profit and loss account</a>
  </li>

   <li class="nav-item social-icon">
   <hr/>
	<h2>Social media</h2>
	
	<div class="social-icon">
		<a href="https://www.twitter.com/jerrysoft5"><img src="images/twitter.png"></a>
	<a href="https://www.facebook.com/jerryagada"><img src="images/facebook.png"></a>
	<a href="https://www.github.com/agadajerry"><img src="images/github.png"></a>
	<a href="https://www.linkedin.com/in/idoko-jerry-agada-8b6886166"><img src="images/linkedln.png"></a>
	</div>
	<hr/>
  </li>
	</ul>
</div>



	<!-- content area -->

	<div class="col-md-10">
	
	<div class="container-fluid">

	<!-- ####################### form data ############################## -->
	

	<div class="container">
		<h5 class="text-center mt-3">ADD PRODUCT NAMES</h5>
	<div class="row bg-light">
	<div class="col-md-3"></div>
	<div class="col-md-6">

	<form method ="POST" action="" class="row"> 

	<div class="col-md-6">
		<label for="productname" class="form-label">Product Name</label>
    <input type="text" class="form-control" id="productname" name="productname">

    <label for="vendorname" class="form-label">Vendor Name</label>
    <input type="text" class="form-control" id="vendorname" name="vendorname">
    <label for="itemlocation" class="form-label">Items Location</label>
    <input type="text" class="form-control" id="itemlocation" name="itemlocation">

    
	</div>
	<div class="col-md-6">
    <label for="category" class="form-label">Category</label>
    <input type="text" class="form-control" id="category" name="category">
 
    <label for="date" class="form-label">Date</label>
    <input type="date" class="form-control" id="date" name="date">

    <!-- action button -->
    <button type="submit" class="btn btn-primary btn-md mt-4 " name="add">Add</button>
	<button type="submit" class="btn btn-success btn-md mt-4 " name="refresh">Refresh</button>
	<button type="submit" class="btn btn-danger btn-md mt-4" name="delete" id="deleteall">Delete All</button>	
	</div>	
    
	</form>
		</div>
		<div class="col-md-3"></div>
	</div>
	</div>
	

<!-- ##################Seaerch product details  ################################### -->

	<div class="container">
	<input type="search" class="form-control search-product" placeholder="Search Product">

	</div>


	<?php

echo '<table class="table table-success table-striped">';
	echo '<tr>
		<th>Id</th>
		<th>Product Name</th>
		<th>Vendor</th>
		<th>Product Location</th>
		<th>Category</th>
		<th>Date</th>
		<th>Action</th>
		
	</tr>';



		if (isset($_POST['refresh'])) {
			
		$result = productTable();

		 {
		
		echo "<tr>";
		echo "<td>".$row[0].'</td>';
		echo "<td>".$row[1].'</td>';
		echo "<td>".$row[2].'</td>';
		echo "<td>".$row[3].'</td>';
		echo "<td>".$row[4].'</td>';
		echo "<td>".$row[5].'</td>';
		echo "<td><button type='submit' name='editbtn'  id='editbtn' class='btn editbtn'><img src='images/pen.png'></button></td>";

		
		// echo "<td><a href='deleteProduct.php?rno=$row[0]' onclick='return checkdelete()'><img src='images/pen.png'></a></td>";
		

		echo "</tr>";
	}
	echo "</table>";

}else{
	echo "No value is found in the table";
}


?>
</div>
</div>



<!-- #############################Edit modal################################? -->
	<!-- Edit product  info -->


<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">EDIT PRODUCT NAMES</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


    <!-- Edit PRODUCT NAME INFORMATION-->
 
    <form method ="POST" action=""> 

    <label for="idno" class="form-label">ID</label>
    <input type="number" class="form-control" id="idno" name="rolNo">	
    <label for="productname2" class="form-label">Product Name</label>
    <input type="text" class="form-control" id="productname2" name="productname">

    <label for="vendorname2" class="form-label">Vendor Name</label>
    <input type="text" class="form-control" id="vendorname2" name="vendorname">

    <label for="itemlocation2" class="form-label">Items Location</label>
    <input type="text" class="form-control" id="itemlocation2" name="itemlocation">

    <label for="category2" class="form-label">Category</label>
    <input type="text" class="form-control" id="category2" name="category">
 
    <label for="date2" class="form-label">Date</label>
    <input type="date" class="form-control" id="date2" name="date">
   
  	<button type="submit" class="btn btn-primary btn-sm mt-3 mx-5" name="update">Update</button>
	<button type="submit" class="btn btn-success btn-sm mt-3" name="delete">Delete</button>
	<button type="submit" class="btn btn-danger btn-sm mt-3" name="deleteall" id="delete">Delete All</button>	
   
   
</form>
<!-- ################################################################# -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
	<script src="jquery.js"></script>
	<script src="bootstrap.min.js"></script>

	<script type="text/javascript">
	
	$(document).ready(function(){

		$('.editbtn').on('click',function(){

		$('#editModal').modal('show');

		

		$tr = $(this).closest('tr');
		var data =$tr.children('td').map(function(){
			return $(this).text();
		}).get();

		// console.log(data);

		$('#idno').val(data[0]);
		$('#productname2').val(data[1]);
		$('#vendorname2').val(data[2]);
		$('#itemlocation2').val(data[3]);
		$('#category2').val(data[4]);
		$('#date2').val(data[5]);
		});
		
	});
</script>
</body>
</html>