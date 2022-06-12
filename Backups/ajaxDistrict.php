<?php
require_once('includes/opencon.php');
	/* Pass Start City*/
	$sdID=$_GET['sdID'];  
	if ($sdID !="")
	{
		$resSCity = mysqli_query($conn,"SELECT * FROM city WHERE districtId='$sdID'"); 
		echo "<select>";
		while($rowSCity = mysqli_fetch_array($resSCity))
		{
			echo "<option>"; echo $rowSCity['cityName'] ;echo "</option>";	
		}	
		echo "</select>";
	}
	
	/* Pass End City*/
	$edID=$_GET['edID'];
	if ($edID !="")
	{
		$resECity = mysqli_query($conn,"SELECT * FROM city WHERE districtId='$edID'"); 
		echo "<select>";
		while($rowECity = mysqli_fetch_array($resECity))
		{
			echo "<option>"; echo $rowECity['cityName'] ;echo "</option>";	
		}	
		echo "</select>";
	}


mysqli_close($conn);
?>

