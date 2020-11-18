<?php

if(isset($_POST['submit'])){
  
  $civilite   = $_POST['civilite'];
  $nom        = $_POST['nom'];
  $prenom     = $_POST['prenom'];
  $occupation = $_POST['occupation'];
  $email      = $_POST['email'];
  $numero     = $_POST['numero'];
  $ville      = $_POST['ville'];
  $codepostale= $_POST['codeposte'];
  $password1  = $_POST['password1'];
  $password2  = $_POST['password2'];
  
  
  //Demande a inclure le fichier de connexion a la base de donnee
  require 'master/databaseconect.php';
  //Demande a inclure les differentes fonctions que j'appellerai dans mon code
  require 'master/function.php';

  //verifier si le formulaire a ete renseigner ou rediriger avec une erreur

     if(emptyInputField($civilite, $nom, $prenom, $occupation, $email, $numero, $ville, $codepostale, $password1, $password2) !== false){
      header("location: registration.php?error=formulairevide");
        exit();
     }
      
     //verifier si il sagit d'une bonne addresse email
     if(invalidEmail($email) !== false){
      header("location: registration.php?error=emailinvalid");
        exit();
     }

     //verifier si les mots de passe son conform lun a lautre
     if(passwordMatch($password1, $password2) !== false){
      header("location: registration.php?error=passwordnematchpas");
        exit();
     }

     //verifier si l''utilisateur exist deja dans la base de donne pgSql a travers son email
     if(emailExist($dbconn, $email) !== false){
      header("location: registration.php?error=cetteemailexistdeja");
        exit();
     }
     
     createUser($dbconn, $civilite, $nom, $prenom, $occupation, $email, $numero, $ville, $codepostale, $password1);
     
     
    }

    /*
       else{
         header("location: login.php");
       }
  
*/
?>



<!--Mon code Html -->

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
      <li><a href="index.php#about">A Propos</a></li>
      <li><a href="login.php">Se Connecter</a></li>
    </ul>
  </nav>

    <!--FORMULAIRE INSCRIPTION-->
<div class="formulaire-inscription">
  <div class="formulaire-contenaire">

  <!--Ici je recupere toute les erreurs que jai eut a retourner dans mon url-->
  <?php
  if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput"){
      echo "<p class='error'>Veuillez renseigner tout le formulaire !</P>";
    }
    else if($_GET["error"] == "emailinvalid"){
      echo "<p class='error'>Veuillez renseigner une addresse mail valid</p>";
    }
    else if($_GET["error"] == "passwordnematchpas"){
      echo "<p class='error'>Veuillez vous assurer que les mots de passe son conforme</p>";
    }
    else if($_GET["error"] == "passwordnematchpas"){
      echo "<p  class='error'>Veuillez vous assurer que les mots de passe son conforme</p>";
    }
    else if($_GET["error"] == "cetteemailexistdeja"){
      echo "<p class='error'>Cette addresse email est deja utilliser</p>";
    }
    else if($_GET["error"] == "inscriptioncomplet"){
      echo "<p >Vous etes bien inscrit</p>";
    }
  }
  ?>
      <h1 class="formh1 formh12">S'inscrire</h1>
    <form action="registration.php" method="post">

        <label for="Nom">Civilité:</label>
        
        <span class="orgcivil">
          <label for="Monsieur">Monsieur</label>
          <input type="radio" id="Mr" name="civilite" value="Mr" checked/>
          <label for="Madame">Madame</label>
          <input type="radio" id="Mdme" name="civilite" value="Mdme"/>
        </span>

        <label for="Nom">Nom:</label>
        <input type="text" name="nom" placeholder="Votre Nom" required >

        <label for="Nom">Prenom:</label>
        <input type="text" name="prenom" placeholder="Votre Prenom" required>

        <label for="Nom">Occupation:</label>
        <input type="text" name="occupation" placeholder="Votre Profession" required>

        <label for="Email">Email:</label>
        <input type="text" name="email" placeholder="Votre Adresse Email" required>

        <label for="Contact">Numero de Telephone:</label>
        <input type="number" name="numero" placeholder="Votre numero de telephone" required>

        <label for="Ville">Ville:</label>
        <input type="text" name="ville" placeholder="Votre ville de residence" required>

        <label for="Code Postal">Code Postal:</label>
        <input type="text" name="codeposte" placeholder="Votre Code Postal" required>
   
  <label for="pasword">Mot de Passe:</label>
  <input type="password" name="password1" placeholder="Mot de passe" required>

   
  <label for="password">Confirmer Mot de Passe:</label>
  <input type="password" name=password2 placeholder="Confirmer Votre Mot de passe" required>

     <button type="submit" name="submit">S'inscrire</button>
    </form>


    </div>
  
  
  </div>
  
</body>
<script src="js/app.js"></script>
</html>