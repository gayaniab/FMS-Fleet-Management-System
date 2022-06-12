<?php session_start();
require_once("includes/opencon.php");

//Get vehicle Id
$vId=$_REQUEST['vId'];
//echo $vId; echo '<br>';
$sql_veh="select * from vehicle WHERE vId = '$vId'";
$res=mysqli_query($conn,$sql_veh);
$row=mysqli_fetch_array($res);

//Get vehicle category
$sql_cat="select * from vehicle v,category c WHERE v.vCategoryId = c.CategoryId and v.vid  = '$vId'";
$rescat=mysqli_query($conn,$sql_cat);
$rowcat=mysqli_fetch_array($rescat);

//Get vehicle make
$sql_make="select * from vehicle v,make m WHERE v.vmakeId = m.vmakeId and v.vid  = '$vId'";
$resmake=mysqli_query($conn,$sql_make);
$rowmake=mysqli_fetch_array($resmake);

//Get vehicle model
$sql_mod="select * from vehicle v,model m WHERE v.vmodelId = m.vmodelId and v.vid  = '$vId'";
$resmod=mysqli_query($conn,$sql_mod);
$rowmod=mysqli_fetch_array($resmod);

//Get Driver
$sql_dri="select * from vehicle v,driver d  WHERE v.driverId = d.driverId and v.vid  = '$vId'";
$resdri=mysqli_query($conn,$sql_dri);
$rowdri=mysqli_fetch_array($resdri);

//Get vehicle color
$sql_col="select * from vehicle v,color c WHERE v.vcolorId = c.colorId and v.vid  = '$vId'";
$rescol=mysqli_query($conn,$sql_col);
$rowcol=mysqli_fetch_array($rescol);

//Get Province
$sql_pro="select * from vehicle v,province p WHERE v.vProvinceId = p.provinceId and v.vid  = '$vId'";
$respro=mysqli_query($conn,$sql_pro);
$rowpro=mysqli_fetch_array($respro);

//Get Branch
$sql_br="select * from vehicle v,branch b WHERE v.vBranchId = b.branchId and v.vid  = '$vId'";
$resbr=mysqli_query($conn,$sql_br);
$rowbr=mysqli_fetch_array($resbr);

if (mysqli_num_rows($res)>0){
	echo '<h2><center>VEHICLE INFORMATION DETAILS</center></h1>';
	echo '<table border=1 align="center" width = 100%>';
	echo '<tr>
	<td>Registration Number</td> <td>'.$row['vNo'].'</td>
	<td>Year of Manufacture</td> <td>'.$row['vManYear'].'</td></tr> 
	<td>Engine No</td> <td>'.$row['vEngNo'].'</td>
	<td>Vehicle Category</td><td>'.$rowcat['vCategory'].'</td></tr> 
	<td>Make</td><td>'.$rowmake['vMake'].'</td> 
	<td>Model</td><td>'.$rowmod['vModel'].'</td></tr> 
	<td>Chasis No</td><td>'.$row['vChNo'].'</td>
	<td>No of Seats</td><td>'.$row['vNoSeat'].'</td></tr> 
	<td>AC/NON AC</td><td>'.$row['vAC'].'</td>
	<td>Ststus</td><td>'.$row['vStatus'].'</td></tr> 
	<td>Driver</td><td>'.$rowdri['driverFname']." ".$rowdri['driverLname'].'</td>
	<td>Color</td><td>'.$rowcol['vColor'].'</td></tr> 
	<td>Fuel Type</td><td>'.$row['vFuelType'].'</td>
	<td>Fuel Capacity</td><td>'.$row['vFCapacity'].'</td></tr> 
	<td>Distance Per Litre</td><td>'.$row['distancePerLitre'].'</td>
	<td>Date of Registration</td><td>'.$row['vRegDate'].'</td></tr> 
	<td>Province</td><td>'.$rowpro['vProvince'].'</td>
	<td>Purchase Date</td><td>'.$row['vPDate'].'</td></tr> 
	<td>Purchase Price</td><td>'.$row['vPPrice'].'</td>
	<td>Absolute Owner</td><td>'.$row['vAbsOwner'].'</td></tr> 
	<td>Current Owner</td><td>'.$row['vCurrentOwner'].'</td>
	<td>Assigned Branch</td><td>'.$rowbr['vBranch'].'</td></tr> 
	<td>Start Meter Reading</td><td>'.$row['vMRead'].'</td>
	<td>Image</td><td>'.$row['vImage'].'</td></tr>
	<td>License Renewal Date</td><td>'.$row['LicenseDate'].'</td>
	<td>Insurance Renewal Date</td><td>'.$row['InsuranceDate'].'</td></tr>
	<td>Emmision Test Date</td><td>'.$row['EmiTestDate'].'</td></tr>'; 
			  
	echo"<div class='image'><img src='".$row['vImage']."'  width=200 height=110 /></div>" ;  
	
	// Get image data from database 
	//$result = $db->query("SELECT image FROM images ORDER BY id DESC"); 

	//echo"<div class="gallery">
	//<img src="data:image/jpg;charset=utf8;base64,base64_encode($row['Image']); " /> 
	//</div>"; 
	//else{
		//echo"<p class="status error">Image(s) not found...</p>"; 
	//}
	
	
	
	
}
else{
	echo "NO Data Availabale ..";
}
// Close Connection

mysqli_close($conn);
?>

