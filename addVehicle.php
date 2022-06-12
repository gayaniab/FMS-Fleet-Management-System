<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  
<?php session_start();
require_once("includes/opencon.php");

//Generate Vehicle Id
$sql_vID="select vID from vehicle order by vID desc";
$res_vID=mysqli_query($conn,$sql_vID);
$row_vID=mysqli_fetch_array($res_vID);
$lastvID=$row_vID['vID'];

if(empty($lastvID)){
	$vID='V0001';}
else{
	$rawvID=str_replace("V","",$lastvID);
	$vID=str_pad($rawvID+1,4,0,STR_PAD_LEFT);
	$vID='V'.$vID;}
	
$regnoErr="";
$catErr="";
$makeErr="";
$modelErr="";
$driverErr="";
$colorErr="";
$provinceErr="";
$branchErr="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
	 $vID=$_POST['vID'];
	 $vNo=$_POST['vNo'];
	 $vCat=$_POST['vCat'];
	 $vMake=$_POST['vMake'];
	 $vModel=$_POST['vModel'];
	 $vNSeat=$_POST['vNSeat'];
	 $vYear=$_POST['vYear'];
	 $vPDate=$_POST['vPDate'];
	 $vPPrice=$_POST['vPPrice'];
	 $vENo=$_POST['vENo'];
	 $vChNo=$_POST['vChNo'];
	 $vAc=$_POST['vAc'];
	 $vFCapacity=$_POST['vFCapacity'];
	 $vImage=$_POST['vImage'];
	 $vAOwner=$_POST['vAOwner'];
	 $vCon=$_POST['vStatus'];
	 $vProvince=$_POST['vProvince'];
	 $vColor=$_POST['vColor'];
	 $vRDate=$_POST['vRDate'];
	 $vFtype=$_POST['vFtype'];
	 $vABranch=$_POST['vABranch'];
	 $vCOwner=$_POST['vCOwner'];
	 $vMRead=$_POST['vMRead'];
	 $vDriverID=$_POST['driverId'];
	 $distancePerLitre =$_POST['distancePerLitre'];
	 $LicenseDate = $_POST['LicenseDate'];
	 $InsuranceDate=$_POST['InsuranceDate'];
	 $EmiTestDate=$_POST['EmiTestDate'];
	 
	/************Check for duplicate Vehicle Reg No******************/
	$dupvNo = "SELECT vNo FROM vehicle where vNo = '$vNo' ";
	$result =mysqli_query($conn,$dupvNo);
	$count = mysqli_num_rows($result);
	if ($count > 0){
		$regnoErr = "Registration Number already exists!";
			}
	//if ($count > 0){
		//echo "<h1>Vehicle Reg No already exists !</h1>";
		//return false;
	//}
 	
	$query_veh = "INSERT INTO vehicle (vId,vNo,vCategoryId,vMakeId ,vModelId ,vNoSeat,vManYear,vPDate,vPPrice,vEngNo,vChNo,vAc,vFCapacity,vImage,vAbsOwner,vStatus,vProvinceId,vColorId,vRegDate,vFuelType,vBranchId,vCurrentOwner,vMRead,driverId,distancePerLitre,LicenseDate,InsuranceDate,EmiTestDate,active) 
		VALUES('".$vID."','".$vNo."','".$vCat."','".$vMake."','".$vModel."','".$vNSeat."','".$vYear."','".$vPDate."','".$vPPrice."','".$vENo."','".$vChNo."','".$vAc."','".$vFCapacity."','".$vImage."','".$vAOwner."','".$vCon."','".$vProvince."','".$vColor."','".$vRDate."','".$vFtype."','".$vABranch."','".$vCOwner."','".$vMRead."','".$vDriverID."','".$distancePerLitre."','".$LicenseDate."','".$InsuranceDate."','".$EmiTestDate."',1)";
		//		VALUES('".$vID."','".$vNo."','".$vCat."','".$vMake."','".$vModel."','".$vNSeat."','".$vYear."','".$vPDate."','".$vPPrice."','".$vENo."','".$vChNo."','".$vAc."','".$vFCapacity."','".$vImage."','".$vAOwner."','".$vCon."','".$vProvince."','".$vColor."','".$vRDate."','".$vFtype."','".$vABranch."','".$vCOwner."','".$vMRead."','".$vDriverID."','".$distancePerLitre."')";
		//		    vID,	vNo,		vCat,		vMake,		vModel,			vNSeat,		vYear,		  vPDate,	    vPPrice,		vENo,		vChNo,		vAc,		vFCapacity,			vImage,		vAOwner,		vCon,		vProvince,		vColor,		vRDate,			vFtype,		vABranch,			vCOwner,	vMRead) 
	
	/****************Check for empty Fields*********************************/	

	if (empty($_POST["vCat"])) {
		$catErr = "Category is required";}
	if (empty($_POST["vMake"])) {
		$makeErr = "Make is required";}
	if (empty($_POST["vModel"])) {
		$modelErr = "Model is required";}
	if (empty($_POST["driverId"])) {
		$driverErr = "Driver is required";}
	if (empty($_POST["vColor"])) {
		$colorErr = "Color is required";}
	if (empty($_POST["vProvince"])) {
		$provinceErr = "Province is required";}
	if (empty($_POST["vABranch"])) {
		$branchErr = "Branch is required";}
	/************************************************/	
	$res_veh=mysqli_query($conn, $query_veh);
	//echo $query_veh;
	//echo "<br>";
	//echo $res_veh ;
	//echo "<br>";
	// Check insertion of data
	if (($res_veh)!="")	{echo "Record successfully inserted"; } 
	else {echo "Record not inserted"; }
}
?>

