
<?php
  session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Book It</title></head>
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



  <!-- showcase salle-->

  <div class="showcase-salle">
  <div class="welcome2">
    <p class="usename">Vous etes connecte en tant que  <?php echo $_SESSION["usersirname"]."  ".$_SESSION["username"];?></p>
  </div>
   
  <div class="paris">
    <div class="entete-ville">
      <h1>Veuillez selectionner une ville pour faire votre reservation</h1>
    </div>
    <a style="display:block; text-decoration: none;" href="http://justinbieber.com">
         <div class="salles">

            <div class="item">
            
            <div class="image">
              <img class="ville1" src="img/paris.jpg" alt="">
            </div>

              <div class="city">
                <h1>Paris</h1>
              </div>


            </div>
    </a>

    <a style="display:block; text-decoration: none;" href="http://justinbieber.com">

            <div class="item">

            <div class="image">
            <img class="ville1" src="img/toulouse.jpg" alt="">

            </div>

              <div class="city">
                <h1>Toulouse</h1>
              </div>
            </div>

    </a>

    <a style="display:block; text-decoration: none;" href="http://justinbieber.com">
            <div class="item">

            <div class="image">
            <img class="ville1" src="img/nantes.jpg" alt="">
            </div>

              <div class="city">
                <h1>Nante</h1>
              </div>


            </div>

    </a>

    <a style="display:block; text-decoration: none;" href="http://justinbieber.com">
            <div class="item">

            <div class="image">
            <img class="ville1" src="img/marseille.jpg" alt="">
            </div>

              <div class="city">
                <h1>Marseille</h1>
              </div>


            </div>
    </a>


    <a style="display:block; text-decoration: none;" href="http://justinbieber.com">

            <div class="item">
              
              <div class="image">
                <img class="ville1" src="img/strasbourg.jpg" alt="">
          
            </div>

              <div class="city">
                <h1>strasbourg</h1>
              </div>
            </div>    
    </a>


    <a style="display:block; text-decoration: none;" href="http://justinbieber.com">
            <div class="item">
              <div class="image">
                <img class="ville1" src="img/montpellier.jpg" alt="">
           
            </div>

              <div class="city">
                <h1>montpellier</h1>
              </div>
            </div>
    </a>

  </div>
  
  
  </div>

  
</body>
</html>