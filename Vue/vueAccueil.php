<?php $this->titre = "Snap Snap Spot"; ?>

            <div class="row text-center">
                <div class="col-xs-12">
                    <form method="post" id='uploadform' action="index.php" enctype="multipart/form-data">
                        <img class="cameraico" src="./Contenu/css/camera.ico" id="upfile1" width="75" style="cursor:pointer" alt="logo_appli" type="submit" />
                        <!-- MAX_FILE_SIZE doit précéder le champ input de type file
                        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />-->
                        <input type="file" id="mon_fichier"  name="mon_fichier" style="display:none"  />
                    </form>

                    <div id="explain">

<?php     
    
    $parametres = new Parametres();
    $slogan = $parametres->getSlogan();
    $evenement = $parametres->getEvenement();

    ?> 

    <h1><?php echo $slogan; ?>
    <p><?php echo $evenement; ?>

                    </div>
                </div>
            </div>