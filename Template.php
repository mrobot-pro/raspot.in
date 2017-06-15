<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNAPSPOT ADMIN</title>
    <link href="css/default.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  </head>
  <body>
      
    <div id="main-container" class="container-fluid">
    <h3 class="btn btn-primary" id="deco"><a class="heading" href="?deconnexion=1">Déconnexion</a></h3>
    <div class ="text-center"><h1><a class="heading"  href="index.php">Snap Snap Spot !</a></h1>
    <div id="global">
    <header>
        <a href="index.php"><h1 id="titreBlog">Mon Blog</h1></a>
    </header>
        
      <div id="contenu">
        <?= $contenu ?>   <!-- Élément spécifique -->
      </div>

  
    <footer class="text-center">
        <p>&copy;2017 - David Fournier&nbsp;&amp;&nbsp;Olivier Welter.</p>
    </footer>
    </div> <!-- #global -->
    <script type="text/javascript" src="js/jquery-3.2.1.js" ></script>
    <script type="text/javascript" src="js/snapspotAdm.js" ></script>
    
  </body>
</html>