<?php $this->titre = "AdminAppli";
	require_once'modele/Parametres.php'; 
	$parametres = new Parametres();
	?>

<br>

<form id="paramAppli" class="row col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-12" action="" method="post">
    
    <div>
<label for="evenement">Nom de l'événement:</label>
<div class="input-group">
<input id="evenement" class="form-control" type="text" name="evenement" placeholder="<?php echo $parametres->getEvenement(); ?>" />
<div class="input-group-btn">
    <input class="btn btn-primary" type="submit" id ="changeEvent" name="changeEvent" value="Valider" onclick="">
</div>
</div>
    </div>

<div>
<label for="slogan">Slogan :</label>
<div class="input-group">
<input id="slogan" class="form-control" type="text" name="slogan" value="<?php echo $parametres->getSlogan(); ?>" />
 <div class="input-group-btn">
 <input class="btn btn-primary" type="submit" name="changeSlogan" value="Valider">
 </div>
</div>
</div>

<div>
<label for="password">Mot de Passe :</label>
<div class="input-group">
    <input class="form-control" type="password" name="mdp" value = "<?=$parametres->getMdp()?>"  />
<div class="input-group-btn">
<input class="btn btn-primary" type="submit" name="changePassword" value="Valider">
</div>
</div>
</div>
</form>

<div class="row col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-12">
<form class="" method="post" id="change_fond" action="" enctype="multipart/form-data">
<label for="image_fond">Fond d'écran :</label>
<div>
    <input class="btn btn-info col-lg-12" style="cursor:pointer; color: #fff; background-color: #337ab7; border-color: #2e6da4;" type="file" id="image_fond" name="image_fond">
</div>
</form>
</div>


<div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-12">
<label for>Utilisation du disque</label>
<div class="row">

<div class="progress text-center" style="text-align: center">
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em;width: 89%;"></div>
<span>89% / 14.0 Go disponible</span>
</div>

</div>
</div> 


<div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-12">
<label for>Nettoyage du disque</label>


  <form action="" method="post">
 <div class="row">
<div class="col-lg-4">
    <button class="btn btn-primary " type="submit" name="delete_data_submit" value="data">Images <span class="badge"><?=count(glob(Media::MEDIA_PATH.'*.jpg'));?></span></button>
</div>
<div class="col-lg-4">
    <button class="btn btn-primary " type="submit" name="delete_backup_submit" value="backup">Backup <span class="badge"><?=count(glob(Media::BACK_PATH.'*.jpg'));?></span></button>
</div>
     <div class="col-lg-4">
         <input class="btn btn-primary btn-danger" type="submit" name="Reset" value="Reset">
</div>
</div>
      <?php echo var_dump($parametres); ?>
</form>
<br>

</div>






