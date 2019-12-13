<?php
session_start();
ob_start();
$cnx = mysqli_connect("localhost", "root", "", "reservationsalles");
if ( isset($_GET["idresa"]) ) {
$idresa = $_GET["idresa"];
$requete1 = "SELECT titre,description,debut,fin FROM reservations WHERE id=$idresa";
$query1 = mysqli_query($cnx, $requete1);
$resultat = mysqli_fetch_all($query1, MYSQLI_ASSOC);
$taille = count($resultat) - 1;
}
?>
<html>
<head>
<title>Info reservation</title>
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
       $i = 0;
          echo "<table border>";
          echo "<thead><tr>";
       foreach ($resultat[$taille] as $key => $value) 
          {
            echo "<th>{$key}</th>";
        }
        echo "</tr></thead>";
          echo "<tbody>";
          while ($i <= $taille) 
          {
            echo "<tr>";
            foreach ($resultat[$i] as $key => $value) 
            {
              echo "<td>{$value}</td>";
            }
            echo "</tr>";
            $i++;
          }
          echo "</tbody></table>";
      ?>
    </section>
</section>
</main>
 <?php include("footer.php"); ?>
</body>
</html>