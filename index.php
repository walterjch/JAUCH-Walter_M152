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

    <title>Portfolio - Accueil</title>
</head>
    <body>
        <?php include_once "navbar.html" ?>
        <div><p>Bienvenue sur mon site !</p></div>
        
        <div class="uk-child-width-1-3@m" uk-grid>
            <div>
                <div class="uk-card uk-card-default">

                
                    <div class="uk-card-header">
                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                            <div class="uk-width-auto">
                                <img class="uk-border-circle" width="40" height="40" src="img/pdp.jpg">
                            </div>
                        <div class="uk-width-expand">
                            <h3 class="uk-card-title uk-margin-remove-bottom">Vacances Octobre 2018</h3>
                                <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">Oct. 01, 2018</time></p>
                        </div>
                    </div>
                    </div>
                    <div class="uk-card-body">
                        <p>Vacances avec les petits potes... à la cool :p ;) :D</p>
                        <img class="" width="100%" height="100%" src="img/vacancesBorat.png">
                    </div>
                    <div class="uk-card-footer">
                        <a href="#" class="uk-button uk-button-text">Read more</a>
                    </div>              


                </div>
            </div>

            <div>
                <div class="uk-card uk-card-default">

                <div class="uk-card-header">
                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                        <div class="uk-width-auto">
                            <img class="uk-border-circle" width="40" height="40" src="img/pdp.jpg">
                        </div>
                    <div class="uk-width-expand">
                        <h3 class="uk-card-title uk-margin-remove-bottom">Soirée Déguisée ! XD</h3>
                            <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">Oct. 01, 2018</time></p>
                    </div>
                </div>
                </div>
                <div class="uk-card-body">
                    <p>Petite soirée swag avec les boiz haha. J'espère qu'on remettra ça bientôt ??</p>
                    <img class="" width="100%" height="100%" src="img/deguisementBorat.jpg">
                </div>
                <div class="uk-card-footer">
                    <a href="#" class="uk-button uk-button-text">Read more</a>
                </div>

                </div>
            </div>

            <div>
                <div class="uk-card uk-card-default">

                <div class="uk-card-header">
                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                        <div class="uk-width-auto">
                            <img class="uk-border-circle" width="40" height="40" src="img/pdp.jpg">
                        </div>
                    <div class="uk-width-expand">
                        <h3 class="uk-card-title uk-margin-remove-bottom">Bahamas</h3>
                            <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">Oct. 01, 2018</time></p>
                    </div>
                </div>
                </div>
                <div class="uk-card-body">
                    <p>Inoubliable ! yessai</p>
                    <img class="" width="100%" height="100%" src="img/bahamas.jpg">
                </div>
                <div class="uk-card-footer">
                    <a href="#" class="uk-button uk-button-text">Read more</a>
                </div>

                </div>
            </div>
        </div>

        
    </body>
</html>