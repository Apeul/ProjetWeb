<?php

if(!isset($_SESSION))
{   session_start();
    $_SESSION['pseudo_vide']=0;
    $_SESSION['mdp_vide']=0;
    $_SESSION['pseudo_erreur']=0;
    $_SESSION['mdp_erreur']=0;
    $_SESSION['age']=0;
    $_SESSION['n_connect']=0;
    for($i=0;$i<50;$i++)
    {
      $_SESSION['erreur_'.$i]=0;
      $_SESSION['nom_jeu'.$i]=0;
      $_SESSION['prix'.$i]=0;
      $_SESSION['image'.$i]=0;
    }
}
if(!isset($_SESSION['prix_panier']) || !($_SESSION['prix_panier']) )
{
  $_SESSION['prix_panier']=0;
}
if(!isset($_SESSION['connect']) || !$_SESSION['connect']){
    $_SESSION['connect']=0;
  }?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="ludotheque.css" media="screen" /> <!-- Commentaires à la page ludotheque.php -->
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
            <?php
      if($_SESSION['connect']==1)
      {
        echo "<div id='panier'>
          <a href='reservation.php'> 
                <img src='panier.png' alt='Panier' />
            </a>
            <br/>
            Total = ".$_SESSION['prix_panier']." €
          </div>";
        //A insérer partout
      }
      ?>
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
                if($_SESSION['connect']==0) //Commentaires à la page ludotheque.php
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
                      else if($_SESSION['n_connect']==1)
                      {
                        echo "<span class='erreur'>Veuillez vous connecter pour accéder au panier.</span><br />";
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
                  echo"<input type='submit' name='Connexion_a' value='Connexion'/><br/>
                  <a href='inscription.php'> Inscription </a>
                    </form> ";
                }
                else
                {
                  echo "Bonjour ".$_SESSION['reponse'][0].".";
                  echo"<form method='post' action='connexion.php'>
                        <input type='submit' name='Deconnexion_a' value='Deconnexion'/><br/>
                        </form>";
                }
          ?>
      </div>
      <a href="tri.php?age=3">3+</a> <a href="tri.php?age=7">7+</a> <a href="tri.php?age=12">12+</a> <a href="tri.php?age=18+">18+</a>
      <?php
        $user="Modira";
        $password="mok";
        $base="ludotheque";

        $con=mysqli_connect("localhost",$user,$password,$base);
        $retour=mysqli_select_db($con,$base);
        $con->set_charset("utf8"); //Mêmes commentaires que la page jeux.php

        if(!$retour)
          {echo "La connexion à la base n'a pas abouti.";}
        $_SESSION['compteur']=0; //Permet de savoir quel jeu ajouter
        if($_SESSION['age']!=0) //Il faut qu'on ait cliqué sur un des boutons pour l'âge pour accéder à ces requêtes.
        {
            if($_SESSION['age']==3) //Si l'utilisateur a cliqué sur le bouton "3+", on applique cette requête.
            {
               $requete='SELECT nom_jeux, genre1, genre2, age_min, prix, image, date_parution, description, acheté, total FROM `jeux` WHERE age_min>=3 ORDER BY age_min ASC';
            }
            else if($_SESSION['age']==7)
            {
               $requete='SELECT nom_jeux, genre1, genre2, age_min, prix, image, date_parution, description, acheté, total FROM `jeux` WHERE age_min>=7 ORDER BY age_min ASC';
            }
            else if($_SESSION['age']==12)
            {
               $requete='SELECT nom_jeux, genre1, genre2, age_min, prix, image, date_parution, description, acheté, total FROM `jeux` WHERE age_min>=12 ORDER BY age_min ASC';
            }
            else if($_SESSION['age']==18)
            {
               $requete='SELECT nom_jeux, genre1, genre2, age_min, prix, image, date_parution, description, acheté, total FROM `jeux` WHERE age_min>=18 ORDER BY age_min ASC';
            }

            $reponse=mysqli_query($con,$requete); //Mêmes commentaires que la page jeux.php

            if (!$reponse)
            {
              printf("Error: %s\n", mysqli_error($con));
                exit();
            }
            while($donnees=mysqli_fetch_array($reponse,MYSQLI_NUM)) //Mêmes commentaires que la page jeux.php
            {
              $_SESSION['nom_jeu'.$_SESSION['compteur']]=$donnees[0];
              $_SESSION['prix'.$_SESSION['compteur']]=$donnees[4];
              $_SESSION['image'.$_SESSION['compteur']]=$donnees[5];

              echo "<div class = 'separation'>
                  <h1>".$donnees[0]." : </h1>";
              $_SESSION['nom_jeu'.$_SESSION['compteur']]=$donnees[0];
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
                 echo "<p> Disponible : ".($donnees[9]-$donnees[8])."</p>";
              echo "</br> Age recommandé : ".$donnees[3]."+ </p>
                  </div>";
              echo "<form method='post' action='panier.php'><input type='submit' name='ajout_a".$_SESSION['compteur']."' value='Ajouter au panier'/><br/></form>
            <div class ='prix-jeux'>"; // C'est le bouton qui permet d'ajouter au panier.
            if($_SESSION['erreur_'.$_SESSION['compteur']]==1)
            {
              echo "<br /> <span class='erreur'>Il n'y en a plus de disponible</span><br />";
            }
              echo " <div class ='prix-jeux'>
                  <p> Prix : ".$donnees[4]."€ </p>";
              $_SESSION['prix_jeux'.$_SESSION['compteur']]=$donnees[4]; 
              echo "    </div>    
               </div>
               </div>";
               if(($donnees[9]-$donnees[8])==0)
        {
          $_SESSION['erreur_'.$_SESSION['compteur']]=1;
        }
               $_SESSION['compteur']++;
             }
        }
      ?>


    </div>		
  </body>
</html>
