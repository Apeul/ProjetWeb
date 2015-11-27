<?php
if(!isset($_SESSION))
{   session_start();
    $_SESSION['pseudo_vide']=0;
    $_SESSION['mdp_vide']=0;
    $_SESSION['pseudo_erreur']=0;
    $_SESSION['mdp_erreur']=0;
}?>

<?php
	if(isset($_GET['age']))
	{
		if($_GET['age']==3)
		{
			$_SESSION['age']=$_GET['age'];
			include("agetri.php");
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
	if(isset($_GET['genre']))	
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