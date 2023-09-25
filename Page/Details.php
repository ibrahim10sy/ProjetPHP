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
    <link rel="stylesheet" href="../css/Details.css">
    <!-- <link rel="stylesheet" href="../css/Accueil.css"> -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <header>
        <!-- logo -->
        <div class="logo">
            <img src="../img/Orange_master_logo.svg" alt="">
            <p>Orange <br> Digital Kalanso</p>
        </div>

    </header>
    <a href="liste.php"><i class='bx bx-arrow-back'></i></a>
    <h3>Details de l'apprenant</h3>

    <?php
    if (isset($_GET['idd'])) {
        $idd = $_GET['idd'];
        $query = $db->prepare('SELECT * FROM inscription WHERE idi = :idd');
        $query->bindParam(':idd', $idd);
        $query->execute();

        while ($ligne = $query->fetch()) {
            echo '<div class="container-d">';
            echo '<div class="image-column"><img src="../img/' . $ligne['image'] . '" alt="Image de profil"></div>';
            echo '<hr>';
            echo '<p>Matricule: ' . $ligne['matricule'] . '</p>';
            echo '<p>Nom: ' . $ligne['nom'] . '</p>';
            echo '<p>Prenom: ' . $ligne['prenom'] . '</p>';
            echo '<p>Age: ' . $ligne['age'] . '</p>';
            echo '<p>Date de naissance: ' . $ligne['date'] . '</p>';
            echo '<p>Email: ' . $ligne['email'] . '</p>';
            echo '<p>Téléphone: ' . $ligne['numero'] . '</p>';
            echo '<p>Promotion: ' . $ligne['idp'] . '</p>';
            echo '<p>Année certification: ' . $ligne['certification'] . '</p>';
            echo '</div>';
        }
    }
    ?>
    <button id="btn" onclick=imprimerPage(); >Imprimer</button>

<script>
    function imprimerPage(){
        document.getElementById("btn").style.display='none';
        window.print()
        document.getElementById("btn").style.display='block';
    }
</script>
</body>

</html>