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
    <link rel="stylesheet" href="../css/inscription.css">
    <link rel="stylesheet" href="../css/acceuil.css">
</head>
<body>
<header>
        <!-- logo -->
        <div class="logo">
            <img src="../img/Orange_master_logo.svg" alt="">
            <p>Orange <br> Digital Kalanso</p>
        </div>
        
    </header>
    <div class="container">
<form action="inscription.php" method="POST" enctype="multipart/form-data">
    <div>
        <label for="">Nom</label>
        <input type="text" placeholder="nom" name="nom" value="">
    </div>
    <div>
        <label for="">Prénom</label>
        <input type="text" placeholder="password" name="prenom" value="">
    </div>
    <div>
        <label for="">Age</label>
        <input type="number" placeholder="âge" name="age" value="">
    </div>
    <form action="">
    <div>
        <label for="">Date de Naissance</label>
        <input type="date" placeholder="date" name="date">
    </div>
    <div>
        <label for="">Email</label>
        <input type="text" placeholder="Email" name="email" value="">
    </div>
    <div>
        <label for="">Numéro</label>
        <input type="number" placeholder="Numéro" name="numero" value="">
    </div>
    <div>
        <label for="">Promotion</label>
        <select name="idp" id="">
            <option value=""></option>
            <?php 
                $req = $db -> query('select * from promotion');
                while($ligne = $req -> fetch()){
                    if(isset($_POST['idp']) && $ligne['idp']==$_POST['idp']){
                        echo '<option value="'.$ligne['idp'].'" selected>'.$ligne['nomp'].'</ option>';
                    } else{
                        echo '<option value="'.$ligne['idp'].'">'.$ligne['nomp'].'</option>';
                    }
                }
            ?>
        </select>
    </div>
    <div>
        <label for="">Année certification</label>
        <input type="date" placeholder="Numéro" name="certification" value="">
    </div>
    <div>
        <label for="">Photo</label>
        <input type="file" name="image" class="photo" placeholder="Télécharger une image">
    </div>

   <div >
    <input class="btn" type="submit" value="Créer un compte" name="creerCompte">
   </div>
   </form>
   </div>
</body>
</html>