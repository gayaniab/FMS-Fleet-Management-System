<?php session_start();
//$_SESSION['roleId'];
//Open Connection
require_once("includes/opencon.php");
//Get author id
$vId=$_REQUEST['vId'];

//Delete a purticular Record
$sql_del="UPDATE VEHICLE SET active =0  where vId='$vId'";
$res_del= mysqli_query($conn,$sql_del);
//Check Deletion
	if (($res_del)!="")
		{ echo "Record Deleted";
		//header('Location:staffHome.php');
		} 
	else {echo "Record not Deleted"; }

//Close Connection
mysqli_close($conn);
?>