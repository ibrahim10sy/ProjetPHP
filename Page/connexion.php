<?php 
   
    try {
        $db = new PDO("mysql:host=localhost;dbname=kalansodb", "root", "");
        // echo "connexion établie";
    } catch (Exception $e) {
       
        die($e->getMessage());
    }

    function genMatricule(){
        $letters = "ABCDEFGHIJKLMNOPQRSTXYZ";
        $num = '123456789';
        $mat = 'ODK';
    
        for ($i=0; $i <2 ; $i++) { 
            $mat .= $letters[rand(0, strlen($letters) - 1)];
        }
        for ($i=0; $i <2 ; $i++) { 
            $mat .= $num[rand(0, strlen($num) - 1)];
        }
    
        return $mat;
    }
    
    if(isset($_POST['creerCompte'])){
        $uploadDir = '../img/';
        if(isset($_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['date'],$_POST['email'],$_POST['numero'],$_POST['idp'],$_POST['certification'],$_FILES['image'])){
            $fileName = $_FILES['image']['name'];
            $filePath = $uploadDir . $fileName;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)){
                $mat = genMatricule();
                $req = $db->prepare('insert into inscription(matricule,nom,prenom,age,date,email,numero,idp,certification,image) values(?,?,?,?,?,?,?,?,?,?)');
                    $req -> bindValue (1, $mat);
                    $req -> bindValue (2, $_POST['nom']);    
                    $req -> bindValue (3,$_POST['prenom']);    
                    $req -> bindValue (4,$_POST['age']);    
                    $req -> bindValue (5,$_POST['date']);    
                    $req -> bindValue (6,$_POST['email']);    
                    $req -> bindValue (7,$_POST['numero']);    
                    $req -> bindValue (8 ,$_POST['idp']);    
                    $req -> bindValue (9 ,$_POST['certification']);    
                    $req->bindValue(10, $fileName);  
                    $req -> execute();
                    if ($lignes = $req->fetch()) {
                        echo "<script> alert('inscription echoue') </script>";
                    } else{
                        echo "<script> alert('inscription reeussi') </script>";
                    }
            }
            
            }
        }
    
    ?>
    

