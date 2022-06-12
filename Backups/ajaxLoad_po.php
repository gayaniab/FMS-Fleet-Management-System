<?php
require_once('includes/opencon.php');

//Get Values for Supplier Address
$q = strval($_GET['q']);

echo $q;

$sql_sp="SELECT staffDesignation,staffMobile,staffEmail FROM staffOfficer WHERE staffOfficer.staffId='".$q."'";
$res_sp = mysqli_query($conn,$sql_sp);
while($row_sp = mysqli_fetch_array($res_sp)) {
echo $row_sp['staffDesignation'] ;
} 


mysqli_close($conn);
?>