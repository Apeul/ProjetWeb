<?php
	if(isset($_POST["Inscription"]))
	{
		if(empty($_POST["Pseudo"]))
		{
			echo "<!DOCTYPE html>
					<html>
					  <head>
					    <link rel='stylesheet' type='text/css' href='ludotheque.css' media='screen' />
					    <meta charset = 'utf-8'>
					    <title> -- Ludothèque -- </title>
					  </head>

					  <body>
					    <div id='bandeau'>
					      <div id= 'logo'>
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
					      <form method='post' action='inscription2.php'>
					        <fieldset>
					          Veuillez rentrer un pseudo : <input name='Pseudo' /><br />
					          <span class='erreur'>Vous n'avez pas rentré de pseudo. </span> <br />
					          Veuillez rentrer un email : <input name='Mail' /><br />
					          Veuillez rentrer votre date de naissance : ";
					            echo "Jour <select name='jour_naissance'>";
					            echo "<option value='NULL'>Choisir</option>";
					                         for($i=1;$i<32;$i++)
					                          {echo "<option value='".$i."'>".$i."</option>";}
					                       echo"</select>";
					            echo "Mois <select name='mois_naissance'>";
              echo "<option value='NULL'>Choisir</option>";
                         for($i=1;$i<13;$i++)
                          {echo "<option value='".$i."'>".$i."</option>";}
                       echo"</select>";
					            echo "Année <select name='annee_naissance'>";
					            echo "<option value='NULL'>Choisir</option>";
					                         for($i=1915;$i<2013;$i++)
					                         echo "<option value='".$i."'>".$i."</option>";
					                       echo"</select>";
					          echo"<br />
					          Veuillez rentrer un mot de passe : <input type='password' name='Mdp1'/><br />
					          Veuillez retaper votre mot de passe : <input type='password' name='Mdp2'/><br />
					          <input type='submit' name='Inscription' value='Inscription'/><br/>
					        </fieldset>
					      </form>
					    </div> 		
							<div id='piedpage'>Ceci est le pied de page</div>
					  </body>
					</html>";
		}
		else if(empty($_POST["Mail"]))
		{
			echo "<!DOCTYPE html>
					<html>
					  <head>
					    <link rel='stylesheet' type='text/css' href='ludotheque.css' media='screen' />
					    <meta charset = 'utf-8'>
					    <title> -- Ludothèque -- </title>
					  </head>

					  <body>
					    <div id='bandeau'>
					      <div id= 'logo'>
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
					      <form method='post' action='inscription2.php'>
					        <fieldset>
					          Veuillez rentrer un pseudo : <input name='Pseudo' /><br />
					          Veuillez rentrer un email : <input name='Mail' /><br />
					          <span class='erreur'>Vous n'avez pas rentré de mail.</span> <br />
					          Veuillez rentrer votre date de naissance : ";
					            echo "Jour <select name='jour_naissance'>";
					            echo "<option value='NULL'>Choisir</option>";
					                         for($i=1;$i<32;$i++)
					                          {echo "<option value='".$i."'>".$i."</option>";}
					                       echo"</select>";
					            echo "Mois <select name='mois_naissance'>";
              echo "<option value='NULL'>Choisir</option>";
                         for($i=1;$i<13;$i++)
                          {echo "<option value='".$i."'>".$i."</option>";}
                       echo"</select>";
					            echo "Année <select name='annee_naissance'>";
					            echo "<option value='NULL'>Choisir</option>";
					                         for($i=1915;$i<2013;$i++)
					                         echo "<option value='".$i."'>".$i."</option>";
					                       echo"</select>";
					          echo"<br />
					          Veuillez rentrer un mot de passe : <input type='password' name='Mdp1'/><br />
					          Veuillez retaper votre mot de passe : <input type='password' name='Mdp2'/><br />
					          <input type='submit' name='Inscription' value='Inscription'/><br/>
					        </fieldset>
					      </form>
					    </div> 		
							<div id='piedpage'>Ceci est le pied de page</div>
					  </body>
					</html>";
		}
		else if($_POST["jour_naissance"]=="NULL")
		{
			echo "<!DOCTYPE html>
					<html>
					  <head>
					    <link rel='stylesheet' type='text/css' href='ludotheque.css' media='screen' />
					    <meta charset = 'utf-8'>
					    <title> -- Ludothèque -- </title>
					  </head>

					  <body>
					    <div id='bandeau'>
					      <div id= 'logo'>
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
					      <form method='post' action='inscription2.php'>
					        <fieldset>
					          Veuillez rentrer un pseudo : <input name='Pseudo' /><br />
					          Veuillez rentrer un email : <input name='Mail' /><br />
					          Veuillez rentrer votre date de naissance : ";
					            echo "Jour <select name='jour_naissance'>";
					            echo "<option value='NULL'>Choisir</option>";
					                         for($i=1;$i<32;$i++)
					                          {echo "<option value='".$i."'>".$i."</option>";}
					                       echo"</select>";
					            echo "Mois <select name='mois_naissance'>";
              echo "<option value='NULL'>Choisir</option>";
                         for($i=1;$i<13;$i++)
                          {echo "<option value='".$i."'>".$i."</option>";}
                       echo"</select>";
					            echo "Année <select name='annee_naissance'>";
					            echo "<option value='NULL'>Choisir</option>";
					                         for($i=1915;$i<2013;$i++)
					                         echo "<option value='".$i."'>".$i."</option>";
					                       echo"</select>";
					            echo "<br /><span class='erreur'>Vous n'avez pas indiqué de jour. </span>";
					          echo"<br />
					          Veuillez rentrer un mot de passe : <input type='password' name='Mdp1'/><br />
					          Veuillez retaper votre mot de passe : <input type='password' name='Mdp2'/><br />
					          <input type='submit' name='Inscription' value='Inscription'/><br/>
					        </fieldset>
					      </form>
					    </div> 		
							<div id='piedpage'>Ceci est le pied de page</div>
					  </body>
					</html>";
		}
		else if($_POST["mois_naissance"]=="NULL")
		{
			echo "<!DOCTYPE html>
					<html>
					  <head>
					    <link rel='stylesheet' type='text/css' href='ludotheque.css' media='screen' />
					    <meta charset = 'utf-8'>
					    <title> -- Ludothèque -- </title>
					  </head>

					  <body>
					    <div id='bandeau'>
					      <div id= 'logo'>
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
					      <form method='post' action='inscription2.php'>
					        <fieldset>
					          Veuillez rentrer un pseudo : <input name='Pseudo' /><br />
					          Veuillez rentrer un email : <input name='Mail' /><br />
					          Veuillez rentrer votre date de naissance : ";
					            echo "Jour <select name='jour_naissance'>";
					            echo "<option value='NULL'>Choisir</option>";
					                         for($i=1;$i<32;$i++)
					                          {echo "<option value='".$i."'>".$i."</option>";}
					                       echo"</select>";
					            echo "Mois <select name='mois_naissance'>
					                    <option value='NULL'>Choisir</option>";
              echo "<option value='NULL'>Choisir</option>";
                         for($i=1;$i<13;$i++)
                          {echo "<option value='".$i."'>".$i."</option>";}
                       echo"</select>";
					            echo "Année <select name='annee_naissance'>";
					            echo "<option value='NULL'>Choisir</option>";
					                         for($i=1915;$i<2013;$i++)
					                         echo "<option value='".$i."'>".$i."</option>";
					                       echo"</select>";
					            echo "<br /><span class='erreur'>Vous n'avez pas indiqué de mois. </span>";
					          echo"<br />
					          Veuillez rentrer un mot de passe : <input type='password' name='Mdp1'/><br />
					          Veuillez retaper votre mot de passe : <input type='password' name='Mdp2'/><br />
					          <input type='submit' name='Inscription' value='Inscription'/><br/>
					        </fieldset>
					      </form>
					    </div> 		
							<div id='piedpage'>Ceci est le pied de page</div>
					  </body>
					</html>";
		}
		else if($_POST["annee_naissance"]=="NULL")
		{
			echo "<!DOCTYPE html>
					<html>
					  <head>
					    <link rel='stylesheet' type='text/css' href='ludotheque.css' media='screen' />
					    <meta charset = 'utf-8'>
					    <title> -- Ludothèque -- </title>
					  </head>

					  <body>
					    <div id='bandeau'>
					      <div id= 'logo'>
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
					      <form method='post' action='inscription2.php'>
					        <fieldset>
					          Veuillez rentrer un pseudo : <input name='Pseudo' /><br />
					          Veuillez rentrer un email : <input name='Mail' /><br />
					          Veuillez rentrer votre date de naissance : ";
					            echo "Jour <select name='jour_naissance'>";
					            echo "<option value='NULL'>Choisir</option>";
					                         for($i=1;$i<32;$i++)
					                          {echo "<option value='".$i."'>".$i."</option>";}
					                       echo"</select>";
					            echo "Mois <select name='mois_naissance'>";
              echo "<option value='NULL'>Choisir</option>";
                         for($i=1;$i<13;$i++)
                          {echo "<option value='".$i."'>".$i."</option>";}
                       echo"</select>";
					            echo "Année <select name='annee_naissance'>";
					            echo "<option value='NULL'>Choisir</option>";
					                         for($i=1915;$i<2013;$i++)
					                         echo "<option value='".$i."'>".$i."</option>";
					                       echo"</select>";
					            echo "<br /><span class='erreur'>Vous n'avez pas indiqué d'année</span>";
					          echo"<br />
					          Veuillez rentrer un mot de passe : <input type='password' name='Mdp1'/><br />
					          Veuillez retaper votre mot de passe : <input type='password' name='Mdp2'/><br />
					          <input type='submit' name='Inscription' value='Inscription'/><br/>
					        </fieldset>
					      </form>
					    </div> 		
							<div id='piedpage'>Ceci est le pied de page</div>
					  </body>
					</html>";
		}
		else if(empty($_POST["Mdp1"]))
		{
			echo "<!DOCTYPE html>
					<html>
					  <head>
					    <link rel='stylesheet' type='text/css' href='ludotheque.css' media='screen' />
					    <meta charset = 'utf-8'>
					    <title> -- Ludothèque -- </title>
					  </head>

					  <body>
					    <div id='bandeau'>
					      <div id= 'logo'>
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
					      <form method='post' action='inscription2.php'>
					        <fieldset>
					          Veuillez rentrer un pseudo : <input name='Pseudo' /><br />
					          Veuillez rentrer un email : <input name='Mail' /><br />
					          Veuillez rentrer votre date de naissance : ";
					            echo "Jour <select name='jour_naissance'>";
					            echo "<option value='NULL'>Choisir</option>";
					                         for($i=1;$i<32;$i++)
					                          {echo "<option value='".$i."'>".$i."</option>";}
					                       echo"</select>";
					            echo "Mois <select name='mois_naissance'>";
              echo "<option value='NULL'>Choisir</option>";
                         for($i=1;$i<13;$i++)
                          {echo "<option value='".$i."'>".$i."</option>";}
                       echo"</select>";
					            echo "Année <select name='annee_naissance'>";
					            echo "<option value='NULL'>Choisir</option>";
					                         for($i=1915;$i<2013;$i++)
					                         echo "<option value='".$i."'>".$i."</option>";
					                       echo"</select>";
					          echo"<br />
					          Veuillez rentrer un mot de passe : <input type='password' name='Mdp1'/><br />
					          <span class='erreur'>Vous n'avez pas rentré de mot de passe.</span> <br />
					          Veuillez retaper votre mot de passe : <input type='password' name='Mdp2'/><br />
					          <input type='submit' name='Inscription' value='Inscription'/><br/>
					        </fieldset>
					      </form>
					    </div> 		
							<div id='piedpage'>Ceci est le pied de page</div>
					  </body>
					</html>";
		}
		else if(empty($_POST["Mdp2"]))
		{
			echo "<!DOCTYPE html>
					<html>
					  <head>
					    <link rel='stylesheet' type='text/css' href='ludotheque.css' media='screen' />
					    <meta charset = 'utf-8'>
					    <title> -- Ludothèque -- </title>
					  </head>

					  <body>
					    <div id='bandeau'>
					      <div id= 'logo'>
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
					      <form method='post' action='inscription2.php'>
					        <fieldset>
					          Veuillez rentrer un pseudo : <input name='Pseudo' /><br />
					          Veuillez rentrer un email : <input name='Mail' /><br />
					          Veuillez rentrer votre date de naissance : ";
					            echo "Jour <select name='jour_naissance'>";
					            echo "<option value='NULL'>Choisir</option>";
					                         for($i=1;$i<32;$i++)
					                          {echo "<option value='".$i."'>".$i."</option>";}
					                       echo"</select>";
					            echo "Mois <select name='mois_naissance'>";
              echo "<option value='NULL'>Choisir</option>";
                         for($i=1;$i<13;$i++)
                          {echo "<option value='".$i."'>".$i."</option>";}
                       echo"</select>";
					            echo "Année <select name='annee_naissance'>";
					            echo "<option value='NULL'>Choisir</option>";
					                         for($i=1915;$i<2013;$i++)
					                         echo "<option value='".$i."'>".$i."</option>";
					                       echo"</select>";
					          echo"<br />
					          Veuillez rentrer un mot de passe : <input type='password' name='Mdp1'/><br />
					          Veuillez retaper votre mot de passe : <input type='password' name='Mdp2'/><br />
					          <span class='erreur'>Vous n'avez pas vérifié votre mot de passe.</span> <br />
					          <input type='submit' name='Inscription' value='Inscription'/><br/>
					        </fieldset>
					      </form>
					    </div> 		
							<div id='piedpage'>Ceci est le pied de page</div>
					  </body>
					</html>";
		}
		else if($_POST["Mdp1"]!=$_POST["Mdp2"])
		{
			echo "<!DOCTYPE html>
					<html>
					  <head>
					    <link rel='stylesheet' type='text/css' href='ludotheque.css' media='screen' />
					    <meta charset = 'utf-8'>
					    <title> -- Ludothèque -- </title>
					  </head>

					  <body>
					    <div id='bandeau'>
					      <div id= 'logo'>
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
					      <form method='post' action='inscription2.php'>
					        <fieldset>
					          Veuillez rentrer un pseudo : <input name='Pseudo' /><br />
					          Veuillez rentrer un email : <input name='Mail' /><br />
					          Veuillez rentrer votre date de naissance : ";
					            echo "Jour <select name='jour_naissance'>";
					            echo "<option value='NULL'>Choisir</option>";
					                         for($i=1;$i<32;$i++)
					                          {echo "<option value='".$i."'>".$i."</option>";}
					                       echo"</select>";
					            echo "Mois <select name='mois_naissance'>";
              echo "<option value='NULL'>Choisir</option>";
                         for($i=1;$i<13;$i++)
                          {echo "<option value='".$i."'>".$i."</option>";}
                       echo"</select>";
					            echo "Année <select name='annee_naissance'>";
					            echo "<option value='NULL'>Choisir</option>";
					                         for($i=1915;$i<2013;$i++)
					                         echo "<option value='".$i."'>".$i."</option>";
					                       echo"</select>";
					          echo"<br />
					          Veuillez rentrer un mot de passe : <input type='password' name='Mdp1'/><br />
					          Veuillez retaper votre mot de passe : <input type='password' name='Mdp2'/><br />
					          <span class='erreur'>Les mots de passe ne correspondent pas.</span> <br />
					          <input type='submit' name='Inscription' value='Inscription'/><br/>
					        </fieldset>
					      </form>
					    </div> 		
							<div id='piedpage'>Ceci est le pied de page</div>
					  </body>
					</html>";
		}
		else
		{
			$pseudo=$_POST["Pseudo"];
			$mail=$_POST["Mail"];
			$jour_naissance=$_POST["jour_naissance"];
			$mois_naissance=$_POST["mois_naissance"];
			$annee_naissance=$_POST["annee_naissance"];
			$date_naissance=$annee_naissance.'-'.$mois_naissance.'-'.$jour_naissance;
			$date=date('Y-m-d');
			$mdp=$_POST["Mdp1"];

			$user="Modira";
			$password="mok";
			$base="ludotheque";

			$con=mysqli_connect("localhost",$user,$password,$base);
			$retour=mysqli_select_db($con,$base);

			if(!$retour)
				echo "La connexion à la base n'a pas abouti.";

			$requete="INSERT INTO `users` Values('$pseudo','$mail','$mdp','$date','$date_naissance')";
			$reponse=mysqli_query($con,$requete);

			if (!$reponse)
			{
  			  printf("Error: %s\n", mysqli_error($con));
   			  exit();
			}
			echo "<!DOCTYPE html>
					<html>
					  <head>
					    <link rel='stylesheet' type='text/css' href='ludotheque.css' media='screen' />
					    <meta charset = 'utf-8'>
					    <title> -- Ludothèque -- </title>
					  </head>

					  <body>
					    <div id='bandeau'>
					      <div id= 'logo'>
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
							Félicitations, vous avez réussi à vous inscrire.
					    </div> 		
							<div id='piedpage'>Ceci est le pied de page</div>
					  </body>
					</html>";			

		}
	}