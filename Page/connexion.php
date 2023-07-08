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
    //Enregistrement
    if(isset($_POST['creerCompte'])){
        $uploadDir = '../img/';
        if(isset($_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['date'],$_POST['email'],$_POST['numero'],$_POST['idp'],$_POST['certification'],$_FILES['image'])){
            $fileName = $_FILES['image']['name'];
            $filePath = $uploadDir . $fileName;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)){
                $mat = genMatricule();
                $req = $db->prepare('INSERT INTO inscription(matricule,nom,prenom,age,date,email,numero,idp,certification,image) VALUES(?,?,?,?,?,?,?,?,?,?)');
                $req->bindValue(1, $mat);
                $req->bindValue(2, $_POST['nom']);    
                $req->bindValue(3, $_POST['prenom']);    
                $req->bindValue(4, $_POST['age']);    
                $req->bindValue(5, $_POST['date']);    
                $req->bindValue(6, $_POST['email']);    
                $req->bindValue(7, $_POST['numero']);    
                $req->bindValue(8, $_POST['idp']);    
                $req->bindValue(9, $_POST['certification']);    
                $req->bindValue(10, basename($fileName));  
               
                $req->execute();
    
                if ($lignes = $req->fetch()) {
                    echo "<script> alert('Inscription échouée') </script>";
                } else {
                    echo "<script> alert('Inscription réussie') </script>";
                    echo "<script>window.open('liste.php','_self')</script>";
                }
            }
        }
    }
    
        //Editer
        if(isset($_GET['idm'])){
            $req = $db->query('select * from inscription where idi='.$_GET['idm']);
            if($lignes = $req->fetch()){
                $_POST['nom'] = $lignes['nom'];
                $_POST['prenom'] = $lignes['prenom'];
                $_POST['age'] = $lignes['age'];
                $_POST['date'] = $lignes['date'];
                $_POST['email'] = $lignes['email'];
                $_POST['numero'] = $lignes['numero'];
                $_POST['idp'] = $lignes['idp'];
                $_POST['certification'] = $lignes['certification'];
                $_POST['image'] = $lignes['image'];
                
            }
        }
        //Modification
        if(isset($_POST['modifier'])){
            $uploadDir = '../img/';
            if(isset($_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['date'],$_POST['email'],$_POST['numero'],$_POST['idp'],$_POST['certification'],$_FILES['image'])){
                $fileName = $_FILES['image']['name'];
                $filePath = $uploadDir . $fileName;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)){
                    $mat = genMatricule();
                    $req = $db->prepare('UPDATE inscription SET nom=?,prenom=?,age=?,date=?,email=?,numero=?,idp=?,certification=?,image=? WHERE idi=?');
                    $req->bindValue(1, $mat);
                    $req->bindValue(2, $_POST['nom']);    
                    $req->bindValue(3, $_POST['prenom']);    
                    $req->bindValue(4, $_POST['age']);    
                    $req->bindValue(5, $_POST['date']);    
                    $req->bindValue(6, $_POST['email']);    
                    $req->bindValue(7, $_POST['numero']);    
                    $req->bindValue(8, $_POST['idp']);    
                    $req->bindValue(9, $_POST['certification']);    
                    $req->bindValue(10, $filePath);  
                    $req->bindValue(11, $_POST['idi']);  
                    $req->execute();
        
                    if ($lignes = $req->fetch()) {
                        echo "<script> alert('Modification non effectuée') </script>";
                    } else {
                        echo "<script> alert('Modifié avec succès') </script>";
                        echo "<script>window.open('liste.php','_self')</script>";
                    }
                }
            }
        }
        

        //Ajout du promotion
        if(isset($_POST['envoie'])){
            if(!empty('nomp') && !empty('annee')){
                echo "<script> alert('Remplissez tous les champs ') </script>";
            }else{
            if(isset($_POST['nomp'],$_POST['annee'])){

                $req = $db->prepare("insert into promotion(nomp,annee) values(?,?)");
                $req->bindValue(1,$_POST['nomp']);
                $req->bindValue(2,$_POST['annee']);
                $req->execute();
                if ($lignes = $req->fetch()) {
                    echo "<script> alert('Impossible d'ajouter') </script>";
                } else{
                    echo "<script> alert('Promotion ajouter avec succèss') </script>";
                    echo "<script>window.open('Accueil.php','_self')</script>";
                }
            }
        }
        }
       