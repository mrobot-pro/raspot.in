<?php
$this->titre = "AdminAppli";
require_once 'model/Settings.php';
$parametres = new Settings();

$back = round($parametres->dirSize(Media::BACK_PATH) / 1024 / 1024);
$stock = round($parametres->dirSize(Media::MEDIA_PATH) / 1024 / 1024);
$percentStock = ($stock * 100) / Settings::STOCK_SIZE;
$percentBack = ($back * 100) / Settings::BACK_SIZE;
?>


<form id="paramAppli" class="row col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-12" action="" method="post">

    <div>
        <label for="evenement">Nom de l'événement:</label>
        <div class="input-group">
            <input id="evenement" class="form-control" type="text" name="evenement" value="<?php echo $parametres->getEvenement(); ?>" />
            <div class="input-group-btn">
                <input class="btn btn-primary" type="submit" id ="changeEvent" name="changeEvent" value="Valider" onclick="update()">
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
            <input class="form-control" type="password" name="mdp" value = "<?= $parametres->getMdp() ?>"  />
            <div class="input-group-btn">
                <input class="btn btn-primary" type="submit" name="changePassword" value="Valider">
            </div>
        </div>
    </div>
</form>

<div class="row col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-12">
    <form method="post" id="change_fond" action="" enctype="multipart/form-data">
        <label for="image_fond">Fond d'écran :</label>
        <div>
            <input class="btn btn-info col-lg-12" style="cursor:pointer; color: #fff; background-color: #337ab7; border-color: #2e6da4;" type="file" id="image_fond" name="image_fond">
        </div>
    </form>
</div>

<div class="row col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-12">
    <label for>Utilisation stockage</label>
    <div>
        <div class="progress text-center" style="text-indent: -<?= $percentStock ?>%" >
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?= $percentStock ?>" aria-valuemin="0" aria-valuemax="<?= Settings::BACK_SIZE ?>" style="width:<?= $percentStock ?>%">
            </div>
            <span ><?php echo $stock . '/' . Settings::STOCK_SIZE . ' MB'; ?></span>
        </div>
    </div>
</div> 

<div class="row col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-12">
    <label for>Utilisation backup</label>
    <div>
        <div class="progress text-center" style="text-indent: -<?= $percentBack ?>%">
            <div class="progress-bar progress-bar-striped active " role="progressbar" aria-valuenow="<?= $percentBack ?>" aria-valuemin="0" aria-valuemax="<?= Settings::BACK_SIZE ?>" style="width:<?= $percentBack ?>%">
            </div>
            <span><?php echo $back . '/' . Settings::BACK_SIZE . ' MB'; ?></span>
        </div>
    </div>
</div> 

<div class="row col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-12">
    <label for>Nettoyage du disque</label>


    <form action="" method="post">
        <div class="row">
            <div class="col-lg-4">
                <button class="btn btn-primary " type="submit" name="delete_data_submit" value="data">Images <span class="badge"><?= count(glob(Media::MEDIA_PATH . '*.jpg')); ?></span></button>
            </div>
            <div class="col-lg-4">
                <button class="btn btn-primary " type="submit" name="delete_backup_submit" value="backup">Backup <span class="badge"><?= count(glob(Media::BACK_PATH . '*.jpg')); ?></span></button>
            </div>
            <div class="col-lg-4">
                <input class="btn btn-primary btn-danger" type="submit" name="Reset" value="Reset">
            </div>
        </div>

    </form>

</div>








