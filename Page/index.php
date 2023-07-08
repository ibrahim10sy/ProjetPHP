<?php
require_once 'connexion.php';
session_start();

if (isset($_POST['seconnecter'])) {
    if (isset($_POST['email'], $_POST['mdp'])) { // Correction de $_POST['email '] à $_POST['email']
        $req = $db->query('SELECT * FROM login WHERE email="' .
            $_POST['email'] . '" AND mdp="' . $_POST['mdp'] . '"');
        if ($ligne = $req->fetch()) {
            $_SESSION['email'] = $ligne['email'];
            echo "<script>alert('Connexion réussie')</script>";
            echo "<script>window.open('Accueil.php','_self')</script>";
        } else {
            echo "<script>alert('Email ou Mot de Passe Incorrect')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
    <!-- <link rel="stylesheet" href="../css/Accueil.css"> -->
</head>
<body>
<header>
    <!-- logo -->
    <div class="logo">
        <img src="../img/orange_master_logo.svg" alt="">
        <p>Orange <br> Digital Kalanso</p>
    </div>
</header>
<!-- <img src="/img/6-scaled.webp" alt=""> -->
<div class="right">
    <h1>Bienvenue sur <br> Orange Digital <br> Kalanso </h1>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis repellendus? Iste quaerat modi error eius temporibus in nihil corrupti est</p>
    <form action="index.php" method="POST">
        <div>
            <label for="Email">Email</label>
            <input type="text" placeholder="email" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" placeholder="password" name="mdp">
        </div>
        <div>
            <input class="btn" type="submit" value="Se connecter" name="seconnecter">
        </div>
    </form>
</div>

</body>
</html>
