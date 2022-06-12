<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  
<?php session_start();
require_once("includes/opencon.php");


//Generate Vehicle Request Id
$sql_jobID="select jobId from job order by jobId desc";
$res_jobID=mysqli_query($conn,$sql_jobID);
$row_jobID=mysqli_fetch_array($res_jobID);
$lastjobID=$row_jobID['jobId'];

if(empty($lastjobID)){
	$jobID='J0001';}
else{
	$rawjobID=str_replace("J","",$lastjobID);
	$jobID=str_pad($rawjobID+1,4,0,STR_PAD_LEFT);
	$jobID='J'.$jobID;}

$staffofficerErr="";
	
$regnoErr="";
$catErr="";
$makeErr="";
$modelErr="";




if($_SERVER["REQUEST_METHOD"]=="POST"){
	 $jobID=$_POST['jobID'];
	 $vId='V0000';
	 $driverId='D0000';
	 $Approved='NO';
	 $staffId=$_POST['staffId'];
	 $jobTask=$_POST['task'];
	 $jobStartDate=$_POST['sDate'];   
	 $jobStartTime=$_POST['sTime']; 
	 $jobEndDate=$_POST['eDate'];   
	 $jobEndTime=$_POST['eTime']; 
	 $jobStartDistrict=$_POST['district'];   
	 $jobEndDistrict=$_POST['city'];
	 $jobStartCity='';   
	 $jobEndCity='';	 
	 $noPassanger=$_POST['noOfpassngers']; 
	 $estimateDistance=$_POST['distance'];  
	 $estimatedFuelQty=$_POST['fuel'];
	 $jobReqDate=$_POST['rDate'];
		 
echo '   fffff   '; echo '<br>'; echo $staffId; echo '<br>'; echo $jobID; echo '<br>'; echo $jobTask;echo '<br>'; 
	 
	$query_job = "INSERT INTO job(jobId,vId,driverId,jobStartDate,jobStartTime,jobEndDate,jobEndTime,jobTask,noPassanger,estimateDistance,estimatedFuelQty,staffId,jobStartDistrict,jobEndDistrict,jobStartCity,jobEndCity,Approved,jobReqDate) 
		VALUES('".$jobID."','".$vId."','".$driverId."','".$jobStartDate."','".$jobStartTime."','".$jobEndDate."','".$jobEndTime."','".$jobTask."','".$noPassanger."','".$estimateDistance."','".$estimatedFuelQty."','".$staffId."','".$jobStartDistrict."','".$jobEndDistrict."','".$jobStartCity."','".$jobEndCity."','".$Approved."','".$jobReqDate."')";
		
	/****************Check for empty Fields*********************************/	
	if (empty($_POST["staffId"])) {
		$staffofficerErr = "Officer is required";}

	if (empty($_POST["vCat"])) {
		$catErr = "Category is required";}
	if (empty($_POST["vMake"])) {
		$makeErr = "Make is required";}
	if (empty($_POST["vModel"])) {
		$modelErr = "Model is required";}
	
	if (empty($_POST["vColor"])) {
		$colorErr = "Color is required";}
	
	/************************************************/	
	$res_job=mysqli_query($conn, $query_job);
	echo $query_job;
	echo "<br>";
	echo $res_job ;
	echo "<br>";
	// Check insertion of data
	if (($res_job)!="")	{echo "Record successfully inserted"; } 
	else {echo "Record not inserted"; }
}
?>

<html>
<head>
<!--include CSS-->
  <title>Vehicle Rrequisition Form</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="css/menustyles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>

</head>
<body>

<script>

