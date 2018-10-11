<?php

include "global.inc.php";
$voitureDAO = new voitureDAO();
$id = NULL;
$id = isset($_GET['id']) ? $_GET['id'] : $_POST['id'];

 $submit = isset($_POST['submit']);
        
if($submit == 1){
    $marque = isset($_POST['marque']) ? $_POST['marque'] : "";
    $modele = isset($_POST['modele']) ? $_POST['modele'] : "";
    $id = isset($_POST['id']) ? $_POST['id'] : "";

    $voitureDAO->update($id, $marque, $modele);
    header("location: index.php");
} else {
    $voiture = $voitureDAO->find($id);
}


?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">  

        <title>ph33</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
    </head>
    <body>
        <h1>p033</h1> 
           <form action="modifier.php" method="post">
            <p>Marque <input type="text" name="marque" value="<?php echo $voiture->get_marque() ?>"/></p>
            <p>Modele <input type="text" name="modele" value="<?php echo $voiture->get_modele() ?>"/></p>
            <p><input type="hidden" name="id" value="<?php echo $voiture->get_id() ?>"/></p>
            <p><input type="submit" name="submit" value="OK" /></p>
            
        </form>

		<p>Revenir a la <a href="index.php">page d'acceuil</a></p>
    </body>
</html>