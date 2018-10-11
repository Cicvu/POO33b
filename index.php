<?php
include 'global.inc.php';
// Instanciation du DAO des voitures
$voitureDAO = new voitureDAO();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>po33</title>
<link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>
<body>
<h1>po33</h1>
<h2>Toutes les voitures</h2>
<?php
$voitures = $voitureDAO->findAll();
echo "<table>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Marque</th>";
echo "<th>Modèle</th>";
echo "<th></th>";
echo "<th></th>";
echo "</tr>";
foreach ($voitures as $voiture) {
echo "<tr>";
echo "<td>".$voiture->get_id()."</td>";
echo "<td>".$voiture->get_marque()."</td>";
echo "<td>".$voiture->get_modele()."</td>";
echo "<td><a href=modifier.php?id=" . $voiture->get_id() . ">Modifier</a></td>";
echo "<td><a href=supprimer.php?id=" . $voiture->get_id() . ">Supprimer</a></td>";
echo "</tr>";
} echo "</table>";
?>
<p><a href="ajouter.php">Ajouter</a></p>
<h2>La voiture dont l'ID est 5</h2>
<?php
$voiture = $voitureDAO->find(5);
echo "<table>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Marque</th>";
echo "<th>Modèle</th>";
echo "</tr>";
echo "<tr>";
echo "<td>".$voiture->get_id()."</td>";
echo "<td>".$voiture->get_marque()."</td>";
echo "<td>".$voiture->get_modele()."</td>";
echo "</tr>";
echo "</table>";
?>
<p><a href="pdf.php">Génération du tableau en PDF</a></p>
<?php
        if (file_exists('lib/outfile/voitures.pdf')) {
            echo"<p><a href='lib/outfile/voitures.pdf'>La liste</a></p>";
        }
?>
</body>
</html>