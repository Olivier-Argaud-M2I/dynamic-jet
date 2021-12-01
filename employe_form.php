
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
    <div class="container" style="margin-top:5%">
        <h4 class="text-center">Formulaire employé</h4><hr/>
        <form method="POST" action="employe_traitement.php">


            <div class="form-group div-form">
              <label for="nom_emp">Nom employé</label>
              <input type="text" class="form-control" name="nom_emp" required="">
            </div>

            <div class="form-group div-form">
                <label for="numero_secu">Numéro sécu</label>
                <input type="text" class="form-control" name="num_secu" required="">
            </div>

            <div class="form-group div-form">
                <label for="date_emb">Date d'embauche</label>
                <input type="date" class="form-control" name="date_emb" required="">
            </div>

            <div class="form-group div-form">
                <label for="visite_embauche">Visite médicale d'embauche</label>
                <input type="date" class="form-control" name="visite_med" required="">
            </div>

            <div class="form-group div-form">
                <label for="statut_s">Statut</label>
                <input type="text" class="form-control" name="statut" required="">
            </div>

            <div class="form-group div-form">
                <label for="numero_permis">Numéro permis</label>
                <input type="text" class="form-control" name="num_permis" required="">
            </div>


            <p>Activité</p>
            <div class="form-check div-form">
                <input class="form-check-input" type="radio" name="activ" value="oui" id="activ_1" checked>
                <label class="form-check-label" for = "activ_1">
                  Oui
                </label>
            </div>

            <div class="form-check div-form">
                <input class="form-check-input" type="radio" name="activ" value="non" id="activ_0">
                <label class="form-check-label" for = "activ_0">
                  Non
                </label>
            </div>

            <p>Titulaire du BEES</p>
            <div class="form-check div-form">
                <input class="form-check-input" type="radio" name="bees" value="oui" id="bees_1" checked>
                <label class="form-check-label" for= "bees_1">
                  Oui
                </label>
            </div>

            <div class="form-check div-form">
                <input class="form-check-input" type="radio" name="bees" value="non" id="bees_0">
                <label class="form-check-label" for= "bees_0">
                  Non
                </label>
            </div>

            <div class = "text-center">
            <button type="submit" class="btn btn-secondary submit" name="creer_employe">Creer nouvel employé</button>
            </div>

        </form>
    </div>
  </body>
  </html>
</main>
</html>

