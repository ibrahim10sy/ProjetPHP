<?php 
require_once 'connexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/Accueil.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.10/typed.js" integrity="sha512-tQQXRDB2wEmuJGtFrmmoFYzNTq8StA1XJrfO0OQbbTxd9G0CwaTDL6/C1y805IlvBVrMwOqob1kf6r/2U5XXVg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
    <!-- le header -->
    <header>
        <!-- logo -->
        <div class="logo">
            <img src="../img/Orange_master_logo.svg" alt="">
            <p>Orange <br> Digital Kalanso</p>
        </div>
        <!-- navbar -->
        <nav>
            <ul> 
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Formation</a></li>
            </ul>
        </nav>
        <div class="icon">
            <i class='bx bx-search'></i>
           <a href="../Page/login.php"><i class='bx bxs-user'></i></a> 
        </div>
    </header>
    <!-- Partie accueil -->
    <h1 class="title"></h1> 
    <div class="acceuil">
        
        <img src="../img/10088.jpg" alt=""  >
    </div>
    <div class="btn1">
    <div class="btn">
    <a href="../Page/Inscription.php">+ Ajouter un apprenant</a>
    </div>
    <div class="btn">
    <a href="../Page/liste.php">Voir la liste</a>
    </div>
    <div class="btn">
    <a href="#" id="btn" onclick="document.getElementById('promo').style.display='block'; " onclick="document.getElementById('promo').style.display='none';">+ Ajouter une promotion</a>
    </div>
    </div>
    <div class="position">
        <div id="promo"  class="promo"  style="display: none;">
            <form action="accueil.php" method="POST">
                <div>
                    <label for="">Nom Promotion</label>
                    <input type="text" name="nomp">
                </div>
                <div>
                    <label for="">Année Promotion</label>
                    <input type="text" name="annee">
                </div>
                <div >
                    <input class="btn" type="submit" value="Créer une promotion" name="envoie">
                </div>
            </form>
        </div>
        </div>
    <!-- partie formation -->
    <div class="formation">
        <h1>Nos <span>formations</span> </h1>
        <div class="form">
            <div class="image">
                <img src="../img/Les-meilleures-formations-developpeur-web-en-ligne-1080x675.png" alt="" width="100%">
                <p>Formation en dévéloppement web Front-End</p>    
                <div class="btn">
                    <a href="#">Postuler maintenat</a>
                </div>
            </div>
            <div class="image">
                <img src="../img/web-development-1200x682.jpg" alt="" width="100%">
                <p>Formation en dévéloppement web Front-End</p> 
                <div class="btn">
                    <a href="#">Postuler maintenat</a>
                </div>   
            </div>
        </div>
    </div>
    <hr>
    <footer>
        Copyright &copy; <script>document.write(new Date().getFullYear())</script> Orange Digital Kakanso.Tous droit reservée
    </footer>
    <script src="../JS/app.js"></script>
</body>
</html>