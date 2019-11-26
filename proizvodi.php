<?php
    session_start();
    require "connection.php";
    require 'check_if_added.php';
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
        <div class="container">
            <div class="jumbotron">
                <h1>Dobrodošli u Mini IT Shop Store!</h1>
                <p>Prodaja premium brend proizvoda po sniženim cenama.</p>
            </div>
        </div>
        <div class="container">
            <?php
            //kolone
            $broj_kolona = 4;
            $broj_redova = 0;
            $bootstrapColWidth = 12 / $broj_kolona;
            ?>
            <div class="row">
                <?php
                while ($fetch = $query->fetch_array()) {
                    ?>
                <div class="col-md-<?php echo $bootstrapColWidth; ?> trans">
                    <div class="thumbnail">
                        <a href="detaljnije.php?proid=<?php echo $fetch["id"]; ?>">
                            <img src="img/kom<?php echo $fetch["id"] ?>.jpg">
                        </a>
                        <div class="caption center">
                            <h3><?php echo $fetch['ime_proizvoda'] ?></h3>
                            <p>Cena: <?php echo number_format($fetch['cena']) ?></p>
                            <?php if (!isset($_SESSION['email'])) {  ?>
                            <p><a href="login.php" role="button" class="btn btn-primary btn-block">Kupite</a></p>
                            <?php
                                        } else {
                                            if (check_if_added_to_korpa($fetch["id"])) {
                                                echo '<a href="#" class=btn btn-block btn-success disabled>Ubačeno u korpu</a>';
                                            } else {
                                                ?>
                            <a href="korpa_add.php?id=<?php echo $fetch["id"] ?>" class="btn btn-block btn-primary"
                                name="add" value="add" class="btn btn-block btr-primary">Ubaci u korpu</a>
                            <?php
                                        }
                                    }
                                    ?>
                        </div>
                    </div>
                </div>
                <?php
                    $broj_redova++;
                    if ($broj_redova % $broj_kolona == 0) echo '</div><div class="row">';
                }
                ?>
            </div>
        </div>
        <br><br><br><br><br><br><br><br>
        <?php
            require 'footer.php';
        ?>
    </div>
</body>

</html>