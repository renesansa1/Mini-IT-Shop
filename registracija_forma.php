<?php
    require 'connection.php';
    session_start();
    if (isset($_SESSION['email'])) {
        header('location: proizvodi.php');
    }
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="img/ikon.png" />
    <title>Mini IT Shop Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- eksterni css -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <div>
        <?php
            require 'header.php';
        ?>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4">
                    <h1><b>Registruj se</b></h1>
                    <form method="post" action="registracija_korisnika.php">
                        <div class="form-group">
                            <input type="text" class="form-control" name="ime" placeholder="Ime" required="true">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required="true"
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password"
                                placeholder="Šifra(min. 6 karaktera)" required="true" pattern=".{6,}">
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" name="kontakt_telefon" placeholder="Kontakt telefon"
                                required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="grad" placeholder="Grad" required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="adresa" placeholder="Adresa" required="true">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Registruj se">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
            require 'footer.php';
        ?>

    </div>
</body>

</html>