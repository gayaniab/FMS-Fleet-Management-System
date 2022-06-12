<?php
require_once('includes/opencon.php');
		
	/* Pass End City*/
	$edID=$_GET['edID'];
	if ($edID !="")
	{
		$resECity = mysqli_query($conn,"SELECT * FROM city WHERE districtId='$edID'"); 
		echo "<select>";
		while($rowECity = mysqli_fetch_array($resECity))
		{
			$cityId=$rowECity['cityId'];
			$cityName=$rowECity['cityName'];
			echo '<option value='.$cityId.'>'.$cityName.'</option>';
		}	
		echo "</select>";
	}


mysqli_close($conn);
?>

