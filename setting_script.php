<?php
    session_start();
    require 'connection.php';
    if (!isset($_SESSION['email'])) {
        header('location:index.php');
    }
    $old_password = $con->real_escape_string($_POST['stara_sifra']);
    $new_password = $con->real_escape_string($_POST['nova_sifra']);
    $email = $_SESSION['email'];
    //echo $email;
    $password_from_database_query = "select password from korisnici where email='$email'";
    $password_from_database_result = $con->query($password_from_database_query) or die($con->error);
    $row = mysqli_fetch_array($password_from_database_result);
    //echo $row['password'];
    if ($row['password'] == $old_password) {
        $update_password_query = "update korisnici set password='$new_password' where email='$email'";
        $update_password_result = $con->query($update_password_query) or die($con->error);
        echo "Vaša šifra je promenjena.";
?>
<meta http-equiv="refresh" content="3;url=proizvodi.php" />
<?php
    } else {
        ?>
    <script>
    window.alert("Pogrešna Šifra!");
    </script>
    <meta http-equiv="refresh" content="1;url=settings.php" />
<?php
    //header('location:settings.php');
}
?>