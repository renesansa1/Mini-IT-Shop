<?php
    require 'connection.php';
    session_start();
    $proizvod_id=$_GET['id'];
    $user_id=$_SESSION['id'];
    $ubaci_u_korpu_query="insert into korisnicka_korpa(user_id,proizvod_id,status) values ('$user_id','$proizvod_id','Ubaceno u korpu')";
    $ubaci_u_korpu=$con->query($ubaci_u_korpu_query) or die($con->error);
    header('location: proizvodi.php');
?>