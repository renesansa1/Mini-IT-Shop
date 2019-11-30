<?php
require "connection.php";
$v = json_decode(stripslashes(file_get_contents("php://input")));
if ($con->connect_error)
	die ('Greska u konekciji: '. $con->connect_error);

if(isset($v->id))
    $id_p = "'".$con->real_escape_string($v->id)."'";
else
    die("Nema tog proizvoda!");

$brisanje = $con->query("DELETE FROM proizvodi WHERE id=$id_p");
if($brisanje === false){
    die("Pogresan query: ".$con->error);
}
echo "Proizvod obrisan!";
?>