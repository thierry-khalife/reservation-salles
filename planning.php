<?php 
session_start();
$connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
$requete = "SELECT login, titre, description, DATE_FORMAT(debut, \"%T\"), debut, DATE_FORMAT(fin, \"%T\"), fin, DATE_FORMAT(debut, \"%W\") FROM reservations LEFT JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur";
$query = mysqli_query($connexion, $requete);
$resultat = mysqli_fetch_all($query);
?>
<html>
<head>
<title>Planning</title>
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
        <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Lundi</th>
                        <th>Mardi</th>
                        <th>Mercredi</th>
                        <th>Jeudi</th>
                        <th>Vendredi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
function isdateok($heurecasebegin, $heurecaseend, $lecturebdd, $jour) {
    $k = 0;
    while ( $k < sizeof($lecturebdd) ) {
        $datecasebegin = date( 'H:i:s', strtotime($heurecasebegin) );
        $datecaseend = date( 'H:i:s', strtotime($heurecaseend) );
        $DateBegin = date( 'H:i:s', strtotime($lecturebdd[$k][3]) );
        $DateEnd = date( 'H:i:s', strtotime($lecturebdd[$k][5]) );
        if ( ($datecasebegin == $DateBegin) && $lecturebdd[$k][7] == $jour || ($datecaseend == $DateEnd) && $lecturebdd[$k][7] == $jour ) {
            return true;
        }
        $k++;
    }
}
$i = 0;
$j = 0;
while ( $i < 11 ) {
    if ( $i == 0 ) {
        $heured = "08:00:00";
        $heuref = "09:00:00";
    }
    if ( $i == 1 ) {
        $heured = "09:00:00";
        $heuref = "10:00:00";
    }
    if ( $i == 2 ) {
        $heured = "10:00:00";
        $heuref = "11:00:00";
    }
    if ( $i == 3 ) {
        $heured = "11:00:00";
        $heuref = "12:00:00";
    }
    if ( $i == 4 ) {
        $heured = "12:00:00";
        $heuref = "13:00:00";
    }
    if ( $i == 5 ) {
        $heured = "13:00:00";
        $heuref = "14:00:00";
    }
    if ( $i == 6 ) {
        $heured = "14:00:00";
        $heuref = "15:00:00";
    }
    if ( $i == 7 ) {
        $heured = "15:00:00";
        $heuref = "16:00:00";
    }
    if ( $i == 8 ) {
        $heured = "16:00:00";
        $heuref = "17:00:00";
    }
    if ( $i == 9 ) {
        $heured = "17:00:00";
        $heuref = "18:00:00";
    }
    if ( $i == 10 ) {
        $heured = "18:00:00";
        $heuref = "19:00:00";
    }
?>
    <tr>
        <?php
        while ($j < 6) {
            if ( $j == 1 ) {
                $jour = "Monday";
            }
            if ( $j == 2 ) {
                $jour = "Tuesday";
            }
            if ( $j == 3 ) {
                $jour = "Wednesday";
            }
            if ( $j == 4 ) {
                $jour = "Thursday";
            }
            if ( $j == 5 ) {
                $jour = "Friday";
            }
            if ( $j == 0 ) {
        ?>
            <td class="cheures">
            <?php
                if ($i == 0) {
                    echo "08h00 - 09h00";
                }
                elseif ($i == 1) {
                    echo "09h00 - 10h00";
                }
                elseif ($i == 2) {
                    echo "10h00 - 11h00";
                }
                elseif ($i == 3) {
                    echo "11h00 - 12h00";
                }
                elseif ($i == 4) {
                    echo "12h00 - 13h00";
                }
                elseif ($i == 5) {
                    echo "13h00 - 14h00";
                }
                elseif ($i == 6) {
                    echo "14h00 - 15h00";
                }
                elseif ($i == 7) {
                    echo "15h00 - 16h00";
                }
                elseif ($i == 8) {
                    echo "16h00 - 17h00";
                }
                elseif ($i == 9) {
                    echo "17h00 - 18h00";
                }
                elseif ($i == 10) {
                    echo "18h00 - 19h00";
                }
            }
            ?>
            </td>
            <?php
            if ( $j > 0 ) {
            ?>
            <?php
                $m = 0;
                while ( $m < 6 ) {
                    if ( $j == $m ) {
                        $l = 0;
                        while ( $l < 11 ) {
                            if ( $i == $l ) {
                                $isokevent = isdateok($heured, $heuref, $resultat, $jour);
                                if ( $isokevent == true ) {
                                    $requeteevent= "SELECT login, titre FROM reservations LEFT JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur WHERE DATE_FORMAT(debut, \"%T\")=\"$heured\" AND DATE_FORMAT(debut, \"%W\")=\"$jour\" OR DATE_FORMAT(fin, \"%T\")=\"$heuref\" AND DATE_FORMAT(debut, \"%W\")=\"$jour\"";
                                    $getidresa="SELECT id FROM reservations WHERE DATE_FORMAT(debut, \"%T\")=\"$heured\" AND DATE_FORMAT(debut, \"%W\")=\"$jour\" OR DATE_FORMAT(fin, \"%T\")=\"$heuref\" AND DATE_FORMAT(debut, \"%W\")=\"$jour\"";
                                    $queryevent = mysqli_query($connexion, $requeteevent);
                                    $queryresa = mysqli_query($connexion, $getidresa);
                                    $resultatevent = mysqli_fetch_all($queryevent);
                                    $resultatresa = mysqli_fetch_all($queryresa);
                                    $idresa = $resultatresa[0][0];
                                    echo "<td>Titre: ".$resultatevent[0][1]."<br />Organisateur: ".$resultatevent[0][0]."<br /><a href=\"reservation.php?idresa=".$idresa."\">Plus d'infos</a></td>";
                                }
                                else {
                                    echo "<td>"."<a href=\"reservation-form.php\"><div>Disponible</div></a>"."</td>";
                                }
                            unset($isokevent);
                            }
                            $l++;
                        }
                    }
                    $m++;
                }
                ?>
            <?php
            }
            $j++;
        }
        $j = 0;
        $i++;
} ?>
</tr>
</tbody>
</table>
    </section>
</section>
</main>
 <?php include("footer.php"); ?>
</body>
</html>

		