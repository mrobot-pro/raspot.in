<?php

echo <<<EOT
<center><img src="./image/snapphoto.png" id="upfile1" style="cursor:pointer" image-orientation="center" alt="logo_appli" />
<input type="file" id="file1"  name="file1" style="display:none" /><br>
<div>
	<p>Partagez vos photos </p>
	<p>sur ce spot </p>
	<p>tout au long de l'événement !</p>
</div></center>
EOT;

if(isset($_POST['evenement']) && !empty($_POST['evenement'])){
    echo $_POST['evenement'];
}
else{
    echo '<center><h1>BONJOUR</h1></center>';
}