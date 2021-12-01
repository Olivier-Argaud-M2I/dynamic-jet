<?php 
require_once ('client_traitement.php');
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
    <!------Icones------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
    <title>Clients</title>
</head>
<body>
    <header>
        <div>
        <h1>Dynamic Jet</h1>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
    
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="reservation.php">Réservations</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="equipement.php">Equipements</a>
                </li>
                <li class="nav-item active">
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

        <div>
            <a href="client_form.html"><button type='button' class="btn btn-secondary btn-lg btn-modif">Ajouter une nouveau client</button></a>
        </div>
        <div>
             <table class="table table-striped table-hover">
            
                <thead>
                    <td>Nom</td>
                    <td>Prénom</td>
                    <td>Adresse</td>
                    <td>Numéro de téléphone</td>
                    <td>Date de naissance</td>
                    <td>Permis cotier</td>
                  
                </thead>
                <tbody>
                <?php

                      while($data = $table_client->fetch()){

                          echo '<tr>';

                            echo '<td><span id="idclient">'.$data['num_unique'].'</span></td>';
                            echo '<td>'.$data['nom_client'].'</td>';
                            echo '<td>'.$data['prenom_client'].'</td>';
                            echo '<td>'.$data['adresse_client'].'</td>';
                            echo '<td>'.$data['num_tel_client'].'</td>';
                            echo '<td>'.$data['datenaiss_client'].'</td>';
                            echo '<td>'.$data['num_permis_cotier'].'</td>';

                            echo "<td><a href='client_edit.php?id=" . $data['date_debut'] . "' class='text-decoration-none eye'><i class='fa fa-eye'></i></a></td>";
                            echo "<td><a href='client_edit.php?id=".$data['num_unique']."'><i class='fa fa-pencil'></i></a></td>";
                            echo "<td><a href='#' onclick='Supprimer();'><i class='fa fa-trash'></i></a></td>";
                            echo "</tr>";
                      }
                ?>
                        
                      
                </tbody>

            
            </table>
        </div>
    </main>

</body>
</html>