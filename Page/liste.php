<?php 
require_once 'connexion.php';
// SUPPRESSION
if (isset($_GET['ids'])) {
    $db->query('delete from inscription where idi=' . $_GET['ids']);
    header('Location: liste.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des informations</title>
    <link rel="stylesheet" href="../css/Accueil.css">
    <link rel="stylesheet" href="../css/liste.css">
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
    <a class="retour" href="Accueil.php"><i class='bx bx-arrow-back'></i></a>

    <center> <h3>Liste des apprenants</h3></center>
   <table>
   <tr>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Age</th>
            <th>Téléphone</th>
            <th>Année certification</th>
            <th>Photo</th>
            <th>Action</th>
            <th>Détails</th>
        </tr>
        <tr>
        <?php
        $req = $db->query('SELECT * FROM inscription');
        $uploadDir = '../img/';
        while ($ligne = $req->fetch()) {
            echo '<tr>';
            echo '<td>' . $ligne['matricule'] . '</td>';
            echo '<td>' . $ligne['nom'] . '</td>';
            echo '<td>' . $ligne['prenom'] . '</td>';
            echo '<td>' . $ligne['age'] . '</td>';
            echo '<td>' . $ligne['numero'] . '</td>';
            echo '<td>' . $ligne['certification'] . '</td>';
            echo '<td class="image-column"><img src="../img/' .$ligne['image'] . '" alt="Image de profil"></td>';
            echo '<td>
            <a class="edite-link" href="Inscription.php? idm=' . $ligne['idi'] . '"><i class="bx bxs-edit-alt"></i></i></a>
            <a class="delete-link" href="liste.php? ids=' . $ligne['idi'] . '"><i class="bx bx-trash"></i></a>
            </td>';
            echo '<td><a class="detail-link" href="Details.php? idd=' . $ligne['idi'] . '"><i class="bx bx-book"></i></a></td>';
            echo '</tr>';
        }
        ?>  
        <div class="btn"> 
        <a href="Inscription.php">+ Ajouter un nouveau</a>
        </div>
                
   </table>
   
</body>
</html>

        
   