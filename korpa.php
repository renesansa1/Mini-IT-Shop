<?php
    session_start();
    require 'connection.php';
    if (!isset($_SESSION['email'])) {
        header('location: login_forma.php');
    }
    $user_id = $_SESSION['id'];
    $user_proizvod_query = "select proizvodi.id, proizvodi.ime_proizvoda, proizvodi.cena from korisnicka_korpa inner join proizvodi on proizvodi.id = korisnicka_korpa.proizvod_id where korisnicka_korpa.user_id = '$user_id'";
    $user_proizvod = $con->query($user_proizvod_query) or die($con->error);
    $broj_kor_proiz = mysqli_num_rows($user_proizvod);
    $sum = 0;

    while ($row = mysqli_fetch_array($user_proizvod)) {
        $sum = $sum + $row['cena'];
    }

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="img/ikon.png" />
    <title>Mini IT Shop Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- jquery library -->
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified javascript -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <div>
        <?php
            require 'header.php';
        ?>
        <br>
        <div class="container">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Broj Proizvoda</th>
                        <th>Ime Proizvoda</th>
                        <th>Cena</th>
                        <th></th>
                    </tr>
                    <?php
                    $user_proizvod = $con->query($user_proizvod_query) or die($con->error);
                    $broj_kor_proiz = mysqli_num_rows($user_proizvod);
                    $brojac = 1;
                    while ($row = mysqli_fetch_array($user_proizvod)) {

                        ?>
                    <tr>
                        <th><?php echo $brojac ?></th>
                        <th><?php echo $row['ime_proizvoda'] ?></th>
                        <th><?php echo $row['cena'] ?></th>
                        <th><a href='korpa_obrisi.php?id=<?php echo $row['id'] ?>'>Izbaci</a></th>
                    </tr>
                    <?php $brojac = $brojac + 1;
                    } ?>
                    <tr>
                        <th></th>
                        <th>Ukupno</th>
                        <th><?php echo $sum; ?></th>
                        <th><a <?php if ($sum == 0) {
                                    echo "<p style='color:black;'>Nema proizvoda u korpi.<a href='proizvodi.php'> Vrati se</a> ako želiš neki proizvod.</p>";
                                } else {
                                    ?> href="uspesno_kup.php?id=<?php echo $user_id ?>"
                                class="btn btn-primary">Potvrdite kupovinu</a></th><?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
            require 'footer.php';
        ?>
    </div>
</body>

</html>