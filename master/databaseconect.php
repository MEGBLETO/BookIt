<?php


//phpinfo();


//connexion a ma base de donnee postgres
$connexion=("host=localhost user=postgres port=5432 dbname=bookit  password=A123456*");

$dbconn = pg_connect($connexion) or die("Connexion impossible");





//fermeture de ma connexion a la base de donnee

//pg_close($dbconn);

?>

