<?php
session_start();
	require 'connection.php';
 
	if(ISSET($_POST['dodaj_proizvod'])){
		if(!empty($_POST['ime_proizvoda']) && !empty($_POST['cena']) && !empty($_POST['tip_proizvoda']) && !empty($_POST['opis'])){
			$ime_proizvoda = addslashes($_POST['ime_proizvoda']);
			$cena = $_POST['cena'];
			$tip_proizvoda = addslashes($_POST['tip_proizvoda']);
			$opis = addslashes($_POST['opis']);
			$file = explode(".", $_FILES['slika']['name']);
			$ext = array("png", "gif", "jpg", "jpeg");
 
			if(in_array($file[1], $ext)){
				$file_name = $file[0].'.'.$file[1];
				$tmp_file = $_FILES['slika']['tmp_name'];
				$lokacija = "img/".$file_name;
				$nova_lokacija = addslashes($lokacija);
 
				if(move_uploaded_file($tmp_file, $lokacija)){
					$con->query("INSERT INTO proizvodi VALUES('','$tip_proizvoda', '$ime_proizvoda', '$cena', '$opis', '$nova_lokacija')");
					echo "<script>alert('Podaci ubaceni')</script>";
					echo "<script>window.location = 'admin.php'</script>";
				}
 
			}else{
				echo "<script>alert('Fajl nije dostupan')</script>";
				echo "<script>window.location = 'index.php'</script>";
			}
 
		}else{
			echo "<script>alert('Popunite prazna polja!')</script>";
		}
 
 
	}
?>
