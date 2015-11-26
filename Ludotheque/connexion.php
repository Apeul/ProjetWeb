<?php session_start(); ?>
<?php
	if(isset($_POST["Connexion"]))
	{
		if(empty($_POST["Pseudo"]))
		{
			$_SESSION['pseudo_vide']=1;
			include("ludotheque.php");
			echo $_SESSION['pseudo_vide'];
			$_SESSION['pseudo_vide']=0;
		}
		else if(empty($_POST["Mdp"]))	
		{
			$_SESSION["mdp_vide"]=1;
			include("ludotheque.php");
			$_SESSION["mdp_vide"]=0;
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
				$_SESSION["pseudo_erreur"]=1;
				include("ludotheque.php");
				$_SESSION["pseudo_erreur"]=0;
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
					$_SESSION["mdp_erreur"]=1;
					include("ludotheque.php");
					$_SESSION["mdp_erreur"]=0;
				}
				else
				{
					$requete='SELECT Pseudo FROM `users` WHERE Pseudo="'.$pseudo.'"OR Email="'.$pseudo.'"';
					$reponse=mysqli_query($con,$requete);
					if (!$reponse)
					{
		  			  printf("Error: %s\n", mysqli_error($con));
		   			  exit();
					}
					$_SESSION['reponse']=mysqli_fetch_array($reponse,MYSQLI_NUM);
					include("ludotheque_c.php");
				}
			}
		}
	}
?>