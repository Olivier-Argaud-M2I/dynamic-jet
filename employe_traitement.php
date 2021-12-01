<?php 

try {     
    $bdd = new PDO('mysql:host=localhost; dbname=dynamic_jet', 'root', 'root'); //root password pour bdd sur mac
        
    } catch(Exception $e){
        die($e->getMessage());
    }      

        if (isset ($_POST['creer_employe'])){

            if(!empty ($_POST['nom_emp']) && !empty ($_POST['num_secu']) && !empty ($_POST['date_emb']) && !empty ($_POST['visite_med']) && !empty ($_POST['statut']) && !empty ($_POST['num_permis']) && !empty ($_POST['activ']) && !empty ($_POST['bees'])){


                if (preg_match("#^[12][0-9]{2}[0-1][0-9](2[AB]|[0-9]{2})[0-9]{3}[0-9]{3}[0-9]{2}$#",$_POST['num_secu'])){
                $nom_emp = $_POST['nom_emp'];  
                $num_secu = $_POST['num_secu'];
                $date_emb = $_POST['date_emb'];
                $visite_med = $_POST['visite_med'];     
                $statut = $_POST['statut'];
                $num_permis = $_POST['num_permis'];
                $activ = $_POST['activ']; 
                $bees = $_POST['bees'];   
            
                
                $sql = 'INSERT INTO employe(nom_emp,num_secu, date_emb, visite_med, statut, num_permis, activ, bees) VALUES (?,?,?,?,?,?,?,?)';
                $requete = $bdd->prepare($sql);
                $requete -> execute(array($nom_emp, $num_secu, $date_emb, $visite_med, $statut, $num_permis, $activ, $bees));

                header('Location: employe.php');
                
                }
                else{
                    echo "<script>";
                        echo "if(!alert('Le numéro de sécurité sociale est incorrect. ')){
                                    window.location = 'employe_form.php';
                                }";
                        echo "</script>";
                }

                
            }
    }

    if (isset ($_POST['modifier_employe'])){

        if(!empty ($_POST['nom_emp']) && !empty ($_POST['num_secu']) && !empty ($_POST['date_emb']) && !empty ($_POST['visite_med']) && !empty ($_POST['statut']) && !empty ($_POST['num_permis']) && !empty ($_POST['activ']) && !empty ($_POST['bees'])){

            
            $nom_emp = $_POST['nom_emp'];      
            $num_secu = $_POST['num_secu'];
            $date_emb = $_POST['date_emb'];
            $visite_med = $_POST['visite_med'];     
            $statut = $_POST['statut'];
            $num_permis = $_POST['num_permis'];
            $activ = $_POST['activ']; 
            $bees = $_POST['bees'];

            $sql = "UPDATE employe set nom_emp=?, date_emb=?, visite_med=?, statut=?, num_permis=?, activ=?, bees=? WHERE num_secu=$num_secu";
            $requete= $bdd->prepare($sql);
            $requete->execute(array($nom_emp,$date_emb,$visite_med,$statut,$num_permis,$activ,$bees));

            header('Location: employe.php');
        }
    }   
    
    if (isset ($_GET['supprimer_employe'])){

        $num_secu = $_GET['supprimer_employe'];

        $sql = "DELETE FROM employe WHERE num_secu=$num_secu";
        $bdd->query($sql);
    }

    $requete = 'SELECT * FROM employe';
    $table_employe =$bdd->query($requete);

  
?>      