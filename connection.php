<?php
    $con=new mysqli("localhost","root","","mini it shop") or die($con->error);
    $query = $con->query("SELECT * FROM proizvodi");
?>