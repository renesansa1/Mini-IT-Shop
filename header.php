<nav class="navbar navbar-inverse navabar-fixed-top">
               <div class="container">
                   <div class="navbar-header">
                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                       </button>
                       <a href="index.php" class="navbar-brand">Mini IT Shop Store</a>
                   </div>
                   
                   <div class="collapse navbar-collapse" id="myNavbar">
                       <ul class="nav navbar-nav navbar-right">
                           <?php
                           if(isset($_SESSION['email'])){
                           ?>
                           <li><a href="korpa.php"><span class="glyphicon glyphicon-shopping-cart"></span> Korpa</a></li>
                           <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Podešavanja</a></li>
                           <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Izloguj se</a></li>
                           <?php
                           }else{
                            ?>
                            <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Registruj se</a></li>
                           <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Uloguj se</a></li>
                           <?php
                           }
                           ?>
                           
                       </ul>
                   </div>
               </div>
</nav>