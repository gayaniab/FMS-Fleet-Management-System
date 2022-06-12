<?php session_start();
//$_SESSION['roleId'];
require_once("includes/opencon.php");

//Get vehicle Id
//echo $_REQUEST['vId']; echo '<br>';
$vehId=$_REQUEST['vId'];
//echo $vehId; echo '<br>';
$sql_veh="SELECT * FROM vehicle v,category c where v.vCategoryId=c.CategoryId AND vId = '$vehId'";
$res=mysqli_query($conn,$sql_veh);
$row=mysqli_fetch_array($res);

//Get vehicle category
$sql_cat="select * from vehicle v,category c WHERE v.vCategoryId = c.CategoryId and v.vid  = '$vehId'";
$rescat=mysqli_query($conn,$sql_cat);
$rowcat=mysqli_fetch_array($rescat);

//Get vehicle make
$sql_make="select * from vehicle v,make m WHERE v.vmakeId = m.vmakeId and v.vid  = '$vehId'";
$resmake=mysqli_query($conn,$sql_make);
$rowmake=mysqli_fetch_array($resmake);

//Get vehicle model
$sql_mod="select * from vehicle v,model m WHERE v.vmodelId = m.vmodelId and v.vid  = '$vehId'";
$resmod=mysqli_query($conn,$sql_mod);
$rowmod=mysqli_fetch_array($resmod);

//Get Driver
$sql_dri="select * from vehicle v,driver d  WHERE v.driverId = d.driverId and v.vid  = '$vehId'";
$resdri=mysqli_query($conn,$sql_dri);
$rowdri=mysqli_fetch_array($resdri);
$driver = $rowdri['driverFname']." ".$rowdri['driverLname'];
$driverS = $rowdri['driverId'];

//Get vehicle color
$sql_col="select * from vehicle v,color c WHERE v.vcolorId = c.colorId and v.vid  = '$vehId'";
$rescol=mysqli_query($conn,$sql_col);
$rowcol=mysqli_fetch_array($rescol);
$color = $rowcol['vColor'];
$colorS = $rowcol['vColorId'];

//Get Province
$sql_pro="select * from vehicle v,province p WHERE v.vProvinceId = p.provinceId and v.vid  = '$vehId'";
$respro=mysqli_query($conn,$sql_pro);
$rowpro=mysqli_fetch_array($respro);
$province = $rowpro['vProvince'];
$provinceS = $rowpro['vProvinceId'];

//Get Branch
$sql_br="select * from vehicle v,branch b WHERE v.vBranchId = b.branchId and v.vid  = '$vehId'";
$resbr=mysqli_query($conn,$sql_br);
$rowbr=mysqli_fetch_array($resbr);
$branch = $rowbr['vBranch'];
$branchS = $rowbr['vBranchId'];



if($_SERVER["REQUEST_METHOD"]=="POST"){
	$vId=$_POST['vId'];
	$vAc=$_POST['vAc'];
	$vStatus=$_POST['vStatus'];
	$driverId = $_POST['driverId'];
	$vColorId=$_POST['vColorId'];
	$vProvince=$_POST['vProvince'];
	$vPDate=$_POST['vPDate'];
	$vPPrice=$_POST['vPPrice'];
	$vAbsOwner=$_POST['vAbsOwner'];
	$vCOwner=$_POST['vCOwner'];
	$vABranch=$_POST['vABranch'];
	$vImage=$_POST['vImage'];
	$InsuranceDate=$_POST['InsuranceDate']; 
	$EmiTestDate=$_POST['EmiTestDate']; 	 
	 	 
	//Edit and Update Vehicle Details
	$sql_update="update vehicle set 
	vAc='$vAc'
	,vStatus='$vStatus'
	,driverId='$driverId'
	,vColorId='$vColorId'
	,vProvinceId='$vProvince'
	,vPDate='$vPDate'
	,vPPrice='$vPPrice'
	,vAbsOwner='$vAbsOwner'
	,vCurrentOwner='$vCOwner'
	,vBranchId='$vABranch' 
	,vImage='$vImage'
	,InsuranceDate='$InsuranceDate' 
	,EmiTestDate='$EmiTestDate'
	 where vId='$vId'";
	
	//echo $sql_update; echo '<br>';
	$res_update=mysqli_query($conn,$sql_update);
	//Check update of data
	if (($res_update)!="")
		{ 
		echo "Record Updated";
		//header('Location:viewVehicle.php');
		
		} 
	else {echo "Record not Updated"; }
}
?>

