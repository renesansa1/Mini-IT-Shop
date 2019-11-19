<?php
$con=new mysqli("localhost","root","","mini it shop") or die(mysqli_error($con));

$query = $con->query("SELECT * FROM proizvodi");
//$fetch = $query->fetch_array();

// function svi_id($con, $id){
//     $svi_id=$con->query("SELECT * FROM proizvodi WHERE id=$id");
//     $pid=$svi_id->fetch_assoc();
//     foreach($pid as $id)
//     return $id;
// }
//echo svi_id($con, 8);

?>