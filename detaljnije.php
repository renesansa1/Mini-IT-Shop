<?php
    session_start();
    require "connection.php";
    require 'check_if_added.php';
?>
<!DOCTYPE html>
<html lang="en">

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
        <div class="container">
            <?php

            while ($fetch = $query->fetch_array()) {
                $id_p = $_GET['proid'];
                if ($fetch["id"] == $id_p) {
                    ?>
            <div class="col-md-6 col-sm-8">
                <div class="thumbnail">
                    <img src="img/kom<?php echo $fetch["id"] ?>.jpg">
                    </a>
                    <div class="caption center">
                        <h3><?php echo $fetch["ime_proizvoda"]; ?></h3>
                    </div>
                </div>
            </div>

            <div style="float:right" class="col-md-4 col-sm-8">
                <div class="thumbnail">
                    <?php echo $fetch['opis'] ?>
                </div>
            </div>
            <div style="float:right; margin-top:40px;" class="col-md-4 col-sm-8">
                <div class="caption center">
                    <p>Cena: <?php echo number_format($fetch['cena']) ?></p>
                    <?php if (!isset($_SESSION['email'])) {  ?>
                    <p><a href="login.php" role="button" class="btn btn-primary btn-block">Kupite</a></p>
                    <?php
                                        } else {
                                            if (check_if_added_to_korpa($fetch["id"])) {
                                                echo '<a href="#" class=btn btn-block btn-success disabled>Ubačeno u korpu</a>';
                                            } else {
                                                ?>
                    <a href="korpa_add.php?id=<?php echo $fetch["id"] ?>" class="btn btn-block btn-primary" name="add"
                        value="add" class="btn btn-block btr-primary">Ubaci u korpu</a>
                    <?php
                                        }
                                    }
                                    ?>
                    <?php
                            }
                            ?>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <?php
                require 'footer.php';
            ?>
        </div>
</body>

</html>