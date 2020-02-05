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

    <title>Document</title>
</head>
    <body>
        <?php include_once "navbar.html" ?>
        
        <div>
            <div class="uk-card uk-card-default uk-card-body">
                <h3 class="uk-card-title">Ajouter un post</h3>
                <p>Veuillez remplir avec les trucs qui vont bien svp hein</p>

                <form>
    <fieldset class="uk-fieldset">

        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="Mon post">
        </div>

        <div class="uk-margin">
            <textarea class="uk-textarea" rows="5" placeholder="Textarea"></textarea>
        </div>

        <div class="js-upload uk-placeholder uk-text-center">
    <span uk-icon="icon: cloud-upload"></span>
    <span class="uk-text-middle">Attach binaries by dropping them here or</span>
    <div uk-form-custom>
        <input type="file" multiple accept="image/x-png,image/gif,image/jpeg">
        <span class="uk-link">selecting one</span>
    </div>
</div>
<button class="uk-button uk-button-primary">Primary</button>
    </fieldset>
</form>

            </div>            
        </div>

        
    </body>
</html>