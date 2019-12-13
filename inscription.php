<?php session_start() ?>


<html>
<head>
<title>Veigar City - inscription</title>
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
            if (isset($_SESSION["login"])) 
            {
                echo "Bonjour, " . $_SESSION["login"] . " vous êtes déja connecté impossible de s'inscrire.<br />";
                ?>
                    <form action="index.php" method="post">
                        <input name="deco" value="Deconnexion" type="submit" />
                    </form>
            <?php
            } 
            else 
            {
                ?>
                <article><h1>Veuillez rentrer vos informations</h1></article>
                    <form class="form_site" action="inscription.php" method="post">
                        <label>Login</label>
                        <input type="text" name="login" required>
                        <label>Password</label>
                        <input type="password" name="mdp" required>
                        <label>Password confirmation</label>
                        <input type="password" name="mdpval" required>
                        <br />
                        <input class="mybutton"  type="submit" value="S'inscrire" name="valider">
                    </form>
                <?php

                if ( isset($_POST["valider"]) )
                {
                    $login = $_POST["login"];
                    $mdp = password_hash($_POST["mdp"], PASSWORD_BCRYPT, array('cost' => 12));
                    $connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
                    $requete3 = "SELECT login FROM utilisateurs WHERE login = '$login'";
                    $query3 = mysqli_query($connexion, $requete3);
                    $resultat3 = mysqli_fetch_all($query3);

                    if (!empty($resultat3)) 
                    {
                    ?>
                        <p>Ce Login est déjà prit</p>
                    <?php
                    }
                    elseif ($_POST["mdp"] != $_POST["mdpval"]) 
                    {
                    ?>
                        <p>Attention ! Mot de passe différents</p>
                    <?php
                    }
                    else 
                    {
                        $requete = "INSERT INTO utilisateurs (login, password) VALUES ('$login','$mdp')";
                        $query = mysqli_query($connexion, $requete);
                        header('Location:connexion.php');
                    }
                }
            }
            ?>
    </section>
</section>
</main>
 <?php include("footer.php"); ?>
</body>
</html>
