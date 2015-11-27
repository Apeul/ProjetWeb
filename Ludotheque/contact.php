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
          <li class="menu-item"><a href="contact.php">Contact</a></li>
        </ul>
     	</div>
    </div>
    <div id="contenu">
      <div id="connexion">
         <?php
            if (session_status() == PHP_SESSION_ACTIVE)
            {   if($_SESSION['connect']==0)
                {
                   echo"<form method='post' action='connexion.php'>
                  Pseudo ou email : <input name='Pseudo' placeholder='Pseudo/Mail' /><br />";

                      if($_SESSION['pseudo_vide']==1)
                      {
                        echo "<span class='erreur'>Vous n'avez pas rentré de pseudo.</span><br />";
                      }
                      else if($_SESSION["pseudo_erreur"]==1)
                      {
                        echo "<span class='erreur'>Le pseudo est incorrect.</span><br />";
                      }
                  echo"Mot de passe : <br /><input type='password' name='Mdp'/><br />";
                      if($_SESSION["mdp_vide"]==1)
                      {
                        echo "<span class='erreur'>Vous n'avez pas rentré de mot de passe.</span><br />";
                      }
                      else if($_SESSION["mdp_erreur"]==1)
                      {
                        echo "<span class='erreur'>Le mot de passe est incorrect.</span><br />";
                      }
                  echo"<input type='submit' name='Connexion_c' value='Connexion'/><br/>
                  <a href='inscription.php'> Inscription </a>
                    </form> ";
                }
                else
                {
                  echo "Bonjour ".$_SESSION['reponse'][0].".";
                  echo"<form method='post' action='connexion.php'>
                        <input type='submit' name='Deconnexion_c' value='Deconnexion'/><br/>
                        </form>";
                }
          }
          else
          {
            echo"<form method='post' action='connexion.php'>
                  Pseudo ou email : <input name='Pseudo' placeholder='Pseudo/Mail' /><br />";
            echo"Mot de passe : <br /><input type='password' name='Mdp'/><br />";
             echo"<input type='submit' name='Connexion_c' value='Connexion'/><br/>
             <a href='inscription.php'> Inscription </a>
             </form> ";

          }
          ?>
      </div>
      <p>Site conçu par Mok Modira et Laville Martin dans le cadre d'un projet de Web Dynamique. Licence 2 Sciences Pour l'Ingénieur, Université du Maine, Le Mans. 
      </p>
    </div> 		
  <div id="piedpage">Ceci est le pied de page</div>
  </body>
</html>



