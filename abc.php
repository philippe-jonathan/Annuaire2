 <!DOCTYPE html>
<html>

<head>


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
	
	<title>THE ANNUAIRE</title>

</head>

<nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo"><i class="material-icons">THE</i>ANNUAIRE</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="sass.html"><i class="material-icons">Acceuil</i></a></li>
        <li><a href="badges.html"><i class="material-icons">Ajouter contact</i></a></li>
        <li><a href="collapsible.html"><i class="material-icons">Supprimer contact</i></a></li>
        <li><a href="mobile.html"><i class="material-icons"></i></a></li>
      </ul>
    </div>
  </nav>

<body>
<table>
<?php 

try{

    $bdd = new PDO('mysql:host=localhost;dbname=Annuaire;charset=utf8', 'admin', 'azerty');

}

// en cas d'erreur on affiche un message :

catch (Exception $e)

{

        die('Erreur : ' . $e->getMessage());

}

$reponse = $bdd->query('SELECT * FROM contacts') ;

$cpt = $bdd->query('SELECT COUNT(*) AS nb_contacts FROM contacts') ;

$ville = $bdd->query('SELECT * FROM contacts WHERE ville ="Auch" ') ;

$email = $bdd->query('SELECT * FROM contacts WHERE email LIKE "%gmail.com"') ;

while($donnees=$reponse->fetch()){

      echo '<tr><td>Nom: ' . $donnees['nom'] . '<td>Prenom: ' . $donnees['prenom'] . '<td>Email: ' . $donnees['email'];

}?>
</table>
<?php

while($result=$cpt->fetch()){

      echo '<p>Nombre de contacts= ' . $result[0];

}

while($retour=$ville->fetch()){

      echo '<p>contacts habitants à Auch= ' . $retour['nom'];
}

echo '<p>contacts avec adresse gmail= ' ;

while($retour_email=$email->fetch()){

     echo '<p> ' . $retour_email['nom'] ;
 }

$up = $bdd->query('UPDATE contacts SET email = "ogatien@simplon.co" WHERE id = 18') ;

$de = $bdd->query('DELETE FROM appartenir WHERE fk_contact = 1 ');

$del = $bdd->query('DELETE FROM contacts WHERE id =1')
;

 ?>


</body>

	<footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">THE ANNUAIRE</h5>
                <p class="grey-text text-lighten-4">Trouvez plus que de simple coordonnées.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Liens</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Contact</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2018 Simplon.co
            <a class="grey-text text-lighten-4 right" href="#!">Infos</a>
            </div>
          </div>
        </footer>

</html>