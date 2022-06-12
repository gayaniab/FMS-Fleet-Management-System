<?php
require_once('includes/opencon.php');

	$sID=$_GET['sID'];
	if ($sID !="")
	{
		$resB = mysqli_query($conn,"SELECT * FROM staffOfficer s,branch b WHERE s.staffId='$sID' and s.branchId = b.branchId"); 
		while($rowB = mysqli_fetch_array($resB))
		{
			$res = mysqli_query($conn,"SELECT * FROM staffOfficer WHERE staffId='$sID'"); 
			while($row = mysqli_fetch_array($res))
			{
				echo $row['staffDesignation'] .",". $rowB['vBranch'] .",". $row['staffMobile'];
			} 
		}	
	}

mysqli_close($conn);
?>

