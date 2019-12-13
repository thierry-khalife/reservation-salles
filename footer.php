  <footer>
        <nav class="navfooter">
            <a href="index.php">Accueil</a>
            <?php if(!isset($_SESSION['login'])){ ?>
            <a href="inscription.php">Inscription</a>
            <a href="connexion.php">Connexion</a>
            <?php } if(isset($_SESSION['login'])){ ?>
            <a href="profil.php">Profil</a>
            <?php } ?>
            <a href="planning.php">Planning</a>
            <a href="reservation-form.php">Reservation</a>
        </nav>
        <article>
            <p>Copyright 2019 Coding School | All Rights Reserved | Project by Thierry, Clément & Gregory.</p>
        </article>
    </footer>
