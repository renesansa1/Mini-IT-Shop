<?php
    session_start();
    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="img/ikon.png" />
    <title>Projectworlds Store</title>
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
                <div class="col-xs-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <p>Izlogovali ste se. <a href="login.php">Uloguj se ponovo.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            require 'footer.php';
        ?>
    </div>
</body>

</html>