<?php
	if(isset($_POST["Connexion"]))
	{
		if(empty($_POST["Pseudo"]))
		{
					echo 	"<!DOCTYPE html>
<html>
  <head>
    <link rel='stylesheet' type='text/css' href='ludotheque.css' media='screen' />
    <meta charset = 'utf-8'>
    <title> -- Ludothèque -- </title>
  </head>

  <body>
    <div id='bandeau'>
      <div id= 'logo>
        <a href='ludotheque.html'> 
          <img src='logo.png' alt='Logo' />
        </a>
      </div>
     	<div id='titre'> JEUX </div>
     	<div id='barre'>
        <ul class='menu'>
          <li class='menu-item'><a href='ludotheque.html'>Accueil</a></li>
          <li class='menu-item'>
            <a href='ludotheque.html'>Nos Jeux</a>
            <ul class='menu sous-menu'>
              <li class='sous-menu-item'><a href='ludotheque.html'>Trier par age</a></li>
              <li class='sous-menu-item'><a href='ludotheque.html'>Trier par genre</a></li>
            </ul>
          </li>
          <li class='menu-item'><a href='contact.html'>Contact</a></li>
        </ul>
     	</div>
    </div>
    <div id='contenu'>
    	<form method='post' action='connexion.php'>
			<fieldset>
				Pseudo ou mail : <input name='Pseudo' placeholder='Pseudo/Mail' /><br />
				<span class='erreur'>Vous n'avez pas rentré de pseudo.</span><br />
				Mot de passe : <br /><input type='password' name='Mdp'/><br/ >
				<input type='submit' name='Connexion' value='Connexion'/><br />
				<a href='inscription.php'> Inscription </a>
			</fieldset>
		</form>  
      </div>
    </div> 		
		<div id='piedpage'>Ceci est le pied de page</div>
  </body>
</html>";
		}
		else if(empty($_POST["Mdp"]))	
		{
					echo 	"<!DOCTYPE html>
<html>
  <head>
    <link rel='stylesheet' type='text/css' href='ludotheque.css' media='screen' />
    <meta charset = 'utf-8'>
    <title> -- Ludothèque -- </title>
  </head>

  <body>
    <div id='bandeau'>
      <div id= 'logo>
        <a href='ludotheque.html'> 
          <img src='logo.png' alt='Logo' />
        </a>
      </div>
     	<div id='titre'> JEUX </div>
     	<div id='barre'>
        <ul class='menu'>
          <li class='menu-item'><a href='ludotheque.html'>Accueil</a></li>
          <li class='menu-item'>
            <a href='ludotheque.html'>Nos Jeux</a>
            <ul class='menu sous-menu'>
              <li class='sous-menu-item'><a href='ludotheque.html'>Trier par age</a></li>
              <li class='sous-menu-item'><a href='ludotheque.html'>Trier par genre</a></li>
            </ul>
          </li>
          <li class='menu-item'><a href='contact.html'>Contact</a></li>
        </ul>
     	</div>
    </div>
    <div id='contenu'>
    	<form method='post' action='connexion.php'>
			<fieldset>
				Pseudo ou mail : <input name='Pseudo' placeholder='Pseudo/Mail' /><br />
				Mot de passe : <br /><input type='password' name='Mdp'/><br/ >
				<span class='erreur'>Vous n'avez pas rentré de mot de passe.</span><br />
				<input type='submit' name='Connexion' value='Connexion'/><br />
				<a href='inscription.php'> Inscription </a>
			</fieldset>
		</form>  
      </div>
    </div> 		
		<div id='piedpage'>Ceci est le pied de page</div>
  </body>
</html>";
		}
		else
		{
			$pseudo=$_POST["Pseudo"];
			$mdp=$_POST["Mdp"];

			$user="Modira";
			$password="mok";
			$base="ludotheque";

			$con=mysqli_connect("localhost",$user,$password,$base);
			$retour=mysqli_select_db($con,$base);

			if(!$retour)
				echo "La connexion à la base n'a pas abouti.";

			$requete='SELECT Pseudo, Email FROM `users`';
			$reponse=mysqli_query($con,$requete);

			if (!$reponse)
			{
  			  printf("Error: %s\n", mysqli_error($con));
   			  exit();
			}
			$bp=0;
			$bm=0;

			while($donnees=mysqli_fetch_array($reponse,MYSQLI_NUM))
			{
				if($donnees[0]==$pseudo || $donnees[1]==$pseudo)
				{
					$bp++;
				}
			}

			if($bp==0)
			{
					echo 	"<!DOCTYPE html>
<html>
  <head>
    <link rel='stylesheet' type='text/css' href='ludotheque.css' media='screen' />
    <meta charset = 'utf-8'>
    <title> -- Ludothèque -- </title>
  </head>

  <body>
    <div id='bandeau'>
      <div id= 'logo>
        <a href='ludotheque.html'> 
          <img src='logo.png' alt='Logo' />
        </a>
      </div>
     	<div id='titre'> JEUX </div>
     	<div id='barre'>
        <ul class='menu'>
          <li class='menu-item'><a href='ludotheque.html'>Accueil</a></li>
          <li class='menu-item'>
            <a href='ludotheque.html'>Nos Jeux</a>
            <ul class='menu sous-menu'>
              <li class='sous-menu-item'><a href='ludotheque.html'>Trier par age</a></li>
              <li class='sous-menu-item'><a href='ludotheque.html'>Trier par genre</a></li>
            </ul>
          </li>
          <li class='menu-item'><a href='contact.html'>Contact</a></li>
        </ul>
     	</div>
    </div>
    <div id='contenu'>
    	<form method='post' action='connexion.php'>
			<fieldset>
				Pseudo ou mail : <input name='Pseudo' placeholder='Pseudo/Mail' /><br />
				<span class='erreur'>Le pseudo est incorrect.</span><br />
				Mot de passe : <br /><input type='password' name='Mdp'/><br/ >
				<input type='submit' name='Connexion' value='Connexion'/><br />
				<a href='inscription.php'> Inscription </a>
			</fieldset>
		</form>  
      </div>
    </div> 		
		<div id='piedpage'>Ceci est le pied de page</div>
  </body>
</html>";
			}
			else
			{
				$requete='SELECT Mdp FROM `Users`';
				$reponse=mysqli_query($con,$requete);
				while($donnees=mysqli_fetch_array($reponse,MYSQLI_NUM))
				{
					if($donnees[0]==$mdp)
						$bm++;
				}
				if($bm==0)
				{
					echo 	"<!DOCTYPE html>
<html>
  <head>
    <link rel='stylesheet' type='text/css' href='ludotheque.css' media='screen' />
    <meta charset = 'utf-8'>
    <title> -- Ludothèque -- </title>
  </head>

  <body>
    <div id='bandeau'>
      <div id= 'logo>
        <a href='ludotheque.html'> 
          <img src='logo.png' alt='Logo' />
        </a>
      </div>
     	<div id='titre'> JEUX </div>
     	<div id='barre'>
        <ul class='menu'>
          <li class='menu-item'><a href='ludotheque.html'>Accueil</a></li>
          <li class='menu-item'>
            <a href='ludotheque.html'>Nos Jeux</a>
            <ul class='menu sous-menu'>
              <li class='sous-menu-item'><a href='ludotheque.html'>Trier par age</a></li>
              <li class='sous-menu-item'><a href='ludotheque.html'>Trier par genre</a></li>
            </ul>
          </li>
          <li class='menu-item'><a href='contact.html'>Contact</a></li>
        </ul>
     	</div>
    </div>
    <div id='contenu'>
    	<form method='post' action='connexion.php'>
			<fieldset>
				Pseudo ou mail : <input name='Pseudo' placeholder='Pseudo/Mail' /><br />
				Mot de passe : <br /><input type='password' name='Mdp'/><br/ >
				<span class='erreur'>Le mot de passe est incorrect.</span><br />
				<input type='submit' name='Connexion' value='Connexion'/><br />
				<a href='inscription.php'> Inscription </a>
			</fieldset>
		</form>  
      </div>
    </div> 		
		<div id='piedpage'>Ceci est le pied de page</div>
  </body>
</html>";
				}
				else
				{
					$requete='SELECT Pseudo FROM `users` WHERE Pseudo="'.$pseudo.'"OR Mail="'.$pseudo.'"';
					$reponse=mysqli_query($con,$requete);
					echo 	"<!DOCTYPE html>
<html>
  <head>
    <link rel='stylesheet' type='text/css' href='ludotheque.css' media='screen' />
    <meta charset = 'utf-8'>
    <title> -- Ludothèque -- </title>
  </head>

  <body>
    <div id='bandeau'>
      <div id= 'logo>
        <a href='ludotheque.html'> 
          <img src='logo.png' alt='Logo' />
        </a>
      </div>
     	<div id='titre'> JEUX </div>
     	<div id='barre'>
        <ul class='menu'>
          <li class='menu-item'><a href='ludotheque.html'>Accueil</a></li>
          <li class='menu-item'>
            <a href='ludotheque.html'>Nos Jeux</a>
            <ul class='menu sous-menu'>
              <li class='sous-menu-item'><a href='ludotheque.html'>Trier par age</a></li>
              <li class='sous-menu-item'><a href='ludotheque.html'>Trier par genre</a></li>
            </ul>
          </li>
          <li class='menu-item'><a href='contact.html'>Contact</a></li>
        </ul>
     	</div>
    </div>
    <div id='contenu'>";
    	echo "Connexion réussi. Bienvenu(e) ".$reponse;
    	echo"
      </div>
    </div> 		
		<div id='piedpage'>Ceci est le pied de page</div>
  </body>
</html>";
				}
			}
		}
	}
?>