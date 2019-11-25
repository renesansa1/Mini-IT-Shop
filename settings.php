<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
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
        <br>
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4">
                    <h1>Promeni Šifru</h1>
                    <form method="post" action="setting_script.php">
                        <div class="form-group">
                            <input type="password" class="form-control" name="stara_sifra" placeholder="Stara Šifra">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="nova_sifra" placeholder="Nova Šifra">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="retype" placeholder="Ponovite novu Šifru">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Promeni">
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