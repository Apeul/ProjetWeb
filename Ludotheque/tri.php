<?php
if(!isset($_SESSION))
{   session_start();
    $_SESSION['pseudo_vide']=0;
    $_SESSION['mdp_vide']=0;
    $_SESSION['pseudo_erreur']=0;
    $_SESSION['mdp_erreur']=0;
}?>

<?php
	if(isset($_GET['age'])) //Si le joueur a cliqué sur un des boutons pour le tri des ages.
	{
		if($_GET['age']==3) //C'est bien un get qu'on utilise, c'est plus simple que si on avait utilisé un post.
		{
			$_SESSION['age']=$_GET['age']; //On sait à la page agetri.php qu'on a cliqué sur le bouton 3.
			include("agetri.php"); //On redirige vers la page.
		}
		else if($_GET['age']==7)
		{
			$_SESSION['age']=$_GET['age'];
			include("agetri.php");
		}
		else if($_GET['age']==12)
		{
			$_SESSION['age']=$_GET['age'];
			include("agetri.php");
		}
		else if($_GET['age']==18)
		{
			$_SESSION['age']=$_GET['age'];
			include("agetri.php");
		}
	}
	if(isset($_GET['genre'])) //Pareil qu'au dessus.
	{
		if($_GET['genre']=='rpg')
		{
			$_SESSION['genre']=$_GET['genre'];
			include("genretri.php");
		}
		else if($_GET['genre']=='action')
		{
			$_SESSION['genre']=$_GET['genre'];
			include("genretri.php");
		}
		else if($_GET['genre']=='strategie')
		{
			$_SESSION['genre']=$_GET['genre'];
			include("genretri.php");
		}
		else if($_GET['genre']=='plateforme')
		{
			$_SESSION['genre']=$_GET['genre'];
			include("genretri.php");
		}
		else if($_GET['genre']=='fps')
		{
			$_SESSION['genre']=$_GET['genre'];
			include("genretri.php");
		}
	}
?>