<header>
        <nav class="nav">
            <section id="logo">
                <a href="index.php"><img src="img/logo.png"></a>
            </section>
            <section class="undernav">
                <a href="planning.php"><img src="img/planning.png"></a>
                <a href="planning.php">Planning</a>
            </section>
            <section class="undernav">
                <a href="reservation-form.php"><img src="img/reservation.png"></a>
                <a href="reservation-form.php">Reservation</a>
            </section>
            <?php if( !isset($_SESSION['login']) ){ ?>
            <section class="undernav">
                <a href="inscription.php"><img src="img/inscript.png"></a>
                <a href="inscription.php">Inscription</a>
            </section>
            <section class="undernav">
                <a href="connexion.php"><img src="img/connect.png"></a>
                <a href="connexion.php">Connexion</a>
            </section>
            <?php } if( isset($_SESSION['login']) ){ ?>
             <section class="undernav">
                <a href="profil.php"><img src="img/profil.png"></a>
                <a href="profil.php">Profil</a>
            </section>
            <section class="undernav">
                <a href="index.php?deco"><img src="img/deconnection.png"></a>
                <a href="index.php?deco">Déconnexion</a>
            </section>
            <?php } ?>
        </nav>
    </header>
