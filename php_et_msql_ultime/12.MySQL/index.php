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
    //AJOUTER UN UTILISATEUR
    /*
    $requete = $bd->exec('INSERT INTO users (prenom, nom, serie_prefere) 
    VALUES("Mark", "Zuckerberg", "Koh-Lanta")') OR die(print_r($bd->errorInfo()));
    */

    //MODIFIER UN UTILISATEUR
    /*
    $requete = $bd->exec('UPDATE users SET serie_prefere = "les feux de l\'amour" WHERE id = 4');
    */

    //SUPPRIMER UN UTILISATEUR
    /*
    $requete = $bd->exec('DELETE FROM users WHERE id = 4');
    */

    //AJOUTER UN METIER
    /*
    $requete = $bd->exec('INSERT INTO jobs(id_user, metier) VALUES (4, "PDG")');
    */

    //LIRE LES INFORMATIONS
    /*
    $requete = $bd->query('SELECT prenom, nom, serie_prefere, metier FROM users, jobs WHERE users.id = jobs.id_user');
    */

    $requete = $bd->query('SELECT prenom, nom, serie_prefere, metier FROM users u LEFT JOIN jobs j ON u.id = j.id_user');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border>
        <tr>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Serie preférer</th>
            <th>Metier</th>
        </tr>
        <?php while($donne = $requete->fetch()) { ?>
            <tr>
                <td><?=$donne['prenom']?></td>
                <td><?=$donne['nom']?></td>
                <td><?=$donne['serie_prefere']?></td>
                <td><?=$donne['metier']?></td>
            </tr>
        <?php } $requete->closeCursor();?>
    </table>
</body>
</html>