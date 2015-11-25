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
        <a href="ludotheque.html"> 
          <img src="logo.png" alt="Logo" />
        </a>
      </div>
     	<div id="titre"> JEUX </div>
     	<div id="barre">
        <ul class="menu">
          <li class="menu-item"><a href="ludotheque.html">Accueil</a></li>
          <li class="menu-item">
            <a href="ludotheque.html">Nos Jeux</a>
            <ul class="menu sous-menu">
              <li class="sous-menu-item"><a href="ludotheque.html">Trier par age</a></li>
              <li class="sous-menu-item"><a href="ludotheque.html">Trier par genre</a></li>
            </ul>
          </li>
          <li class="menu-item"><a href="contact.html">Contact</a></li>
        </ul>
     	</div>
    </div>
    <div id="contenu">
      <form method="post" action="inscription.php">
        <fieldset>
          Veuillez rentrer un pseudo : <input name="Pseudo" /><br />
          Veuillez rentrer un email : <input name="Mail" /><br />
          Veuillez rentrer votre date de naissance :
          <?php
            echo "Jour <select name='jour_naissance'>";
                         for($i=1;$i<32;$i++)
                          {echo "<option value='".$i."'>".$i."</option>";}
                       echo"</select>";
            echo "Mois <select name='mois_naissance'>
                    <option value='Janvier'>Janvier</option><option value='Février'>Février</option><option value='Mars'>Mars</option><option value='Avril'>Avril</option><option value='Mai'>Mai</option><option value='Juin'>Juin</option><option value='Juillet'>Juillet</option><option value='Août'>Août</option><option value='Septembre'>Septembre</option><option value='Octobre'>Octobre</option><option value='Novembre'>Novembre</option><option value='Décembre'>Décembre</option>
                  </select>";
            echo "Année <select name='annee_naissance'>";
                         for($i=1915;$i<2013;$i++)
                         echo "<option value='".$i."'>".$i."</option>";
                       echo"</select>";
          ?>
          <br />
          Veuillez rentrer un mot de passe : <input type="password" name="Mdp1"/><br />
          Veuillez retaper votre mot de passe : <input type="password" name="Mdp2"/><br />
          <input type="submit" name="Inscription" value="Inscription"/><br/>
        </fieldset>
      </form>
    </div> 		
		<div id="piedpage">Ceci est le pied de page</div>
  </body>
</html>