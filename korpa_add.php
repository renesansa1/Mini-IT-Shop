<?php
    require 'connection.php';
    session_start();
    $proizvod_id=$_GET['id'];
    $user_id=$_SESSION['id'];
    $add_to_korpa_query="insert into korisnicka_korpa(user_id,proizvod_id,status) values ('$user_id','$proizvod_id','Ubaceno u korpu')";
    $add_to_korpa_resultat=$con->query($add_to_korpa_query) or die($con->error);
    header('location: proizvodi.php');
?>