<html>
	<head><title>Edit Vehicle</title></head>
	<body>
		<h2><center>Edit Vehicle Details</center></h1>
		<main class='top'>
			<div>
				<table border=0 class='center' width = 80% align = 'center'>
					<form method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
					    
						<input type='hidden' name="vId" value='<?php echo $row['vId']; ?>'>
						<tr><td>Registration Number: </td><td><input type="text" name="vNo"  disabled value='<?php echo $row['vNo']; ?>'</td>
							<td>Year of Manufacture: </td><td><input type="text" name="vYear"  disabled value='<?php echo $row['vManYear']; ?>'</td>  
							<td>Engine NO:  </td><td><input type="text" name="vENo" disabled value='<?php echo $row['vEngNo']; ?>'</td></tr>
						<tr><td>Vehicle Category: </td><td><input type="text" name="vCat" disabled value='<?php echo $rowcat['vCategory']; ?>'</td>
							<td>Make: </td><td><input type="text" name="vMake" disabled value='<?php echo $rowmake['vMake']; ?>'</td>
							<td>Model:</td><td><input type="text" name="vModel" disabled value='<?php echo $rowmod['vModel']; ?>'</td></tr>
						<tr><td>Chassy Number:</td><td><input type="text" name="vChNo" disabled value='<?php echo $row['vChNo']; ?>'</td>
							<td>Number of seates: </td><td><input type="text" name="vNoSeat" disabled value='<?php echo $row['vNoSeat']; ?>'</td>
							<td>AC/NON AC:</td><td><select id="vAc" name="vAc" required>  <option value="AC">AC</option>
																  <option value="Non AC">Non AC</option></select></td></tr>		
						<tr><td>Status:</td><td><select id="vStatus" name="vStatus" required>  <option value="Available">Available</option>
																									<option value="On Repair">On Repair</option></select></td>
							<td>Driver :  </td><td><span class="error" ><?php	echo '<select name="driverId" ><option selected="selected" value='.$rowdri['driverId'].'>'.$driver.'</option>';
							//<td>Driver :  </td><td><span class="error" ><?php	echo '<select name="driverId" ><option selected="selected" value='.$driverS.'>'.$driver.'</option>';
							//<td>Driver :  </td><td><span class="error" ><?php	echo '<select name="driverId" ><option selected="selected" value="">'.$driver.'</option>';
								$sqldriver = "SELECT * FROM driver where driverId != '$driverS' AND driverId != 'D0000'"; 
								
								$resdriver = mysqli_query($conn,$sqldriver);
								while ($rowdriver = mysqli_fetch_array($resdriver)){
									$driverID=$rowdriver['driverId'];
									$driverFName=$rowdriver['driverFname'];
									$driverLName=$rowdriver['driverLname'];
									echo '<option value='.$driverID.'>'.$driverFName.' ' .$driverLName.'</option>';
									}
									echo '</select>';?>
										
							<td>Color:  </td><td><span class="error" ><?php	echo '<select name="vColorId"><option selected="selected" value='.$rowcol['vColorId'].'>'.$color.'</option>';
								$sqlcolor = "SELECT * FROM color where colorId != '$colorS'"; 
								$rescolor = mysqli_query($conn,$sqlcolor);
								while ($rowcolor = mysqli_fetch_array($rescolor)){
									$colorID=$rowcolor['colorId'];
									$colorName=$rowcolor['vColor'];
									echo '<option value='.$colorID.'>'.$colorName.'</option>';
									}
									echo '</select>';?> 
						<tr><td>Fuel Type:  </td><td><input type="text" name="vChNo" disabled value='<?php echo $row['vFuelType']; ?>'</td>
							<td>Fuel Capacity: </td><td><input type="number" name="vFCapacity"  disabled value='<?php echo $row['vFCapacity']; ?>' Required></td>
							<td>Distance per Litre: </td><td><input type="number" name="distancePerLitre" disabled value='<?php echo $row['distancePerLitre']; ?>' Required></td></tr></td></tr>
						<tr><td>Date of Registration: </td><td><input type="date" name="vRDate" disabled value='<?php echo $row['vRegDate']; ?>' ></td>
							<td>Province:  </td><td><span class="error" ><?php	echo '<select name="vProvince"><option selected="selected" value='.$rowpro['vProvinceId'].'>'.$province.'</option>';
								$sqlprovi = "SELECT * FROM province where provinceId != '$provinceS'"; 
								$resprovi = mysqli_query($conn,$sqlprovi);
								while ($rowprovi = mysqli_fetch_array($resprovi)){
									$proID=$rowprovi['provinceId'];
									$proName=$rowprovi['vProvince'];
									echo '<option value='.$proID.'>'.$proName.'</option>';
									}
									echo '</select>';?> 	
							<td>Purchase Date: </td><td><input type="date" name="vPDate" value='<?php echo $row['vPDate']; ?>' ></td></tr>
						<tr><td>Purchase Price: </td><td><input type="number" name="vPPrice"  value='<?php echo $row['vPPrice']; ?>' ></td>
							<td>Absolute Owner: </td><td><input type="text" name="vAbsOwner" value='<?php echo $row['vAbsOwner']; ?>' ></td>
							<td>Current Owner: </td><td><input type="text" name="vCOwner" value='<?php echo $row['vCurrentOwner']; ?>' ></td></tr>
						<tr><td>Assigned Branch:  </td><td><span class="error" ><?php	echo '<select name="vABranch"><option selected="selected" value='.$rowbr['vBranchId'].'>'.$branch.'</option>';
								$sqlbranch = "SELECT * FROM branch where branchId != '$branchS'"; 
								$resbranch = mysqli_query($conn,$sqlbranch);
								while ($rowbranch = mysqli_fetch_array($resbranch)){
									$branchID=$rowbranch['branchId'];
									$branchName=$rowbranch['vBranch'];
									echo '<option value='.$branchID.'>'.$branchName.'</option>';
									}
									echo '</select>';?></td>		
							<td>Start Meter Reading: </td><td><input type="text" name="vMRead" disabled value='<?php echo $row['vMRead']; ?>' ></td>
							<td>Image: </td><td><input type="text" name="vImage"  value='<?php echo $row['vImage']; ?>' ></td>
						<tr><td>License Renewal Date:  </td><td><input type="date" name="LicenseDate" disabled value='<?php echo $row['LicenseDate']; ?>' ></td>
							<td>Insurance Renewal Date:  </td><td><input type="date" name="InsuranceDate"  value='<?php echo $row['InsuranceDate']; ?>' ></td>		
							<td>Emmision Test Date:  </td><td><input type="date" name="EmiTestDate"  value='<?php echo $row['EmiTestDate']; ?>' ></td>
						<tr><td> <td></tr>
						<tr><td> <td></tr>
						<tr><td> <td></tr>
						<tr><td> <td></tr>
						<tr><td colspan=6 align='center'><input type="submit" value="SAVE CHANGES" onclick="" /></td></tr>

					</form> 
				</table>
			</div>
		</main>
	</body>
</html>
<?php
// Close Connection
mysqli_close($conn);
?>