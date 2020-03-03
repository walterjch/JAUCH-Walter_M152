<?php 
require_once "functions.inc.php";


$titrePost = filter_input(INPUT_POST, 'titrePost', FILTER_SANITIZE_STRING);
$files = $_FILES['upload'];
$uploads_dir = './media';
if (!empty($files)) {
    saveFiles($files, $uploads_dir);
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" type="text/css" href="css/style.css" /> -->
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.2.7/dist/css/uikit.min.css" />  

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.7/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.7/dist/js/uikit-icons.min.js"></script>

    <title>Portfolio - Ajoutez un post !</title>
</head>
    <body>
        <?php include_once "navbar.html" ?>
        
        <div>
            <div class="uk-card uk-card-default uk-card-body">
                <h3 class="uk-card-title">Ajouter un post</h3>
                <p>Veuillez remplir avec les trucs qui vont bien svp hein</p>

                <form action="add.php" method="post" enctype="multipart/form-data">
    <fieldset class="uk-fieldset">

        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="Votre post" name="titrePost">
        </div>

        <div class="uk-margin">
            <textarea class="uk-textarea" rows="5" placeholder="Qu'est-ce que cela représente pour vous ?"></textarea>
        </div>

        <div class="js-upload uk-placeholder uk-text-center">
    <span uk-icon="icon: cloud-upload"></span>
    <span class="uk-text-middle">Attach binaries by dropping them here or</span>
    <div uk-form-custom>
        <input type="file" name="upload[]" multiple accept="image/x-png,image/gif,image/jpeg">
        <span class="uk-link">selecting one</span>
    </div>
</div>
<button type="submit" class="uk-button uk-button-primary">Primary</button>
    </fieldset>
</form>

            </div>            
        </div>

        
    </body>
</html>