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
              <li class="sous-menu-item"><a href="agetri.php">Trier par age</a></li>
              <li class="sous-menu-item"><a href="genretri.php">Trier par genre</a></li>
            </ul>
          </li>
          <li class="menu-item"><a href="contact.php">Contact</a></li>
        </ul>
     	</div>
    </div>
    <div id="contenu">
      <form method="post" action="inscription2.php">
        <fieldset>
          Veuillez rentrer un pseudo : <input name="Pseudo" /><br /> <!-- Le principe pour l'inscription est exactement le même que pour le bloc de connexion. -->
          <?php
            if (session_status() != PHP_SESSION_NONE)
            {
              if($_SESSION['pseudo_vide']==1) 
              {
                echo "<span class='erreur'>Vous n'avez pas rentré de pseudo.</span><br />";
              }
              else if($_SESSION["pseudo_erreur"]==1)
              {
                 echo "<span class='erreur'>Le pseudo est déjà choisi.</span><br />";
              }
           }?>
          Veuillez rentrer un email : <input name="Mail" /><br />
          <?php
            if (session_status() != PHP_SESSION_NONE)
            {
              if($_SESSION['mail_vide']==1)
              {
                echo "<span class='erreur'>Vous n'avez pas rentré de mail.</span><br />";
              }
          ?>
          <?php
            if(session_status() != PHP_SESSION_NONE)
              if($_SESSION['mail_erreur']==1)
              {
                 echo "<span class='erreur'>Le mail est déjà choisi.</span><br />";
              }
           }?>
          Veuillez rentrer votre date de naissance :
          <?php
            echo "Jour <select name='jour_naissance'>";
            echo "<option value='NULL'>Choisir</option>";
                         for($i=1;$i<32;$i++)
                          {echo "<option value='".$i."'>".$i."</option>";}
                       echo"</select>";
            echo " Mois <select name='mois_naissance'>";
              echo "<option value='NULL'>Choisir</option>";
                         for($i=1;$i<13;$i++)
                          {echo "<option value='".$i."'>".$i."</option>";}
                       echo"</select>";
            echo " Année <select name='annee_naissance'>";
            echo "<option value='NULL'>Choisir</option>";
                         for($i=1915;$i<2013;$i++)
                         echo "<option value='".$i."'>".$i."</option>";
                       echo"</select>";
            if (session_status() != PHP_SESSION_NONE)
            {
              if($_SESSION['jour_vide']==1)
              {
                echo "<span class='erreur'><br />Vous n'avez pas rentré de jour.</span><br />";
              }
              if($_SESSION["mois_vide"]==1)
              {
                 echo "<span class='erreur'><br />Vous n'avez pas rentré de mois.</span><br />";
              }
              if($_SESSION["annee_vide"]==1)
              {
                 echo "<span class='erreur'><br />Vous n'avez pas rentré d'année.</span><br />";
              }
           }?>
          <br />
          Veuillez rentrer un mot de passe : <input type="password" name="Mdp1"/><br />
          <?php
            if (session_status() != PHP_SESSION_NONE)
            {
              if($_SESSION['mdp1_vide']==1)
              {
                echo "<span class='erreur'>Vous n'avez pas rentré de mot de passe.</span><br />";
              }
           }?>
          Veuillez retaper votre mot de passe : <input type="password" name="Mdp2"/><br />
          <?php
            if (session_status() != PHP_SESSION_NONE)
            {
              if($_SESSION['mdp2_vide']==1)
              {
                echo "<span class='erreur'>Vous n'avez pas rentré de mot de passe.</span><br />";
              }
              else if($_SESSION['mdp_faux']==1)
              {
                echo "<span class='erreur'>Les mots de passe ne correspondent pas.</span><br />";
              }
           }?>
          <input type="submit" name="Inscription" value="Inscription"/><br/>
        </fieldset>
      </form>
    </div> 		
  </body>
</html>