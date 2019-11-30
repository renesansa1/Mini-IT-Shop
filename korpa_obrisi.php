<?php
    require 'connection.php';
    session_start();
    $proizvod_id=$_GET['id'];
    $user_id=$_SESSION['id'];
    $obrisi_query="delete from korisnicka_korpa where user_id='$user_id' and proizvod_id='$proizvod_id'";
    $obrisi=$con->query($obrisi_query) or die($con->error);
    header('location: korpa.php');
?>