<html>
<head>
<!--include CSS-->
  <title>Vehicle Register Page</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="css/menustyles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script>

function ajaxFun(str) {
  var xhttp;    
  if (str == "") {
    document.getElementById("message3").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("message3").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ajaxloadun.php?q="+str, true);
  xhttp.send();
}

function Validate() {return true;}
        
}

</script>
</head>
<body>
	<main class='top'>
		<div>
			<table border="0" align="center" class="center">
						
				<form  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<tr><td colspan=8 align="center">VEHICLE REGISTRATION</td></tr>
					<tr><td></td></tr>
					<input type="hidden" name="vID" value='<?php echo $vID; ?>'>
					<tr><td>Vehicle Reg Number: </td><td><span class="error" ><input type="text" name="vNo" placeholder="XX-1234"   pattern="[A-Z]{2}-[0-9]{4}" title="Eg: KS-9597" max=7 Required><span class="error"> <?php echo $regnoErr;?></span></td><td>     </td>
						<!--<tr><td>Vehicle Reg Number: </td><td><span class="error" ><input type="text" name="vNo" placeholder="XX-XXX1234"   pattern="[A-Z]{2}-[A-Z]{2,3}[0-9]{4}" title="Eg: WP-KS9597/WP-KAS9597" max=10 Required><span class="error"> <?php echo $regnoErr;?></span></td><td>     </td>
						<tr><td>Vehicle Reg Number: </td><td><input type="text" name="vNo" placeholder="XX-XXX1234"   pattern="[A-Z]{2}-[A-Z]{2,3}[0-9]{4}" title="Eg: WP-KS9597/WP-KAS9597" max=10 Required></td><td>     </td>
						<div id = "id_err" style ="color:red"></div>
									</div>-->
								
						<td>Year of Manufacture: </td><td>  
							<?php 
								$year_start  = 2010;
								$year_end = date('Y'); // current Year
								$user_selected_year = 2015; // user date of birth year
								echo '<select id="vYear" name="vYear">'."\n";
								for ($i_year = $year_start; $i_year <= $year_end; $i_year++) {
									$selected = ($user_selected_year == $i_year ? ' selected' : '');
									echo '<option value="'.$i_year.'"'.$selected.'>'.$i_year.'</option>'."\n";
								}
								echo '</select>'."\n";
							?>
						</td><td>     </td>
						<td>Engine Number: </td><td><input type="text" name="vENo" Required></td><td>     </td>
 					<tr><td>Category: </td><td><span class="error" > <?php	echo ' <select name="vCat"><option selected="selected" value="">----Select----</option>';
							$sqlvcat = "SELECT * FROM category"; 
							$resvcat = mysqli_query($conn,$sqlvcat);
							while ($rowvcat = mysqli_fetch_array($resvcat)){
								$categoryID=$rowvcat['categoryID'];
								$categoryName=$rowvcat['vCategory'];
								echo '<option value='.$categoryID.'>'.$categoryName.'</option>';
								}
								echo '</select>'; ?> <span class="error"> <?php echo $catErr;?></span> </td><td>     </td>													  
						<td>Make: </td><td><span class="error" > <?php	echo '<select name="vMake"><option selected="selected" value="">----Select----</option>';
							$sqlmake = "SELECT * FROM make"; 
							$resmake = mysqli_query($conn,$sqlmake);
							while ($rowmake = mysqli_fetch_array($resmake)){
								$makeID=$rowmake['vMakeId'];
								$makeName=$rowmake['vMake'];
								echo '<option value='.$makeID.'>'.$makeName.'</option>';
								}
								echo '</select>';?><span class="error"> <?php echo $makeErr;?></span></td><td>     </td>														  
						<td>Model:</td><td><span class="error" > <?php	echo '<select name="vModel"><option selected="selected" value="">----Select----</option>';
							$sqlvModel = "SELECT * FROM model"; 
							$resvModel = mysqli_query($conn,$sqlvModel);
							while ($rowvModel = mysqli_fetch_array($resvModel)){
								$modelID=$rowvModel['vModelId'];
								$modelName=$rowvModel['vModel'];
								echo '<option value='.$modelID.'>'.$modelName.'</option>';
								}
								echo '</select>';?><span class="error"> <?php echo $modelErr;?></span></td>	
					<tr><td>Chassy Number: </td><td><input type="text" name="vChNo" Required></td><td>     </td>
					    <td>Number of seates: </td><td><input type="number" name="vNSeat" Required></td><td>     </td>
						<td>AC/NON AC:</td><td><select id="vAc" name="vAc" required>  <option value="AC">AC</option>
															  <option value="Non AC">Non AC</option></select></td></tr>		
					<tr><td>Status:</td><td><select id="vStatus" name="vStatus" required>  <option value="Available">Available</option>
																				<option value="On Repair">On Repair</option></select></td><td>     </td>		
					    <td>Driver :  </td><td><span class="error" ><?php	echo '<select name="driverId" ><option selected="selected" value="">----Select----</option>';
							$sqldriver = "SELECT * FROM driver WHERE driverId != 'D0000'"; 
							$resdriver = mysqli_query($conn,$sqldriver);
							while ($rowdriver = mysqli_fetch_array($resdriver)){
								$driverID=$rowdriver['driverId'];
								$driverFName=$rowdriver['driverFname'];
								$driverLName=$rowdriver['driverLname'];
								echo '<option value='.$driverID.'>'.$driverFName.' ' .$driverLName.'</option>';
								}
								echo '</select>';?><span class="error"> <?php echo $driverErr;?> </span></td><td>     </td>	
					
					    <td>Color:  </td><td><span class="error" ><?php	echo '<select name="vColor"><option selected="selected" value="">----Select----</option>';
							$sqlcolor = "SELECT * FROM color"; 
							$rescolor = mysqli_query($conn,$sqlcolor);
							while ($rowcolor = mysqli_fetch_array($rescolor)){
								$colorID=$rowcolor['colorId'];
								$colorName=$rowcolor['vColor'];
								echo '<option value='.$colorID.'>'.$colorName.'</option>';
								}
								echo '</select>';?> <span class="error"> <?php echo $colorErr;?> </span></td><td>     </td></tr>		
					
					<tr><td>Fuel Type:  </td><td><select id="vFtype" name="vFtype" required>  <option value="Petrol">Petrol</option>
															  <option value="Diesel">Diesel<option></select></td><td>     </td>		
						<td>Fuel Capacity: </td><td><input type="number" name="vFCapacity" Required></td><td>     </td>
						<td>Distance per Litre(Km): </td><td><input type="number" name="distancePerLitre" value=0></td><td>     </td></tr>

					<tr><td>Date of Registration: </td><td><input type="date" name="vRDate" Required></td><td>     </td>
						<td>Province: </td><td><span class="error" ><?php	echo '<select name="vProvince"><option selected="selected" value="">----Select----</option>';
							$sqlprovince = "SELECT * FROM province"; 
							$resprovince = mysqli_query($conn,$sqlprovince);
							while ($rowprovince = mysqli_fetch_array($resprovince)){
								$provinceID=$rowprovince['provinceId'];
								$provinceName=$rowprovince['vProvince'];
								echo '<option value='.$provinceID.'>'.$provinceName.'</option>';
								}
								echo '</select>';?><span class="error"> <?php echo $provinceErr;?></span></td><td>     </td>	
						<td>Purchase Date: </td><td><input type="date" name="vPDate" Required></td><td>     </td></tr>
					<tr><td>Purchase Price: </td><td><input type="number" name="vPPrice" value=0 ></td><td>     </td>
						<td>Absolute Owner: </td><td><input type="text" name="vAOwner" ></td><td>     </td>
						<td>Current Owner: </td><td><input type="text" name="vCOwner" ></td><td>     </td>
					<tr><td>Assigned Branch:  </td><td><span class="error" ><?php	echo '<select name="vABranch"><option selected="selected" value="">----Select----</option>';
							$sqlbranch = "SELECT * FROM branch"; 
							$resbranch = mysqli_query($conn,$sqlbranch);
							while ($rowbranch = mysqli_fetch_array($resbranch)){
								$branchID=$rowbranch['branchId'];
								$branchName=$rowbranch['vBranch'];
								echo '<option value='.$branchID.'>'.$branchName.'</option>';
								}
								echo '</select>';?><span class="error"> <?php echo $branchErr;?></span></td><td>     </td>		
						<td>Start Meter Reading: </td><td><input type="text" name="vMRead" Required></td><td>     </td>
					    <td>Image: </td><td><input type="text" name="vImage"   ></td><td>     </td></tr> 
						<!--<td>Image URL: </td><td><input type="text" name="vImage"   ></td><td>     </td></tr>-->
						<tr><td>License Renewed Date:  </td><td><input type="date" name="LicenseDate" Required></td><td>     </td>
						    <td>Insurance Renewed Date:  </td><td><input type="date" name="InsuranceDate" Required></td><td>     </td>		
						    <td>Last Emision Test Date:  </td><td><input type="date" name="EmiTestDate" Required></td><td>     </td></tr>
						<!--<td>Image URL: </td><td><input type="text" name="vImage"   ></td><td>     </td></tr>-->
					<tr><td>  </td></tr>
					<tr><td>  </td></tr>					
				<tr><td colspan=8 align="center"><input type="submit" value="REGISTER" onclick="return Validate()" /></td></tr> 
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