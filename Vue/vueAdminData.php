<?php $this->titre = "AdminData";

	require_once 'Modele/MediaManager.php';
	require_once 'Modele/media.php';

        $mediaManager = new MediaManager();
        $datas = $mediaManager->getList();

echo "<div class='row col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-xs-12'>";
    foreach ($datas as $key => $value){ 
                    echo "<ul class='list-group'>";
                    echo "<a href='#' class='list-group-item'>";
                echo "<span class='glyphicon glyphicon-trash pull-right'></span>";
                    echo "<p class='list-group-item-text pull-right'>".$value['newName']."</p>";
                    $chemin = 'contenu/vignette/'.$value['newName'];
                    echo "<img src='".$chemin."' alt='image_vignette'>";
                    echo '</a>';
                    echo '</ul>';
    }
