<?php

    session_start();
    $ismdpwrong = false;
    $isIDinconnu = false;
    $ischampremplis = false;

    if ( isset($_POST['connexion']) == true && isset($_POST['login']) && strlen($_POST['login']) != 0 && isset($_POST['password']) && strlen($_POST['password']) != 0 ) {
        $connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
        $requete = "SELECT * FROM utilisateurs WHERE login ='".$_POST['login']."'";
        $query = mysqli_query($connexion, $requete);
        $resultat = mysqli_fetch_all($query);

        if ( !empty($resultat) ) {
            if ( password_verify($_POST['password'], $resultat[0][2]) )
                    {
                        $_SESSION['login'] = $_POST['login'];
                        $_SESSION['password'] = $_POST['password'];
                        header('Location:loading.php');
                    }
            else {
                $ismdpwrong = true;
            }
        }
        else {
            $isIDinconnu = true;
        }
        mysqli_close($connexion);
    }
    elseif ( isset($_POST['connexion']) == true && isset($_POST['login']) && strlen($_POST['login']) == 0 || isset($_POST['password']) && strlen($_POST['password']) == 0 ) {
        $ischampremplis = true;
    }

?>


<html>
<head>
<title>Connexion</title>
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
    if ( !isset($_SESSION['login']) ) {
    ?>
        <form class="form_site" method="post" action="connexion.php">
            <label>IDENTIFIANT</label>
            <input type="text" name="login" ><br />
            <label>MOT DE PASSE</label>
            <input type="password" name="password" ><br />
            <input class="mybutton" type="submit" value="Se connecter" name="connexion" >
        </form>
        <?php
        if ( $ismdpwrong == true ) {
        ?>
            <p>Identifiant ou mot de passe incorrect.</p>
        <?php
        }
        elseif ( $isIDinconnu == true ) {
        ?>
            <p>Cet identifiant n'exsite pas.</p>
        <?php
        }
        elseif ( $ischampremplis == true ) {
        ?>
            <p>Merci de remplir tous les champs!</p>
        <?php
        }
    }

    elseif ( isset($_SESSION['login']) ) {
    ?>
        <center><p>ERREUR<br />
        Vous êtes déjà connecté !</p></center>
    <?php
    }
    ?>
    </section>
</section>
</main>
 <?php include("footer.php"); ?>
</body>
</html>

        