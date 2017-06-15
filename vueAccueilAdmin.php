<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
   		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>SNAPSPOT ADMIN</title>
		 <link href="css/default.css" rel="stylesheet">
     <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
    <?php
  
    echo'<div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-12"><br>';
    foreach ($medias as $key => $value){
        echo '<ul class="list-group">';
            echo '<a href="#" class="list-group-item">';
                echo "<p class='list-group-item-text pull-right'>".$value['newName']."</p>";
                $chemin = 'vignette/'.$value['newName'];
                echo"<img src='$chemin'>";
            echo '</a>';
        echo '</ul>';
    }
        ?>
    </body>
</html>