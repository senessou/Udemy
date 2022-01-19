<?php
    if(isset($_POST['prenom']) && isset($_POST['nom '])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);

        echo 'Bonjour '.$prenom.' '. $nom .'!';
    }
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

        if($_FILES['image']['size'] <= 3000000) {
            $informatioImg = pathinfo($_FILES['image']['name']);

            $extension = $informatioImg['extension'];
            $extensionImg = ['png', 'gif', 'jpg', 'jpeg'];

            if(in_array($extension, $extensionImg)) {

                move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.time().rand().rand().'.'.$extension);

                echo 'Envoi Bien réussi';
            }
        }
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
    <form action="index.php" method="post" enctype="multipart/form-data">
        <h1>Formulaire</h1>
        <table>
            <tr>
                <td>Prenom</td>
                <td><input type="text" name="prenom"></td>
            </tr>
            <tr>
                <td>Nom</td>
                <td><input type="text" name="nom"></td>
            </tr>
            <tr>
                <td><label for="file">Fichiers</label></td>
                <td><input type="file" name="image" id="file"></td>
            </tr>
        </table>
        
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>