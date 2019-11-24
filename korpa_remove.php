<?php
    require 'connection.php';
    session_start();
    $proizvod_id=$_GET['id'];
    $user_id=$_SESSION['id'];
    $delete_query="delete from korisnicka_korpa where user_id='$user_id' and proizvod_id='$proizvod_id'";
    $delete_query_result=mysqli_query($con,$delete_query) or die(mysqli_error($con));
    header('location: korpa.php');
?>