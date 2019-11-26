<?php
    session_start();
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
        <div id="bannerImage">
            <div class="container">

                <div id="bannerContent center">
                    <h1>Dobrodošli u Mini IT Shop</h1>
                    <p>Prodaja premium brend proizvoda po sniženim cenama</p>
                    <a href="proizvodi.php" class="btn btn-danger">Pregled</a>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-4">
                    <div class="thumbnail center">

                        <img src="img/mon.jpg" alt="Slika">


                        <div class="caption">
                            <p id="autoResize">Monitori</p>
                            <p>Izaberite neke od premium modela</p>
                        </div>

                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="thumbnail center">

                        <img src="img/kom.jpg" alt="Slika">


                        <div class="caption">
                            <p id="autoResize">Komponente</p>
                            <p>Kompjuterske komponente poznatih brendova</p>
                        </div>

                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="thumbnail center">

                        <img src="img/ulaz.jpg" alt="Slika">


                        <div class="caption">
                            <p id="autoResize">Ulazni uređaji</p>
                            <p>Gaming ulazni uređaji vrhunskih karakteristika</p>
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