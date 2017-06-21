<?php $this->titre = "AdminData"; ?>

<?php 
	require_once 'Modele/MediaManager.php';
	require_once 'Modele/media.php';
	?>

<!--<div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12"><br>-->
    <?php //foreach ($datas as $key => $value){ ?>
                    <!--<ul class="list-group">
                    <a href="#" class="list-group-item">
                    <p class='list-group-item-text pull-right'><?php //echo $value['newName']; ?></p>
                    <?php $chemin //= 'vignette/'.$value['newName']; ?>
                    <img src=<?php //echo '$chemin'; ?> alt="image_vignette" >
                    </a>
                    </ul>-->
<?php //} ?>

<?php 
    $db = new PDO('sqlite:db/snapspot.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
    $mediaCount=$db->query('SELECT COUNT(*) FROM media')->fetchColumn();
    if($mediaCount>1){
        $qMedias =$db->query('SELECT * FROM media');
        $datas = $qMedias->fetchAll(PDO::FETCH_ASSOC);
         echo'<div class="col-lg-offset-1 col-lg-10 col-md-offset-2 col-md-8 col-xs-12"><br>';
    foreach ($datas as $key => $value){
                    echo '<ul class="list-group">';
                    echo '<a href="#" class="list-group-item">';
                    echo "<p class='list-group-item-text pull-right'>".$value['newName']."</p>";
                    $chemin = 'vignette/'.$value['newName'];
                    echo"<img src='$chemin'>";
                    echo '</a>';
                    echo '</ul>';
                }
            }else{
              echo "Aucun résultat";
            }