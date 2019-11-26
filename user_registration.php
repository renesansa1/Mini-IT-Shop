<?php
    require 'connection.php';
    session_start();
    $ime = $con->real_escape_string($_POST['ime']);
    $email = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);
    if (strlen($password) < 6) {
        echo "Šifra mora imati najmanje 6 karaktera. Vraćamo vas na stranu za registraciju...";
?>
<meta http-equiv="refresh" content="2;url=signup.php" />
<?php
    }
    $kontakt_telefon = $_POST['kontakt_telefon'];
    $grad = $con->real_escape_string($_POST['grad']);
    $adresa = $con->real_escape_string($_POST['adresa']);
    $duplicate_user_query = "select id from korisnici where email='$email'";
    $duplicate_user_result = $con->query($duplicate_user_query) or die($con->error);
    $rows_fetched = mysqli_num_rows($duplicate_user_result);
    if ($rows_fetched > 0) {
        //ako već postoji email adresa
        //header('location: signup.php');
    ?>
<script>
    window.alert("Email adresa je već koriščena za logovanje!");
</script>
<meta http-equiv="refresh" content="1;url=signup.php" />
<?php
    } else {
        $user_registration_query = "insert into korisnici(ime,email,password,kontakt_telefon,grad,adresa) values ('$ime','$email','$password','$kontakt_telefon','$grad','$adresa')";

        $user_registration_result = $con->query($user_registration_query) or die($con->error);
        echo "Uspešno ste se registrovali";
        $_SESSION['email'] = $email;
        //The $con->insert_id funkcija vraća id (generisana sa AUTO_INCREMENT) korišćena u poslednjem query.
        $_SESSION['id'] = $con->insert_id;
        //header('location: proizvodi.php');  //za redirect
?>
<meta http-equiv="refresh" content="3;url=proizvodi.php" />
<?php
}

?>