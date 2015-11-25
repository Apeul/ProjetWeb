<?php
	if(isset($_POST["Connexion"]))
	{
		if(empty($_POST["Pseudo"]))
		{
					echo 	"<!DOCTYPE html>
							<html>
								<head>
									<meta charset='utf-8'>
									<title> Connexion </title>
								</head>
								<body>
									<form method='post' action='connexion.php'>
										<fieldset>
											<input name='Pseudo' placeholder='Pseudo/Mail' /><br />
											Vous n'avez pas rentré de pseudo.<br />
											<input type='password' name='Mdp'/><br/ >
											<input type='submit' name='Connexion' value='Connexion'/><br />
											<a href=''> Inscription </a>
										</fieldset>
									</form>
								</body>
							</html>";
		}
		else if(empty($_POST["Mdp"]))	
		{
					echo 	"<!DOCTYPE html>
							<html>
								<head>
									<meta charset='utf-8'>
									<title> Connexion </title>
								</head>
								<body>
									<form method='post' action='connexion.php'>
										<fieldset>
											<input name='Pseudo' placeholder='Pseudo/Mail' /><br />
											<input type='password' name='Mdp'/><br/ >
											Vous n'avez pas rentré de mot de passe.<br />
											<input type='submit' name='Connexion' value='Connexion'/><br />
											<a href=''> Inscription </a>
										</fieldset>
									</form>
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
									<meta charset='utf-8'>
									<title> Connexion </title>
								</head>
								<body>
									<form method='post' action='connexion.php'>
										<fieldset>
											<input name='Pseudo' placeholder='Pseudo/Mail' /><br />
											Le pseudo est incorrect.<br />
											<input type='password' name='Mdp'/><br/ >
											<input type='submit' name='Connexion' value='Connexion'/><br />
											<a href=''> Inscription </a>
										</fieldset>
									</form>
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
									<meta charset='utf-8'>
									<title> Connexion </title>
								</head>
								<body>
									<form method='post' action='connexion.php'>
										<fieldset>
											<input name='Pseudo' placeholder='Pseudo/Mail' /><br />
											<input type='password' name='Mdp'/><br/ >
											Le mot de passe est incorrect.<br />
											<input type='submit' name='Connexion' value='Connexion'/><br />
											<a href=''> Inscription </a>
										</fieldset>
									</form>
								</body>
							</html>";
				}
				else
				{
					$requete='SELECT Pseudo FROM `users` WHERE Pseudo="'.$pseudo.'"OR Mail="'.$pseudo.'"';
					$reponse=mysqli_query($con,$requete);
					echo "Connexion réussi. Bienvenu(e) ".$reponse;
				}
			}
		}
	}
?>