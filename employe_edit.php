<?php

try {
    $bdd = new PDO('mysql:host=localhost; dbname=dynamic_jet', 'root', 'root'); //root password pour bdd sur mac
    
} catch (Exception $e) {
    die($e->getMessage());}


    if (isset ($_GET['id'])){

        $id_emp = $_GET['id'];

        $requete = "SELECT * FROM employe WHERE num_secu=$id_emp";
        $table_employe =$bdd->query($requete);
        
        while($data = $table_employe->fetch()){

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
  <header>
        <div>
            <a href="reservation.php" class="text-decoration-none" title="Accueil" rel="home">
                <h1>Dynamic Jet</h1>
            </a>
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
                <li class="nav-item">
                  <a class="nav-link" href="client.php">Clients</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="employe.php">Employés</a>
                </li>
              </ul>
            </div>
          </nav>
    </header>
  <main>
  <body>
    <div class="container" style="margin-top:5%">
        <h4 class="text-center">Formulaire employé</h4><hr/>
        <form method="POST" action="employe_traitement.php">

            <div class="form-group">
                <label for="num_secu">Numéro sécu</label>
                <input type="number" class="form-control" name="num_secu" value="<?= $data['num_secu'] ?>" readonly>
            </div>

            <div class="form-group">
                <label for="nom_emp">Nom employer</label>
                <input type="text" class="form-control" name="nom_emp" value="<?= $data['nom_emp'] ?>" required>
            </div>


            <div class="form-group">
                <label for="date_emb">Date d'embauche</label>
                <input type="date" class="form-control" name="date_emb" value="<?= $data['date_emb'] ?>" required="">
            </div>

            <div class="form-group">
                <label for="visite_med">Visite embauche</label>
                <input type="date" class="form-control" name="visite_med" value="<?= $data['visite_med'] ?>" required="">
            </div>

            <div class="form-group">
                <label for="statut">Statut</label>
                <input type="text" class="form-control" name="statut" value="<?= $data['statut'] ?>" required="">
            </div>

            <div class="form-group">
                <label for="num_permis">Numéro permis</label>
                <input type="text" class="form-control" name="num_permis" value="<?= $data['num_permis'] ?>" required="">
            </div>


            <p>Activité</p>
            <?php
            if ($data['activ'] == "oui") {
            ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="activ" value="oui" id="activ_1" checked>
                <label class="form-check-label" for = "activ_1">
                  Oui
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="activ" value="non" id="activ_0">
                <label class="form-check-label" for = "activ_0">
                  Non
                </label>
            </div>
            <?php

            }
            else {
              ?>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="activ" value="oui" id="activ_1" >
                <label class="form-check-label" for = "activ_1">
                  Oui
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="activ" value="non" id="activ_0" checked>
                <label class="form-check-label" for = "activ_0">
                  Non
                </label>
            </div>

            <?php

            }

            ?>
            <p>Titulaire du BEES</p>
            <?php
            if ($data['bees'] == "oui") {
            ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="bees" value="oui" id="bees_1" checked>
                <label class="form-check-label" for= "bees_1">
                  Oui
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="bees" value="non" id="bees_0">
                <label class="form-check-label" for= "bees_0">
                  Non
                </label>
            </div>
            <?php

            }
            else {
              ?>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="bees" value="oui" id="bees_1" >
                <label class="form-check-label" for= "bees_1">
                  Oui
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="bees" value="non" id="bees_0" checked>
                <label class="form-check-label" for= "bees_0">
                  Non
                </label>
            </div>
            <?php
            }

            ?>

            <div class = "text-center">
            <button type="submit" class="btn btn-secondary submit" name="modifier_employe">Modifier employé</button>
            </div>

        </form>
    </div>
  </main>
  </body>
</html>
<?php
        }
    }
?>