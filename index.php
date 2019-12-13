<?php session_start(); ?>
<html>
<head>
<title>Reservation salles</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php include("header.php"); ?>
<main>
<section class="leftsidebar">
     <section class="quote">
        <h1>Nos salles</h1>
		<img src="img/sallecoding.jpg">
	</section>
	<section class="sidebartable">
		<h1>Salles coding</h1>
        <img src="img/coding.jpg">
		
	</section>
	<section class="sidebartable">
		<h1>Salles de reunion</h1>
          <img src="img/reunion.jpg">
		
	</section>
    <section class="sidebartable">
    	<h1>Salle gaming</h1>
        <img src="img/gaming.jpg">
    	
    </section>
</section>
<section class="formulaire">
	<section class="pinright">
		<img src="img/pin.png">
		<img src="img/pin.png">
	</section>
    <section>
        <?php
        date_default_timezone_set('Europe/Paris');
        if(isset($_SESSION['login']))
        {
            ?>
            <?php
            echo "Nous sommes le ".date('d-m-Y')." et il est ".date('H:i:s');
            ?>
            <?php echo "&nbsp Bonjour ".$_SESSION["login"]." &nbsp" ?>
            <p>Vous êtes connecté en tant qu'utilisateur. Accédez à votre page de <a href="profil.php">PROFIL</a></p>
            <p>En tant que membre inscrit vous pouvez accedez au : <a href="reservation-form.php">FORMULAIRE DE RESERVATION</a> 
            <p>Acceder au : <a href="planning.php">Planning</a></p>
            <form class="form_site" action="index.php" method="get">
            <input class="mybutton"  name="deco" value="Deconnexion" type="submit" />
            </form>
            <?php
        }
        else
        {
            ?>
            <?php
            echo "Nous sommes le ".date('d-m-Y')." et il est ".date('H:i:s');
            ?>
            <p>Bonjour Guest</p>
            <p>Pour pouvoir accéder à votre profil veuillez visiter la page : <a href="connexion.php">CONNEXION</a></p>
            <p>Pas de compte ? Inscrivez-vous en remplissant le formulaire : <a href="inscription.php">INSCRIPTION</a></p>
        <?php
        }
        
        if (isset($_GET["deco"]))
        {
         session_unset();
         session_destroy();
         header('Location:index.php');
        }
        ?>
    </section>
</section>
</main>
 <?php include("footer.php"); ?>
</body>
</html>

		