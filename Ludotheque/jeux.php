<?php

if(!isset($_SESSION))
{   session_start();
}
if(!isset($_SESSION['connect']) || !$_SESSION['connect']){
    $_SESSION['pseudo_vide']=0;
    $_SESSION['mdp_vide']=0;
    $_SESSION['connect']=0;
    $_SESSION['pseudo_erreur']=0;
    $_SESSION['mdp_erreur']=0;
  }?>
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
            <a href="jeux.php">Nos Jeux</a>
            <ul class="menu sous-menu">
              <li class="sous-menu-item"><a href="agetri.php">Trier par age</a></li>
              <li class="sous-menu-item"><a href="genretri.php">Trier par genre</a></li>
            </ul>
          </li>
          <li class="menu-item"><a href="contact.php">Contact</a></li>
        </ul>
     	</div>
    </div>
    <div id="contenu">
        <div id="connexion">
        <?php
                if($_SESSION['connect']==0)
                {
                   echo"<form method='post' action='connexion.php'>
                  Pseudo ou email : <input name='Pseudo' placeholder='Pseudo/Mail' /><br />";

                      if($_SESSION['pseudo_vide']==1)
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
                  echo"<input type='submit' name='Connexion_j' value='Connexion'/><br/>
                  <a href='inscription.php'> Inscription </a>
                    </form> ";
                }
                else
                {
                  echo "Bonjour ".$_SESSION['reponse'][0].".";
                  echo"<form method='post' action='connexion.php'>
                        <input type='submit' name='Deconnexion_j' value='Deconnexion'/><br/>
                        </form>";
                }
          ?>
    	</div> <!-- test -->
    	 <a href="tri.php?genre=rpg">rpg</a> <a href="tri.php?genre=fps">fps</a> <a href="tri.php?genre=action">action</a> <a href="tri.php?genre=strategie">strategie</a> <a href="tri.php?genre=plateforme">plateforme</a>  <a href="tri.php?age=3">3+</a> <a href="tri.php?age=7">7+</a> <a href="tri.php?age=12">12+</a> <a href="tri.php?age=18+">18+</a>


      	<?php
      		$user="Modira";
			$password="mok";
			$base="ludotheque";

			$con=mysqli_connect("localhost",$user,$password,$base);
			$retour=mysqli_select_db($con,$base);
			$con->set_charset("utf8");

			if(!$retour)
				echo "La connexion à la base n'a pas abouti.";

			$requete='SELECT nom_jeux, genre1, genre2, age_min, prix, image, date_parution, description FROM `jeux`';
			$reponse=mysqli_query($con,$requete);

			if (!$reponse)
			{
  			  printf("Error: %s\n", mysqli_error($con));
   			  exit();
			}

			while($donnees=mysqli_fetch_array($reponse,MYSQLI_NUM))
			{
		      echo "<div class = 'separation'>
		        	<h1>".$donnees[0]." : </h1>";
		      echo"</div>
		      <div class = 'jeux'>  
		        <div class = 'image-jeux'>
		          <a href=''><img src='".$donnees[5]."' alt='".$donnees[5]."' /></a>";
		        echo"</div>
		        <div class = 'descr-jeux'>
		          <p>  ".$donnees[7];
		        echo"</p>
		        </div>
		        <div class = 'genreage-jeux'>
		          <p> Genre : ".$donnees[1];
		          if($donnees[2] != NULL)
		          {
		          	echo "/".$donnees[2];
		          }
		          echo "</br> Age recommandé : ".$donnees[3]."+ </p>
		        </div>
		        <div class ='prix-jeux'>
		          <p> Prix : ".$donnees[4]."€ </p>
		        </div>    
			  </div>
			  </div>";
			 }
		?>
    </div>		
  <div id="piedpage">Ceci est le pied de page</div>
  </body>
</html>