function Validate() {return true;}       
}
</script>

	<main class='top'>
		<div>
			<table border="0" align="center" class="center">
						
				<form  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<tr><td colspan=8 align="center">Vehicle Requisition Form</td></tr>
					<tr><td></td></tr>
					<tr><td></td></tr>
					<input type="hidden" name="jobID" value='<?php echo $jobID; ?>'>
					
					<!-------------------------------------------------------------------->
					
					<tr><td>District</td><td><select name="district" id ="district" onchange="ChangeDistrict()" >
								<option selected="selected" value="">----Select----</option>
								<?php
									$resDistrict = mysqli_query($conn,"SELECT * FROM district");
									while ($rowDistrict = mysqli_fetch_array($resDistrict)){
										
									?>
									<option value= "<?php echo $rowDistrict['districtId'] ?>"><?php echo $rowDistrict['districtName'] ?></option>';
									<?php
									}
								?>
								</select>
								</td></tr>
					<tr><td>City </td>
						<td><div id ="divcity">
								<select name="city" id ="city">
									<option>----Select----</option>
									
								</select>
							
							</div>
						
							
						</td>
					</tr>			
					<!-------------------------------------------------------------------->
		
								

					<tr><td>Name of the officer requesting the vehicle:  </td><td><span class="error" >		
						<?php	echo '<select name="staffId" id ="staffId" onchange="ChangeofficerDetail(this.value)" >
								<option selected="selected" value="">----Select----</option>';
							$sqlstaffofficer = "SELECT * FROM staffofficer"; 
							$resstaffofficer = mysqli_query($conn,$sqlstaffofficer);
							while ($rowstaffofficer = mysqli_fetch_array($resstaffofficer)){
								$officer=$rowstaffofficer['staffId'];
								$officerFName=$rowstaffofficer['staffFname'];
								$officerLName=$rowstaffofficer['staffLname'];
								echo '<option value='.$officer.'>'.$officerFName.' ' .$officerLName.'</option>';

								}
								echo '</select>';?><span class="error"> <?php echo $staffofficerErr;?> </span></td></tr>	
													 
					<tr><td>Designation: </td><td><input type="text" name="designation" id="designation" disabled></td></tr>
					<tr><td>Branch:  </td><td><input type="text" name="branch" id="branch" disabled></td></tr>
					<tr><td>Mobile Number:  </td><td><input type="text" name="mobile" id="mobile" disabled></td>						
					<tr><td>Task of the Journey : </td><td><input type="text" name="task" Required></td>	
					<tr><td>Journey Starting Date: </td><td><input type="date" name="sDate" Required></td><td>  </td>
						<td>Journey End Date: </td><td><input type="date" name="eDate" Required>     </td></tr>
					<tr><td>Journey Starting Time: </td><td><input type="time" name="sTime"Required></td><td>  </td>
						<td>Journey End Time: </td><td><input type="time" name="eTime" Required>     </td></tr>
					
					<tr><td>Number of Passangers: </td><td><input type="number" name="noOfpassngers" Required></td><td>     </td>
					<tr><td>Estimated Distance  Km: </td><td><input type="number" name="distance" value=0></td><td>     </td>
					<tr><td>Estimated Fuel quantity  Litres: </td><td><input type="number"  name="fuel" value=0 ></td><td>     </td>
					<tr><td>Date Requested : </td><td><input type="date" name="rDate" Required></td>
						
					<tr><td>  </td></tr>
					<tr><td>  </td></tr>
					<tr><td></td></tr>					
				<tr><td colspan=8 align="center"><input type="submit" value="REQUEST JOB" onclick="return Validate()" /></td></tr> 
				</form>
				
				<script type="text/javascript">
				function ChangeDistrict(){
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.open("GET", "ajaxDistrict.php?dID="+document.getElementById("district").value,false);
					xmlhttp.send(null);
					
					document.getElementById('city').innerHTML=xmlhttp.responseText;
					//alert(xmlhttp.responseText);  
				}
						
				function ChangeofficerDetail(str1) {
				  var xhttp;    
				  if (str1 == "") {
					document.getElementById("designation").value = "";
					document.getElementById("branch").value = "";
					document.getElementById("mobile").value = "";
					return;
				  }
				  xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						officerDetailArray = value=xhttp.responseText.split(',');
						// insert designation into appropriate box
						document.getElementById("designation").value=officerDetailArray[0];
						// insert branch into appropriate box
						document.getElementById("branch").value=officerDetailArray[1];
						// insert mobile into appropriate box
						document.getElementById("mobile").value=officerDetailArray[2];
					
					  //document.getElementById("designation").value = this.responseText;
					}
				  };
				  xhttp.open("GET", "ajaxOfficer.php?sID="+str1, true);
				  xhttp.send();
				}			
				</script>
			</table>
		</div>
	</main>
</body>
</html>
<?php
// Close Connection
mysqli_close($conn);
?>			


