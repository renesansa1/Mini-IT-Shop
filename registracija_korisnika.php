<?php
    require 'connection.php';
    session_start();
    $ime = $con->real_escape_string($_POST['ime']);
    $email = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);
    if (strlen($password) < 6) {
        echo "Šifra mora imati najmanje 6 karaktera. Vraćamo vas na stranu za registraciju...";
?>
<meta http-equiv="refresh" content="2;url=registracija_forma.php" />
<?php
    }
    $kontakt_telefon = $_POST['kontakt_telefon'];
    $grad = $con->real_escape_string($_POST['grad']);
    $adresa = $con->real_escape_string($_POST['adresa']);
    $postojeci_email_query = "select id from korisnici where email='$email'";
    $postojeci_email = $con->query($postojeci_email_query) or die($con->error);
    $postojeci_korisnik = mysqli_num_rows($postojeci_email);
    if ($postojeci_korisnik > 0) {
        //ako već postoji email adresa
        //header('location: registracija_forma.php');
    ?>
<script>
    window.alert("Email adresa je već koriščena za registraciju!");
</script>
<meta http-equiv="refresh" content="1;url=registracija_forma.php" />
<?php
    } else {
        $registracija_korisnika_query = "insert into korisnici(ime,email,password,kontakt_telefon,grad,adresa) values ('$ime','$email','$password','$kontakt_telefon','$grad','$adresa')";

        $registracija_korisnika = $con->query($registracija_korisnika_query) or die($con->error);
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