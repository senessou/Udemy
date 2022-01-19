<?php
    // verification si l'image est bien recu
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

        $error = 1;

        //verification de la taille de l'image
        if($_FILES['image']['size'] <= 3000000) {

            $infoImage = pathinfo($_FILES['image']['name']);
            $extension = $infoImage['extension'];
            $extensionImage = ['png', 'gif', 'jpg', 'jpeg'];

            if(in_array($extension, $extensionImage)) {

                $adress = 'upload/'.time().rand().rand().'.'.$extension;

                move_uploaded_file($_FILES['image']['tmp_name'], $adress);

                $error = 0;
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
    <title>Hebergeur d'image</title>
    <style>
        body, html {
            margin: 0;
            font-family: Georgia;
        }
        header {
            text-align: center;
            background-color: red;
            color: white;
        }
        .contener {
            width: 500px;
            margin: auto;
            background-color: #f7f7f7;
        }
        article {
            margin-top: 50px;
            padding: 10px;
        }
        h1 {
            margin-top: 0;
            text-align: center;
        }
        #presentation_image {
            text-align: center;
        }
        #image {
            max-width: 200px;
            height: auto;
        }
        form {
            margin-top: 20px;
        }
        button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <header>
        <h1>PHOTOSHOOT</h1>
    </header>

    <!-- FORMULAIRE -->
    <div class="contener">
        <article>
            <h1>Hebergez une image</h1>
            <?php if(isset($error) && $error == 0) { ?>
                <div id="presentation_image">
                    <img src="<?=$adress?>" alt="image" id="image"><br>
                    <input type="text" value="http://localhost/projet/udemy/php_et_msql_ultime/11.Projet_hebergeur_images/<?=$adress?>">
                </div>

            <?php } else if(isset($error) && $error == 1) { ?>
                <p>Votre image ne peut pas etre envoyée. Vérifier son extension et sa taille maximun à 3Mo</p>
            <?php } ?>

            <form action="index.php" method="post" enctype="multipart/form-data">
                <div>
                    <label for="fichier">Fichier</label>
                    <input type="file" name="image" id="fichier" required>
                </div>
                <div style="text-align: center;">
                    <button type="submit">Heberger</button>
                </div>
            </form>
        </article>
    </div>
</body>
</html>