<?php
session_start();
//Open Connection
require_once("includes/opencon.php");
?>
<html>
<title>View Vehicle</title>
<script>
//Delete Confirmation 
function ConfirmDelete()
{
  var x = confirm('Are you sure you want to delete the vehicle?');
  if (x)
      return true;
  else
      return false;
} 
</script>
</head>
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
  <link rel="stylesheet" type="text/css" href="../css/menustyles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  </head>
 <body>
  <main class='top'>
	<div>
	
<?php
//View Author details
$vehicle= mysqli_query($conn,"SELECT * FROM vehicle WHERE active = 1 order by vId asc ;");
if (mysqli_num_rows($vehicle)>0){
	echo '<table border=1 align="center" width= 80%>';
	echo '<tr><td align="center" colspan=23>VEHICLE INFORMATION</td></tr>';
	echo '<tr>
	<td>Registration Number</td>
	<td>Vehicle Category</td>
	<td>No of Seats</td>
	<td>AC/NON AC</td>
	<td>Driver</td>
	</tr>';
	}
	
while($row = mysqli_fetch_array($vehicle))

	if (mysqli_num_rows($vehicle)>0){
		echo '<tr>';
		echo "<tr>";
		echo "<td>".$row['vNo']."</td>";
		//echo "<td>".$row['vCategoryId']."</td>";
		//Get Category name for a given category Id
		$catId = $row['vCategoryId'];
		$cat= mysqli_query($conn,"SELECT * FROM category where categoryId = '$catId' ;");
		$rowcat = mysqli_fetch_array($cat);
		echo "<td>".$rowcat['vCategory']." </td>";
		
		
		echo "<td>".$row['vNoSeat']."</td>";
		echo "<td>".$row['vAC']."</td>";
		 //Get driver name for a given driver Id
		$driverId = $row['driverId'];
		$driver= mysqli_query($conn,"SELECT * FROM driver where driverId = '$driverId' ;");
		$rowdriver = mysqli_fetch_array($driver);
		echo "<td>".$rowdriver['driverFname']." ".$rowdriver['driverLname']."</td>";
		
		echo "<td><a href=\"viewSingleVehicleDetails.php?vId=".$row['vId']."\">View More Details</a></td>";
		echo "<td><a href=\"editVehicle.php?vId=".$row['vId']."\">Edit</a></td>";
	  //echo "<td><a href=\"editauthors.php?authorId=".$row['authorId']."\">Edit</a></td>";
		echo "<td><a href=\"deleteVehicle.php?vId=".$row['vId']."\" onclick=\"return ConfirmDelete()\">Delete</a></td>";

	echo "</tr>";
}
echo "</form>";
echo "</table>
		</div>
		</main>";
		//require_once("includes/footer.php");
echo "	  </body>
	  </html>";
// Close Connection
mysqli_close($conn);
?>