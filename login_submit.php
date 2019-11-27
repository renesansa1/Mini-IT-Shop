<?php
    require 'connection.php';
    session_start();
    $email = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);
    if (strlen($password) < 6) {
        echo "Šifra mora imati najmanje 6 karaktera. Vraćamo vas na login stranu...";
?>
<meta http-equiv="refresh" content="2;url=login.php" />
<?php
    }
    $user_authentication_query = "select id,email from korisnici where email='$email' and password='$password'";
    $user_authentication_result = $con->query($user_authentication_query) or die($con->error);
    $rows_fetched = mysqli_num_rows($user_authentication_result);
    if ($rows_fetched == 0) {
        //ako nema usera
        //redirect na istu login stranu
?>
<script>
    window.alert("Pogrešno uneti username ili šifra");
</script>
<meta http-equiv="refresh" content="1;url=login.php" />
<?php
        //header('location: login');
        //echo "Pogresan email ili sifra.";
    } else {
        $row = mysqli_fetch_array($user_authentication_result);
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $row['id'];  //user id
        header('location: proizvodi.php');
    }

?>