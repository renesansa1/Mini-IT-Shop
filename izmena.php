<?php
require 'connection.php';
	if(isset($_POST['izmeni_proizvod'])){
		$ime_proizvoda = $_POST['ime_proizvoda'];
        $cena = $_POST['cena'];
        $tip_proizvoda = $_POST['tip_proizvoda'];
        $opis = $_POST['opis'];
        $sql = $con->prepare("UPDATE proizvodi SET tip_proizvoda = ?, ime_proizvoda=?, cena=?, opis=?");
    if($sql === false)
        die("Los upit: ".$con->error);
    $sql->bind_param('ssis', $tip_proizvoda, $ime_proizvoda, $cena, $opis);
    $sql->execute();
    if($con->error)
        die("Imate gresku: ".$con->error);
    echo "Uspesno izmenjeni podaci";
	}
?>