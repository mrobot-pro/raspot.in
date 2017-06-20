<?php $this->titre = "Snap Snap Spot"; ?>
            <div class="row text-center">
                <div class="col-xs-12">
                    <form method="post" id='uploadform' action="index.php" enctype="multipart/form-data">
                        <img class="cameraico" src="./Contenu/css/camera.ico" id="upfile1" width="75" style="cursor:pointer" alt="logo_appli" type="submit" />
                        <input type="file" id="mon_fichier"  name="mon_fichier" style="display:none"  />
                    </form>

                	<div id="explain">
<?php
    $parametres = new Parametres();
    $slogan = $parametres->getSlogan();
    $evenement = $parametres->getEvenement();
?>
    					<h3><?php echo $slogan; ?></h3>
    					<p><?php echo $evenement; ?></p>
                	</div>
            	</div>