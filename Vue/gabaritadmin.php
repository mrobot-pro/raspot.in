<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snap - <?= $titre ?></title>   <!-- Titre Onglet Dynamique -->
    <link href="contenu/css/default.css" rel="stylesheet">
    <link href="contenu/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="contenu/css/tuto.css" rel="stylesheet">
  </head>
  <body>
      
    <div id="main-container" class="container-fluid">
          <div class="col-lg-10 col-lg-offset-1 col-md-8 col-xs-12">  
      <h3 class="btn btn-primary" id="deco"><a class="heading" href="?deconnexion=1">Déconnexion</a></h3>
      <div class ="text-center"><h1><a class="heading"  href="index.php">Snap Snap Spot !</a></h1> 
                  <h3 class="heading text-center"><?= $titre ?></h3>
          
                  <form action="" method="get">
                      <div class="row">
                          <div class="col-lg-2 col-lg-offset-4"><input class="btn btn-primary" type="submit" name="Appli" value="Appli" ></div>
                          <div class="col-lg-2 "><input class="btn btn-primary " type="submit" name="Data" value="Data"></div>
                   </div>
                  </form>
                  
           <div class="col-lg-8 col-md-offset-2 col-md-8 col-xs-12">      
<?= $contenu ?>
                </div>
        </div>
    </div>

    </div>
    <!-- <footer class="bottom">&copy;2017 - David Fournier&nbsp;&amp;&nbsp;Olivier Welter.</footer> -->
    <script type="text/javascript" src="contenu/js/jquery.js" ></script>
    <script type="text/javascript" src="contenu/js/snapspotIndex.js" ></script>
    <script type="text/javascript" src="contenu/js/snapspotAdm.js" ></script>
  </body>
   
</html>