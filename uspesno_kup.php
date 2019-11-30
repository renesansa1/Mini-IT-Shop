<?php
    session_start();
    require 'connection.php';
    if (!isset($_SESSION['email'])) {
        header('location:index.php');
    } else {
        $user_id = $_GET['id'];
        $kupljeno_query = "update korisnicka_korpa set status='Kupljeno' where user_id=$user_id";
        $kupljeno = $con->query($kupljeno_query) or die($con->error);
    }
    //unset($_SESSION['id']);
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
                <div class="col-xs-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <p>Vaša narudžbina je primljena. Hvala što kupujete kod nas. <a
                                    href="proizvodi.php">Klikni</a> ako želiš još neki proizvod.</p>
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