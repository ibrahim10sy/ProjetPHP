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
    <link rel="stylesheet" href="../css/login.css">
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
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendisrepellendus? Iste quaerat modi error eius temporibus in nihil corrupti est</p>
   <form action="">
    <div>
        <label for="Email">Email</label>
        <input type="text" placeholder="email">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" placeholder="password">
    </div>
   <div >
    <input class="btn" type="submit" value="Se connecter" name="seconnecter">
   </div>
   </form>
          
</div>
</body>
</html>