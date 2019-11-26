<?php
    require 'connection.php';
    session_start();
    $ime = mysqli_real_escape_string($con, $_POST['ime']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    if (strlen($password) < 6) {
        echo "Šifra mora imati najmanje 6 karaktera. Vraćamo vas na stranu za registraciju...";
?>
<meta http-equiv="refresh" content="2;url=signup.php" />
<?php
    }
    $kontakt_telefon = $_POST['kontakt_telefon'];
    $grad = mysqli_real_escape_string($con, $_POST['grad']);
    $adresa = mysqli_real_escape_string($con, $_POST['adresa']);
    $duplicate_user_query = "select id from korisnici where email='$email'";
    $duplicate_user_result = mysqli_query($con, $duplicate_user_query) or die(mysqli_error($con));
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

        $user_registration_result = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
        echo "Uspešno ste se registrovali";
        $_SESSION['email'] = $email;
        //The mysqli_insert_id() funkcija vraća id (generisana sa AUTO_INCREMENT) korišćena u poslednjem query.
        $_SESSION['id'] = mysqli_insert_id($con);
        //header('location: proizvodi.php');  //za redirect
?>
<meta http-equiv="refresh" content="3;url=proizvodi.php" />
<?php
}

?>