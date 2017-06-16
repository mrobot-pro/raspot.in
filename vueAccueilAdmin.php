<?php $titre = 'SnapSpot';
 ob_start(); 
 foreach ($medias as $key => $value): 
       echo '<ul class="list-group">';
       echo '<a href="#" class="list-group-item">';
       echo "<p class='list-group-item-text pull-right'>".$value['newName'].'</p>';
      $chemin = 'vignette/'.$value['newName']; 
       echo "<img src='$chemin'>";
       echo '</a>';
       echo '</ul>';
 endforeach;
 $contenu = ob_get_clean();
 require 'gabarit.php';