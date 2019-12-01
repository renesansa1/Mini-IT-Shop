<?php
session_start();
require 'connection.php';
if(!isset($_SESSION['email']) || $_SESSION['tip'] != 1){
    header('location:login.php');
}

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
    <link rel="stylesheet" href="css/style2.css" type="text/css">
</head>

<body>
    <?php
            require 'header.php';
        ?>
    <div class="pozadina">


        <?php
    echo "<h1>Svi proizvodi</h1>";
    echo "<table>";
    echo "<tr>";
        echo "<th>Tip</th>";
        echo "<th>Naziv proizvoda</th>";
        echo "<th>Cena</th>";
        echo "<th>Opis</th>";
        echo "<th></th>";
        echo "<th></th>";
        echo "</tr>";
    foreach($query as $red){
        echo "<tr>";
        echo "<td>$red[tip_proizvoda]</td>";
        echo "<td>$red[ime_proizvoda]</td>";
        echo "<td>".number_format($red['cena'])."</td>";
        echo "<td>$red[opis]</td>";
        echo "<td><button class='izmeni btn btn-primary' data-id='".$red['id']."'>IZMENI</button></td>";
        echo "<td><button class='delete btn btn-danger' data-id='".$red['id']."'>OBRISI</button></td>";
        echo "</tr>";
      
    }
    echo "</table>";
    ?>
        <div class="insert">
            <h1>Unesi proizvod</h1>
            <div class="forma">
                <form action="dodaj.php" method="POST" enctype="multipart/form-data">
                    <input name="id" type="hidden">
                    <label for="tip_proizvoda">Tip:</label>
                    <input name="tip_proizvoda" type="text" required><br>
                    <label for="ime_proizvoda">Naziv proizvoda:</label>
                    <input name="ime_proizvoda" required type="text"><br>
                    <label for="cena">Cena:</label>
                    <input name="cena" required type="number"><br>
                    <label for="opis">Opis:</label>
                    <input name="opis" required type="text"><br><br>
                    <label for="slika">Slika:</label>
                    <input name="slika" type="file"><br>
                    <input type="submit" value="Sacuvaj" class="submit btn btn-success" name="dodaj_proizvod"></input>
                </form>
                <button id="reset" class="btn btn-primary">RESET</button>
            </div>
        </div>
        <script>
        let obrisi = document.querySelectorAll(".delete");
        for (let btn of obrisi) {
            btn.onclick = function() {
                let id = this.getAttribute('data-id');
                let opcije = {
                    method: "POST",
                    body: JSON.stringify({
                        id: id,
                        method: 'DELETE'
                    })
                }
                fetch('brisanje.php', opcije)
                    .then(resp => resp.text())
                    .then(txt => {
                        this.parentElement.parentElement.remove();
                        alert(txt)
                    });
            }
        }
        document.querySelector('#reset').onclick = function() {
            document.querySelector("input[type='submit']").name = "dodaj_proizvod";
            document.querySelector("input[name='id']").value = "";
            document.querySelector("input[name='tip_proizvoda']").value = "";
            document.querySelector("input[name='ime_proizvoda']").value = "";
            document.querySelector("input[name='cena']").value = "";
            document.querySelector("input[name='opis']").value = "";
            document.querySelector('.insert h1').innerHTML = "Unesi proizvod";
        }

        let izmeni = document.querySelectorAll(".izmeni");
        for (let btn of izmeni) {
            btn.onclick = function() {
                let id = this.getAttribute('data-id');
                fetch("izmena.php?daj_1=" + id)
                    .then(resp => resp.text())
                    .then(json => {
                        console.log(json);
                        document.querySelector("form[method='POST']").action = 'izmena.php';
                        document.querySelector("input[name='id']").value = id;
                        document.querySelector("input[name='tip_proizvoda']").value = json.tip_proizvoda;
                        document.querySelector("input[name='ime_proizvoda']").value = json.ime_proizvoda;
                        document.querySelector("input[name='cena']").value = json.cena;
                        document.querySelector("input[name='opis']").value = json.opis;
                        //document.querySelector("input[name='slika']").value = json.slika;
                        document.querySelector("input[type='submit']").name = "izmeni_proizvod";
                        document.querySelector(".insert h1").innerHTML = "Izmeni proizvod " + id;
                        
                    });
            }
        }
        </script>
        <br><br><br><br><br><br><br>
        <?php
            require 'footer.php';
        ?>
    </div>
</body>

</html>