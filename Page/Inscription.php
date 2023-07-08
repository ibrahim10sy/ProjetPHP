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
    <link rel="stylesheet" href="../css/Inscription.css">
    <link rel="stylesheet" href="../css/Accueil.css">
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
        <h3>Bienvenue sur la page d'inscription</h3>
        <form action="inscription.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="">Nom</label>
                <input type="text" placeholder="nom" name="nom" value="<?php if (isset($_POST['nom'])) echo $_POST['nom'] ?>">
            </div>
            <div>
                <label for="">Prénom</label>
                <input type="text" placeholder="password" name="prenom" value="<?php if (isset($_POST['prenom'])) echo $_POST['prenom'] ?>">
            </div>
            <div>
                <label for="">Age</label>
                <input type="number" placeholder="âge" name="age" value="<?php if (isset($_POST['age'])) echo $_POST['age'] ?>">
            </div>
            <form action="">
                <div>
                    <label for="">Date de Naissance</label>
                    <input type="date" placeholder="date" name="date" value="<?php if (isset($_POST['date'])) echo $_POST['date'] ?>">
                </div>
                <div>
                    <label for="">Email</label>
                    <input type="text" placeholder="Email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>">
                </div>
                <div>
                    <label for="">Numéro</label>
                    <input type="text" placeholder="Numéro" name="numero" value="<?php if (isset($_POST['numero'])) echo $_POST['numero'] ?>">
                </div>
                <div>
                    <label for="">Promotion</label>
                    <select name="idp" id="" value="<?php if (isset($_POST['idp'])) echo $_POST['idp'] ?>">
                        <option value=""></option>
                        <?php
                        $req = $db->query('select * from promotion');
                        while ($ligne = $req->fetch()) {
                            if (isset($_POST['idp']) && $ligne['idp'] == $_POST['idp']) {
                                echo '<option value="' . $ligne['idp'] . '" selected>' . $ligne['nomp'] . '</ option>';
                            } else {
                                echo '<option value="' . $ligne['idp'] . '">' . $ligne['nomp'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="">Année certification</label>
                    <input type="text" name="certification" value="<?php if (isset($_POST['certification'])) echo $_POST['certification'] ?>">
                </div>
                <div>
                    <label for="">Photo</label>
                    <input type="file" name="image" class="photo" placeholder="Télécharger une image" value="<?php if (isset($_POST['image'])) echo $_POST['image'] ?>">
                </div>

                <?php if (isset($_GET['idm'])) { ?>
                    <div>
                        <input type="hidden" name="idi" value="<?php if (isset($_POST['idi'])) echo $_POST['idi'] ?>">
                        <input type="submit" name="modifier" value="Modifier">
                    </div>
                <?php } else { ?>
                    <div>
                        <input class="btn" type="submit" value="Créer un compte" name="creerCompte">
                    </div>
                <?php } ?>

            </form>
    </div>
</body>

</html>