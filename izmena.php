<?php
session_start();
require 'connection.php';
if($con->error)  die("Imate gresku: ".$con->error);
if(isset($_GET["daj_1"])) {
    $id_p = $_GET['daj_1'] ?? '';
    if($id_p =='') die(json_encode(['Nema id']));
    $rez = $con->query("SELECT * FROM proizvodi WHERE id=".$id_p);
    echo json_encode(mysqli_fetch_array($rez));
}    
if(isset($_POST['izmeni_proizvod'])){
    if($con->error)  die("Imate gresku: ".$con->error);
    $id = addslashes($_POST['id']);
    $ime_proizvoda = addslashes($_POST['ime_proizvoda']);
			$cena = $_POST['cena'];
			$tip_proizvoda = addslashes($_POST['tip_proizvoda']);
			$opis = addslashes($_POST['opis']);
    $con->query("UPDATE `proizvodi` SET `tip_proizvoda`='$tip_proizvoda',`ime_proizvoda`='$ime_proizvoda',`cena`='$cena',`opis`='$opis' WHERE `id`=$id");
					
         echo "<script>alert('Podaci izmenjeni')</script>";
         echo "<script>window.location = 'admin.php'</script>";
	}
?>