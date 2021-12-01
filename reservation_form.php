<?php 
require_once ('reservation_traitement.php');
?>

<!DOCTYPE html>

<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <!---------Bootstrap------->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <!-------CSS------->
  <link href="style.css" rel="stylesheet">
  <title>Accueil</title>
  <!------Icones------>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
  <title>Clients</title>
</head>

  <body>
  <header>
        <div>
            <a href="reservation.php" class="text-decoration-none" title="Accueil" rel="home">
                <h1>Dynamic Jet</h1>
            </a>
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
        <h4 class="text-center">Formulaire reservation</h4><hr/>
        <form method="POST" action="reservation_traitement.php">
            <div class="form-group div-form">
                <label for="date_de_debut" class="date">Date de début</label>
                <input type="date" class=""name="date_de_debut" value="" min="" >
            
            
                <label for="heure_de_debut" class="espace">Heure de début</label>
                <input type="time" name="heure_de_debut" value="" min="" >
            </div>
            <div class="form-group div-form">
                <label for="date_de_fin" class="date">Date de fin</label>
                <input type="date" name="date_de_fin" value="" min="" >
          
                <label for="heure_de_fin" class="espace">Heure de fin</label>
                <input type="time" name="heure_de_fin" value="" min="" >
            </div>
           
            <div class="form-group div-form">
                <p>Moniteur</p>
                <input type="radio" name="nbr_moniteurs" onchange="showDiv()" value='oui'checked>
                <label for="oui">oui</label>
                <input type="radio" name="nbr_moniteurs" onchange="hideDiv()" value='non' >
                <label for="non">non</label>
            </div>

            <div class="form-group div-form" id="employe">
                <label for="num_secu">Nom moniteur</label>
                <select name="num_secu" class="form-control" required="">
                <option disabled selected value >Selectionner moniteur</option>
                    <?php

                        while($data = $table_employe->fetch()){

                            echo "<option value=".$data['num_secu'].">".$data['nom_emp']."</option>";
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
                <option disabled selected value >Selectionné equipement</option>
                    <?php

                        while($data = $table_equipement->fetch()){

                            echo "<option value=".$data['id_equip'].">".$data['nom_equip']."</option>";
                        }

                    ?>
                    </select>
                    </div>

            <div class="form-group div-form">
                <label for="coutglobal">Cout global</label>
                <input type="text" class="form-control" name="cout_global" required="">
            </div>
            <div class="form-group div-form">
                <label for="coutunitaire">Cout unitaire</label>
                <input type="text" class="form-control" name="cout_unitaire" required="">
            </div>

            <div class="form-group div-form">
                <label for="id_client">Client</label>
                <select name="id_client" class="form-control" required="">
                <option disabled selected value >Selectionné client</option>
                    <?php

                        while($data = $table_client->fetch()){

                            echo "<option value=".$data['num_unique'].">".$data['nom_client']."</option>";
                        }

                    ?>

                </select>
            </div>



            

            <button type="submit" class="btn btn-secondary submit" name="creer_reservation">Creer une nouvelle réservation</button>
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