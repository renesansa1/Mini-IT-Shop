<?php
    function da_li_je_u_korpi($proizvod_id){
        //session_start();    
        require 'connection.php';
        $user_id=$_SESSION['id'];
        $proizvod_provera_query="select * from korisnicka_korpa where proizvod_id='$proizvod_id' and user_id='$user_id' and status='Ubaceno u korpu'";
        $proizvod_provera=$con->query($proizvod_provera_query) or die($con->error);
        $broj_proizvoda=mysqli_num_rows($proizvod_provera);
        if($broj_proizvoda>=1)return 1;
        return 0;
    }
?>