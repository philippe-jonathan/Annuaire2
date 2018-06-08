 <!DOCTYPE html>
<html>

<head>

<h1>THE ANNUAIRE</h1>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
	
	<title>THE ANNUAIRE</title>

</head>


<body>

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

      echo '<p>Nom user= ' . $donnees['nom'];

}

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
</html>