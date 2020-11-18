<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Book It</title>
</head>
<body>

  <!--Bar de navigation-->
  <nav id="navbar">
    <div class="logo">
      <h1>Book It</h1>
    </div>

    <ul>
      <li><a href="index.php">Accueil</a></li>
      <li><a href="index.php#service">Service</a></li>
      <?php 
      if(isset($_SESSION["useremail"])){
        echo "<li><a class='current' href='profile.php#about'>Profile</a></li>";
        echo "<li><a href='logout.php'>Se deconnecter</a></li>";
      }
      else{
        echo "<li><a href='about.php'>A propos</a></li>";
        echo "<li><a href='registration.php#about'>s'inscrire</a></li>";
      }
      ?>
    
     
    </ul>
  </nav>


<!--serious stuff wink wink -->
<div class="profile-container">

  <div class="profile-container2">
  <div class="welcome">
    <p class="usename">Vous etes connecte en tant que  <?php echo $_SESSION["usersirname"]."  ".$_SESSION["username"];?></p>
  </div>
 <div class="showcase-profile">
   <div class="entete">
     <h1 class="ta">Profile</h1>
     <a href="modprofile.php">Modifier mes details</a>
     <a href="">Supprimer mon compte</a>
   </div>
   <div class="element">
     <p class="details"> Identifiant unique:&nbsp;&nbsp;<?php echo $_SESSION["id"];?></p>
     <p class="details"> Civilite:&nbsp;&nbsp;<?php echo $_SESSION["civilite"];?></p>
     <p class="details"> Nom:&nbsp;&nbsp;<?php echo $_SESSION["usersirname"];?></p>
     <p class="details"> Prenom:&nbsp;&nbsp;<?php echo $_SESSION["username"];?></p>
     <p class="details"> occupation:&nbsp;&nbsp;<?php echo $_SESSION["job"];?></p>
     <p class="details"> Email:&nbsp;&nbsp;<?php echo $_SESSION["useremail"];?></p>
     <p class="details"> Phone:&nbsp;&nbsp;<?php echo $_SESSION["telephone"];?></p>
     <p class="details"> Ville:&nbsp;&nbsp;<?php echo $_SESSION["ville"];?></p>
     <p class="details"> Code Postale:&nbsp;&nbsp;<?php echo $_SESSION["codepostale"];?></p>
     <p class="details"> Mot-de-passe:&nbsp;&nbsp;<?php echo $_SESSION["dbpassword"];?></p>
    </div>
    <button class="reservation" onClick="document.location.href='city.php'" >Faire Une Reservation</button>
    
  </div>

    </div>


<script src="js/app.js"></script>
</html>