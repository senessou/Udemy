<?php

    $dsn = "mysql:host=localhost;dbname=formation_users;charset=utf8";
    $user = "root";
    $password = "root";

    //CONNEXION
    try {
        $bd = new PDO($dsn, $user, $password);
        echo 'Connexion';
    } catch(Exception $ex) {
        die('Erreur '.$ex->getMessage());
    }

    //AJOUTER UN NOUVEL UTILISATEUR
    if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['serie']) ) {
        $prenom = $_POST['prenom'];
        $nom    = $_POST['nom'];
        $serie  = $_POST['serie'];

        $requete = $bd->prepare('INSERT INTO users (prenom, nom, serie_prefere) VALUES ( ?, ?, ?)');
        $requete->execute([$prenom, $nom, $serie]);
        
    }

    //AFFICHER LES INFORMATIONS
    $requete = $bd->query('SELECT * FROM users');

    

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border>
        <tr>
            <th>Speudo</th>
            <th>Nom</th>
            <th>Serie preférer</th>
        </tr>
        <?php while($donne = $requete->fetch()) { ?>
            <tr>
                <td><?=$donne['prenom']?></td>
                <td><?=$donne['nom']?></td>
                <td><?=$donne['serie_prefere']?></td>
            </tr>
        <?php } $requete->closeCursor();?>
    </table>

    <h1>Ajouter un utilisateur</h1>
    <form action="index.php" method="post">
        <table>
            <tr>
                <td>Prénom</td>
                <td><input type="text" name="prenom"></td>
            </tr>
            <tr>
                <td>Nom</td>
                <td><input type="text" name="nom"></td>
            </tr>
            <tr>
                <td>serie_prefere</td>
                <td><input type="text" name="serie"></td>
            </tr>
        </table>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>