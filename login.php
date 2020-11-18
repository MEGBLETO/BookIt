<!--Mon code php-->

<?php
    //verifier si le formulaire a ete submit

    if(isset($_POST['submit'])){


      $email = $_POST["email"];
      $password = $_POST["password"];

  //Demande a inclure le fichier de connexion a la base de donnee
      require 'master/databaseconect.php';
        //Demande a inclure les differentes fonctions que j'appellerai dans mon code
      require 'master/function.php';
//verifier si le formulaire a ete renseigner ou rediriger avec une erreur

if(emptyInputFieldLogin($email, $password) !== false){
  header("location: login.php?error=formulairevide");
    exit();
 }

  //appelle de fonction pour connecter lutillisateur a la platforme
     
  connectuser($dbconn, $email, $password);
 

    }

/*
    else{
      header("location: login.php");
      exit();
    }
*/
 ?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Book IT </title>
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
      <li><a href="index.php#about">A Propos</a></li>
      <li><a class="current" href="#">Se Connecter</a></li>
    </ul>
  </nav>

  <!--FORMULAIRE-->
<div class="formulaire">
  <div class="form-containt">
    <!--Ici je recupere toute les erreurs que jai eut a retourner dans mon url-->
      <?php
      
      if(isset($_GET["error"])){
        if($_GET["error"] == "motdepasseincorrect"){
          echo "<p class='error'>Email ou mot de passe invalid!</P>";
        }
        else if($_GET["error"] == "formulairevide"){
           echo "<p class='error'>Vous n'aviez pas renseigner le formulaire!</P>";
        }
      }
      
      ?>
      <h1 class="formh1">Se Connecter</h1>
    <form action="login.php" method="post">
        <label for="Email">Email</label>
        <input type="text" name="email" placeholder="Email">
   
  <label for="pasword">Mot de Passe</label>
  <input type="password" name="password" placeholder="Mot de passe">

     <button type="submit" name="submit">Valider</button>

    </form>
    <p>Pas encore membre? <a href="registration.php" class="formlink">s'inscrire</a></p>
    </div>
  </div>
  
</body>
<script src="js/app.js"></script>
</html>