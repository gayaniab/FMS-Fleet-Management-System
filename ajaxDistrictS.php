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
			$cityId=$rowSCity['cityId'];
			$cityName=$rowSCity['cityName'];
			/*echo "<option>"; echo $rowSCity['cityName'] ;echo "</option>";
			<option value= "<?php echo $rowSCity['cityId'] ?>"><?php echo $rowSCity['cityName'] ?></option>';*/ 
			echo '<option value='.$cityId.'>'.$cityName.'</option>';
		}	
		echo "</select>";
	}
	
mysqli_close($conn);
?>


