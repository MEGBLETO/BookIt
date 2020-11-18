<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
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
      <li> <a  class="current" href="#showcase">Accueil</a></li>
      <li><a href="#about">A Propos</a></li>
      <li><a href="#service">Service</a></li>
      <li><a href="login.php"`>Se Connecter</a></li>
    </ul>
  </nav>
  
  <!--Showcase-->
  
  <div id="showcase" class="showcase">
    <div class="showcase-content">
      <h1>Bienvenue Chez Book It</h1>
      <p>Nous Sommes leader dans les reservations pour tout vos evenement(Marriage, Anniversaire etc...) </p>
      <button>Faire Une reservation</button>
    </div>
  </div>
  
  
    <!--A Propos-->
    <div id="about" class="about">
  
      <div class="image">
        <img src="./img/meeting.jpg" alt="" class="look">
      </div>
  
      <div class="text">
        <h1>A Propos de Nous</h1>
        <p>Book It Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem unde illo id magnam tenetur at alias ad ut fugiat cupiditate labore eum adipisci et maiores culpa architecto perspiciatis, reiciendis a velit, aliquid natus dicta, quis veniam! Ut eligendi ab iste. est Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque, inventore eligendi modi maxime itaque ad repellendus ipsa officiis quos nobis? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam voluptatibus sequi, eaque inventore sint numquam reprehenderit dolorum dolorem amet maiores!</p>
      </div>
    </div>


  <!--Service-->

<div id="service" class="service">
   <div class="entete">
     <h3>Nos Services</h3>
   </div>
  <div class="service-containt">
    <div class="item1">
      <i class="fas fa-church fa-2x"></i>
      <h3>Reservation pour Marriage</h3>
    </div>
    <div class="item1">
      <i class="fas fa-birthday-cake fa-2x"></i>
      <h3>Reservation pour Anniversaire</h3>
    </div>
    <div class="item1">
      <i class="far fa-chart-bar fa-2x"></i>
      <h3>Reservation pour Conference</h3>
      <i class="icon-calendar"></i>       
    </div>
    <div class="item1">
      <i class="far fa-chart-bar fa-2x"></i>
      <h3>Reservation pour </h3>
      <i class="icon-calendar"></i>       
    </div>

  </div>
</div>

<!--Footer-->

<div class="footer">
  <div class="copyright">
    <p>Copyright, &copy; BookIt 2020</p>
  </div>

  <div class="icons">
    <i class="fab fa-facebook fa-2x"></i>
    <i class="fab fa-instagram fa-2x"></i>
    <i class="fab fa-snapchat fa-2x"></i>
  </div>
</div>

</body>
<script src="js/app.js"></script>
</html>

