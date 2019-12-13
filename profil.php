<?php
session_start();
?>
<html>
<head>
<title>Profil</title>
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
            if (isset($_SESSION['login']))
            {
                $connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
                $requete = "SELECT * FROM utilisateurs WHERE login='" . $_SESSION['login'] . "'";
                $query = mysqli_query($connexion, $requete);
                $resultat = mysqli_fetch_assoc($query);

                ?>

                <form class="form_site" action="profil.php" method="post">
                    <label> Login </label>
                    <input type="text" name="login" value=<?php echo $resultat['login']; ?> />
                    <label> New Password </label>
                    <input type="password" name="passwordx" />
                    <label> Confirm New Password </label>
                    <input type="password" name="passwordconf" />
                    <input name="ID" type="hidden" value=<?php echo $resultat['id']; ?> />
                    <br>
                    <input type="submit" name="modifier" value="Modifier" />
                </form>

                <?php 
                    if (isset($_POST['modifier']) ) 
                    {
                         if ($_POST["passwordx"] != $_POST["passwordconf"]) 
                         {
                             ?>
                            <p>Attention ! Mot de passe différents</p>
                        <?php
                        } 
                        elseif(isset($_POST['passwordx']) && !empty($_POST['passwordx'])){
                            $pwdx = password_hash($_POST['passwordx'], PASSWORD_BCRYPT, array('cost' => 12));
                            $updatepwd = "UPDATE utilisateurs SET password = '$pwdx' WHERE id = '" . $resultat['id'] . "'";
                            $query2 = mysqli_query($connexion, $updatepwd); # Execution de la requête;
                            header('Location:profil.php');
                        }
                        $login = $_POST["login"];
                        $req = "SELECT login FROM utilisateurs WHERE login = '$login'";
                        $req3 = mysqli_query($connexion, $req);
                        $veriflog = mysqli_fetch_all($req3);
                            if(!empty($veriflog))
                            {
                                ?>
                                <p>Login deja utilisé, requete refusé.<br /></p>
                                <?php
                            }
                        if(empty($veriflog))
                            {
                                $updatelog = "UPDATE utilisateurs SET login ='" . $_POST['login'] . "' WHERE id = '" . $resultat['id'] . "'";
                                $querylog = mysqli_query($connexion, $updatelog); # Execution de la requête;
                                $_SESSION['login']=$_POST['login'];
                                header("Location:profil.php");
                            }
                    }
                    ?>
        </section>
    <?php

    } 
    else 
    {
        ?>
        <p>Veuillez vous connecter pour accéder à votre page !</p>
        <?php
    }
    ?>
    </section>
</section>
</main>
 <?php include("footer.php"); ?>
</body>
</html>

        