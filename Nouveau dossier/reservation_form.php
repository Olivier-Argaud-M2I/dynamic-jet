<?php
    $date = date('d/m/Y H:i', strtotime ("+1 hour"));
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

    <div class="container" style="margin-top:5%">
        <h4 class="text-center">Formulaire reservation</h4><hr/>
        <form method="POST" action="reservation_traitement.php">
            <div class="form-group">
                <label for="date_de_debut">Date et heure de début</label><br/>
                <input type="text" name="date_de_debut" value="<?= $date ?>" min="<?= $date ?>" >
            </div>
            <div class="form-group">
                <label for="date_de_fin">Date et heure de fin</label><br/>
               <input type="text" name="date_de_fin" value="<?= $date ?>" min="<?= $date ?>"> 
            </div>
           
            <div class="form-group">
                <p>Moniteur</p>
                <input type="radio" name="nbr_moniteurs" onchange="showDiv()" value='oui'checked>
                <label for="nbr_moniteurs">oui</label>
                <input type="radio" name="nbr_moniteurs" onchange="hideDiv()" value='non' >
                <label for="nbr_moniteurs">non</label>
            </div>

           <div class="form-group"  id="employe">
                
                    <label for="nom">Nom du moniteur</label>
                    <select name="nom_emp">
                    
                    </select>
        
            </div>
            
            
        <div class="form-group">
        
            <label for="en_activite">Activité</label>
            <select name="activite">
                <option value="scooter">Scooter</option>
                <option value="ski">Ski nautique</option>
                <option value="wakeboard">Wakeboard</option>
                <option value="bouee">Bouée</option>
                <option value="bateau">Bateau</option>
          </select>
          
        </div>
        <div class="form-group">
        
            <label for="mod_equip">Modèle équipement</label>
            <select name="nom_equip">
                <option value="kawasaki">Kawasaki STX 15F</option>
                <option value="sea-doo">Sea Doo 4Tec</option>
                <option value="yamaha">Yamaha FX SHO</option>
                <option value="bouee">Bouée</option>
                <option value="wakeboard">Wakeboard</option>
                <option value="bateau">Bateau</option>
                <option value="ski">Ski nautique</option>
          </select>
          
        </div>
            <div class="form-group">
                <label for="coutglobal">Cout global</label>
                <input type="text" class="form-control" name="cout_global" required="">
            </div>
            <div class="form-group">
                <label for="coutunitaire">Cout unitaire</label>
                <input type="text" class="form-control" name="cout_unitaire" required="">
            </div>
            

            <button type="submit" class="btn btn-primary" name="creer_reservation">Creer une nouvelle réservation</button>
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
    
  </body>
</html>