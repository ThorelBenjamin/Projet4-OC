<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $racineWeb ?>" >
        <link rel="stylesheet" href="Contenu/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="Contenu/style.css" />
        <title><?= $titre ?></title>
        <link rel="stylesheet" href="Contenu/bootstrap/css/bootstrap.min.css" />
    </head>
    <body>
        <div id="global">
            <header>
                <nav class="navbar navbar-inverse refg">
                  <div class="container-fluid">
                    <div class="navbar-header">
                      <h1 class="navbar-brand" >Billet simple pour l'Alaska</h1>
                    </div>
                    <ul class="nav navbar-nav">
                      <li class="active"><a href="http://localhost/jeanforteroche/">Home</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="http://localhost/jeanforteroche/admin/"><span class="glyphicon glyphicon-log-in"></span>Administration</a></li>
                    </ul>
                      
                  </div>
                </nav>

            <div class="jumbotron text-center img_ban">
                <div class="titre_banniere">
                    <h1>Billet simple pour l'Alaska</h1>
                    <h2>Jean Forteroche</h2>
                </div>
            </div>
                
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                
            </footer>
        </div> <!-- #global -->
    </body>
</html>