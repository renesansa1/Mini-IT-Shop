<?php
session_start();
require 'connection.php';
	if(isset($_POST['izmeni_proizvod'])){
        if(isset($_GET["daj_1"])) {
            $id_p = $_GET['daj_1'] ?? '';
            if($id_p =='') die(json_encode(['Nema id']));
            $rez = $con->query("SELECT * FROM proizvodi WHERE id=".$id_p);
             echo json_encode($rez[0]);
        }
        if($con->error)
         die("Imate gresku: ".$con->error);
         echo "<script>alert('Podaci izmenjeni')</script>";
         echo "<script>window.location = 'admin.php'</script>";
	}
?>