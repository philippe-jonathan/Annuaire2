 <!DOCTYPE html>
<html>

<head>

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

while($donnees=$reponse->fetch()){

      echo '<p>Nom user= ' . $donnees['nom'];

}

while($result=$cpt->fetch()){

      echo '<p>Nombre de contacts= ' . $result[0];

}

 ?>

 
</body>
</html>