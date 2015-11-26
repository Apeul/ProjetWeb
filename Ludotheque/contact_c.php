<?php
  if (session_status() == PHP_SESSION_NONE)
  {
    session_start();
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="ludotheque.css" media="screen" />
    <meta charset = "utf-8">
    <title> -- Ludothèque -- </title>
  </head>

  <body>
    <div id="bandeau">
      <div id= "logo">
        <a href="ludotheque.php"> 
          <img src="logo.png" alt="Logo" />
        </a>
      </div>
     	<div id="titre"> JEUX </div>
     	<div id="barre">
        <ul class="menu">
          <li class="menu-item"><a href="ludotheque.php">Accueil</a></li>
          <li class="menu-item">
            <a href="ludotheque.php">Nos Jeux</a>
            <ul class="menu sous-menu">
              <li class="sous-menu-item"><a href="ludotheque.php">Trier par age</a></li>
              <li class="sous-menu-item"><a href="ludotheque.php">Trier par genre</a></li>
            </ul>
          </li>
          <li class="menu-item"><a href="contact.html">Contact</a></li>
        </ul>
     	</div>
    </div>
    <div id="contenu">
      <div id="connexion">
        <?php
            echo "Bonjour ".$_SESSION['reponse'][0].".";
        ?>
      </div>
      <p>Site conçu par Mok Modira et Laville Martin dans le cadre d'un projet de Web Dynamique. Licence 2 Sciences Pour l'Ingénieur, Université du Maine, Le Mans. 
      </p>
    </div> 		
  <div id="piedpage">Ceci est le pied de page</div>
  </body>
</html>



