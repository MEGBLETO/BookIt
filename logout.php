<?php
session_start();
//supprimer toute mes variables de la session precedente
session_unset();
//detruire la session precedente
session_destroy();

header("location: index.php?Logoutsuccess");
exit();
?>

