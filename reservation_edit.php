<?php

try {
    $bdd = new PDO('mysql:host=localhost; dbname=dynamic_jet', 'root', 'root'); //root password pour bdd sur mac
    
} catch (Exception $e) {
    die($e->getMessage());}


    if (isset ($_GET['id'])){

        $id_client = $_GET['id'];

        $requete = "SELECT * FROM client WHERE num_unique=$id_client";
        $table_client =$bdd->query($requete);
        
        while($data = $table_client->fetch()){

            
        
    
?>
<!DOCTYPE html>

<html lang="fr">

  <head>

    <meta charset="utf-8">
    <title>Dynamic Jet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  </head>

  <body>
  <header>
        <div>
        <h1>Dynamic Jet</h1>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
    
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="reservation.php">Réservations</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="equipement.php">Equipements</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="client.php">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="employe.php">Employés</a>
                </li>
              </ul>
            </div>
          </nav>
    </header>
    <main>
    <div class="container" style="margin-top:5%">
        <h4 class="text-center">Modifier reservation</h4><hr/>
        <form method="POST" action="reservation_traitement.php">

            <div class="form-group div-form">
                <label for="num_resa">Numéro de réservation</label><br/>
                <input type="text" name="num_resa" value="<?= $data['num_resa'] ?>" readonly >
            </div>

            <div class="form-group div-form">
                <label for="date_debut">Date de début</label><br/>
                <input type="date" name="date_debut" value="<?= $data['date_debut'] ?>" min="" >
            </div>
            <div class="form-group div-form">
                <label for="heure_debut">Heure de début</label><br/>
                <input type="time" name="heure_debut" value="<?= $data['heure_debut'] ?>" min="" >
            </div>
            <div class="form-group div-form">
                <label for="date_fin">Date de fin</label><br/>
                <input type="date" name="date_fin" value="<?= $data['date_fin'] ?>" min="" >
            </div>
            <div class="form-group div-form">
                <label for="heure_fin">Heure de fin</label><br/>
                <input type="time" name="heure_fin" value="<?= $data['heure_fin'] ?>" min="" >
            </div>
           
            <div class="form-group div-form">
                <p>Moniteur</p>
                <input type="radio" name="nbr_moniteurs" onchange="showDiv()" value='oui' checked>
                <label for="oui">oui</label>
                <input type="radio" name="nbr_moniteurs" onchange="hideDiv()" value='non' >
                <label for="non">non</label>
            </div>

            <div class="form-group div-form">
                <label for="num_secu">Nom moniteur</label>
                <select name="num_secu" class="form-control" required="">
                <option selected value = "<?= $data['nom_employe'] ?>" ><?= get_nomemploye($data['nom_employe']) ?></option>
                    <?php

                        while($data_emp = $table_employe->fetch()){

                            if($data['nom_employe'] != $data_emp['num_secu']){

                            echo "<option value=".$data_emp['num_secu'].">".$data_emp['nom_emp']."</option>";
                            }
                        }

                    ?>
                    </select>
                    </div>

           
        <div class="form-group div-form">
        
            <label for="en_activite">Activité</label>
            <select name="activite">
                <option value="scooter">Scooter</option>
                <option value="ski">Ski nautique</option>
                <option value="wakeboard">Wakeboard</option>
                <option value="bouee">Bouée</option>
                <option value="bateau">Bateau</option>
          </select>
          
        </div>
        <div class="form-group div-form">
                <label for="id_equip">Equipement</label>
                <select name="id_equip" class="form-control" required="">
                <option selected value = "<?= $data['id_equip'] ?>"><?= get_nomequipement($data['id_equip']) ?></option>
                    <?php

                        while($data_equip = $table_equipement->fetch()){

                            if($data['id_equip'] != $data_equip['id_equip']){

                            echo "<option value=".$data_equip['id_equip'].">".$data_equip['nom_equip']."</option>";
                        }
                    }
                    ?>
                    </select>
                    </div>

            <div class="form-group div-form">
                <label for="cout_global">Cout global</label>
                <input type="text" class="form-control" name="cout_global" value="<?= $data['cout_global'] ?>" required="">
            </div>
            <div class="form-group div-form">
                <label for="cout_unitaire">Cout unitaire</label>
                <input type="text" class="form-control" name="cout_unitaire" value="<?= $data['cout_unitaire'] ?>" required="">
            </div>

            <div class="form-group div-form">
                <label for="id_client">Client</label>
                <select name="id_client" class="form-control" required="">
                <option selected value = "<?= $data['id_client'] ?>"><?= get_nomclient($data['id_client']) ?></option>
                    <?php

                        while($data_cli = $table_client->fetch()){ 

                            if($data['id_client'] != $data_cli['num_unique']){

                            echo "<option value=".$data_cli['num_unique'].">".$data_cli['nom_client']."</option>";
                        }
                    }
                    ?>

                </select>
            </div>



            

            <button type="submit" class="btn btn-secondary submit" name="modifier_reservation">Modifier réservation</button>
        </form>
    </div>
    <script>
        function hideDiv() {
            document.getElementById("employe").style.display="none";
        }	
        function showDiv() {
            document.getElementById("employe").style.display="block";
        }	
  
    </script>
    </main>
  </body>
</html>
<?php
        }
    }
?>