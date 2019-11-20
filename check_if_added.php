<?php
    
    function check_if_added_to_korpa($proizvod_id){
        //session_start();    
        require 'connection.php';
        $user_id=$_SESSION['id'];
        $proizvod_check_query="select * from korisnicka_korpa where proizvod_id='$proizvod_id' and user_id='$user_id' and status='Ubaceno u korpu'";
        $proizvod_check_result=mysqli_query($con,$proizvod_check_query) or die(mysqli_error($con));
        $num_rows=mysqli_num_rows($proizvod_check_result);
        if($num_rows>=1)return 1;
        return 0;
    }
?>