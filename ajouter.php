<?php
// Connexion à la base de données
include "global.inc.php";
$voitureDAO = new voitureDAO();

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">  

        <title>ph42</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
    </head>
    <body>
        <h1>ph42</h1>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <p>Marque<br/><input type="text" name="marque"/></p>
            <p>Modele<br/><input type="text" name="modele"/></p>
            <p><input type="submit" name="submit" value="OK" /></p>
        </form>

        <?php
            $submit = isset($_POST['submit']);
            if($submit == 1){
            $marque = isset($_POST['marque']) ? $_POST['marque'] : "";
            $modele = isset($_POST['modele']) ? $_POST['modele'] : "";
    
            $voitureDAO->insert($marque, $modele);
            header("location: index.php");
            }
        ?>

        <p><a href="index.php">Revenir à la page principale</a></p>
    </body>
</html>