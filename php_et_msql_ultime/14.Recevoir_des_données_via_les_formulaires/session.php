<?php
    session_start();
    
    if(!empty($_POST['pseudo'])) {

        $pseudo = $_POST['pseudo'];

        $_SESSION['pseudo'] = $pseudo;
    }
    
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
    <h1>Entrez votre pseudo</h1>
    <form action="session.php" method="post">
        <table>
            <tr>
                <td>Prénom</td>
                <td><input type="text" name="pseudo"></td>
            </tr>
        </table>
        <button type="submit">Se connecter</button>
    </form>

    <?php if(!empty($_SESSION['pseudo'])) { ?>

        <h2>Bienvenue <?=$_SESSION['pseudo']?></h2>
    <?php } ?>
</body>
</html>