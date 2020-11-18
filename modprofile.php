<?php
  session_start();


  
if(isset($_POST['submit'])){
  $civilite   = $_POST['civilite'];
  $nom        = $_POST['nom'];
  $prenom     = $_POST['prenom'];
  $occupation = $_POST['occupation'];
  $numero     = $_POST['numero'];
  $ville      = $_POST['ville'];
  $codepostale= $_POST['codeposte'];



   //Demande a inclure le fichier de connexion a la base de donnee
   require 'master/databaseconect.php';
   //Demande a inclure les differentes fonctions que j'appellerai dans mon code
 require 'master/function.php';

  //verifier si le formulaire a ete renseigner ou rediriger avec une erreur

  if(emptyInputFieldmodif($civilite, $nom, $prenom, $occupation,  $numero, $ville, $codepostale) !== false){
    header("location: modprofile.php?error=formulairevide");
      exit();
   }
   //appelle de fonction pour Modifier les details de lutillisateur sur la plateforme
     
      moduserdetails($dbconn, $civilite, $nom, $prenom, $occupation,  $numero, $ville, $codepostale);
 
}
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
        echo "<li><a  href='profile.php#about'>Profile</a></li>";
        echo "<li><a href='logout.php'>Se deconnecter</a></li>";
      }
      else{
        echo "<li><a href='about.php'>A propos</a></li>";
        echo "<li><a href='registration.php#about'>s'inscrire</a></li>";
      }
      ?>
    
     
    </ul>

    <script src="js/app.js"></script>
  </nav>



    <!--FORMULAIRE INSCRIPTION-->
    <div class="formulaire-modification">
  <div class="formulaire-contenaire1">

      <h1 class="formh1 formh12">Modifier mon profile</h1>
    <form action="modprofile.php" method="post">

        <label for="Nom">Civilité:</label>
        
        <span class="orgcivil">
          <label for="Monsieur">Monsieur</label>
          <input type="radio" id="Mr" name="civilite" value="Mr" checked/>
          <label for="Madame">Madame</label>
          <input type="radio" id="Mdme" name="civilite" value="Mdme"/>
        </span>

        <label for="Nom">Nom:</label>
        <input type="text" name="nom"  value="<?php echo $_SESSION["usersirname"];?>" placeholder=""required >

        <label for="Nom">Prenom:</label>
        <input type="text" name="prenom"   placeholder="" value="<?php echo $_SESSION["username"]; ?>" required>

        <label for="Nom">Occupation:</label>
        <input type="text" name="occupation" value="<?php echo $_SESSION["job"]; ?>" required>

        <label for="Contact">Numero de Telephone:</label>
        <input type="number" name="numero" value="<?php echo $_SESSION["phone"]; ?>" required>

        <label for="Ville">Ville:</label>
        <input type="text" name="ville" value="<?php echo $_SESSION["ville"]; ?>"required>

        <label for="Code Postal">Code Postal:</label>
        <input type="text" name="codeposte" value="<?php echo $_SESSION["codepostale"]; ?>" required>
   
     <button type="submit" name="submit">Modifier</button>
    </form>


    </div>
  
  
  </div>
  
</body>
<script src="js/app.js"></script>
</html>