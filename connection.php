<?php
    $con=new mysqli("localhost","root","","mini it shop") or die(mysqli_error($con));
    $query = $con->query("SELECT * FROM proizvodi");
?>