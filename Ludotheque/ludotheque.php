<?php

if(!isset($_SESSION)) //S'il n'y a pas de session de commencé (Déconnexion ou première page visitée), on commence une session et on initialise les variables.
{   session_start();
    $_SESSION['pseudo_vide']=0;
    $_SESSION['mdp_vide']=0;
    $_SESSION['pseudo_erreur']=0;
    $_SESSION['mdp_erreur']=0;
    $_SESSION['n_connect']=0;
}
if(!isset($_SESSION['prix_panier']) || !($_SESSION['prix_panier']) ) //Si la variable n'a pas encore été utilisé (déconnexion ou première visite), on l'initialise.
{
  $_SESSION['prix_panier']=0;
}
if(!isset($_SESSION['connect']) || !$_SESSION['connect']){ //On entre seulement si on n'a pas déjà eu une connexion.
    $_SESSION['connect']=0;
  }?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="ludotheque.css" media="screen" /> <!-- Relie au css -->
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
     	<div id="titre"> JEUX </div> <!-- Titre de la page -->
      <?php
      if($_SESSION['connect']==1) //Permet d'avoir un panier en haut à droite, seulement si on est connecté.
      {
        echo "<div id='panier'>
          <a href='reservation.php'> 
                <img src='panier.png' alt='Panier' />
            </a>
            <br/>
            Total = ".$_SESSION['prix_panier']." €
          </div>";
      }
      ?>
     	<div id="barre">
        <ul class="menu">
          <li class="menu-item"><a href="ludotheque.php">Accueil</a></li> <!-- Lorsque l'on clique sur accueil, on redirige vers la page d'accueil -->
          <li class="menu-item">
            <a href="jeux.php">Nos Jeux</a> <!-- Accède à la totalité des jeux -->
            <ul class="menu sous-menu">
              <li class="sous-menu-item"><a href="agetri.php">Trier par age</a></li> <!-- Permet le tri par âge -->
              <li class="sous-menu-item"><a href="genretri.php">Trier par genre</a></li>
            </ul>
          </li>
          <li class="menu-item"><a href="contact.php">Contact</a></li>
        </ul>
     	</div>
    </div>
    <div id="contenu">
        <div id="connexion">
        <?php //Ceci est le bloc de connexion.
                if($_SESSION['connect']==0) //S'il n'y a pas encore eu de connexion, on affiche un bloc qui permet à l'utilisateur de se connecter.
                {
                   echo"<form method='post' action='connexion.php'>
                  Pseudo ou email : <input name='Pseudo' placeholder='Pseudo/Mail' /><br />";

                      if($_SESSION['pseudo_vide']==1) //Ces if et else if permettent l'affichage d'erreur.
                      {
                        echo "<span class='erreur'>Vous n'avez pas rentré de pseudo.</span><br />";
                      }
                      else if($_SESSION['pseudo_erreur']==1)
                      {
                        echo "<span class='erreur'>Le pseudo est incorrect.</span><br />";
                      }
                  echo"Mot de passe : <br /><input type='password' name='Mdp'/><br />";
                      if($_SESSION['mdp_vide']==1)
                      {
                        echo "<span class='erreur'>Vous n'avez pas rentré de mot de passe.</span><br />";
                      }
                      else if($_SESSION['mdp_erreur']==1)
                      {
                        echo "<span class='erreur'>Le mot de passe est incorrect.</span><br />";
                      }
                  echo"<input type='submit' name='Connexion' value='Connexion'/><br/>
                  <a href='inscription.php'> Inscription </a>"; //Un bouton d'inscription est possible si l'on a pas de compte.
                  echo "</form> ";
                }
                else //Cependant, si l'utilisateur est déjà connecté, on n'affiche pas le bloc.
                {
                  echo "Bonjour ".$_SESSION['reponse'][0].".";
                  echo"<form method='post' action='connexion.php'>
                        <input type='submit' name='Deconnexion' value='Deconnexion'/><br/>
                        </form>";
                }
          ?>
      </div>
      <p id = "texte"> Praesent porttitor ultrices dui, sed congue tortor cursus eget. Maecenas id mauris eu ligula vulputate mollis. Mauris sed sapien orci. Suspendisse lorem dui, laoreet sed vulputate et, pretium vel quam. Sed et orci eget lorem tempor molestie. Sed semper ultricies neque quis auctor. Aliquam venenatis vestibulum est, sed tincidunt dolor euismod in. Nullam a nibh varius, porttitor ipsum at, tempus nunc. Morbi interdum eget enim eu cursus.
      </p>
      <div class = "separation">
        <h1> Nos Meilleurs Jeux : </h1> <!-- Jeux ayant été le plus acheté. -->
      </div>
      <ul id = "best-jeux">
        <li class = "sous-jeux">
          <a href="#"><img src="Fallout4.jpg" alt="Fallout" /></a>
          <figcaption>Fallout 4</figcaption>
        </li>
        <li class = "sous-jeux">
          <a href="#"><img src="Fallout4.jpg" alt="Fallout" /></a>
          <figcaption>Fallout 4</figcaption>
        </li>
        <li class = "sous-jeux">
          <a href="#"><img src="Fallout4.jpg" alt="Fallout" /></a>
          <figcaption>Fallout 4</figcaption>
        </li>
      </ul>
      <div class = "separation">
        <h1> Nouveau : </h1> <!-- Les nouveautés -->
      </div>
      <div id = "nouveau">  
        <div id = "image-nouveau">
          <a href="#"><img src="Fallout4.jpg" alt="Fallout" /></a>
          <figcaption>Fallout 4</figcaption>
        </div>
        <div id = "descr-nouveau">
          <p>  Fallout 4 est un RPG à la première personne se déroulant dans un univers post-apocalyptique. Dans un monde dévasté par les bombes, vous incarnez un personnage solitaire sortant d'un abri anti-atomique qui doit se faire sa place dans la ville de Boston et de ses environs.
          </p>
        </div>
        <div id = "genreage-nouveau">
          <p> Genre : RPG/FPS </br> Age recommandé : 18+ </p>
        </div>
        <div id ="prix-nouveau">
          <p> Prix : 59,99€ </p>
        </div>    
      </div>
    </div>		
  <div id="piedpage">Ceci est le pied de page</div>
  </body>
</html>
