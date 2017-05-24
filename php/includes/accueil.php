<center><img src="./css/camera.ico" id="upfile1" width="50" style="cursor:pointer" image-orientation="center" alt="logo_appli" />
<input type="file" id="file1"  name="file1" style="display:none" /><br>
<div>
	<p>Partagez vos photos </p>
	<p>sur ce spot </p>
	<p>tout au long de l'événement !</p>
</div></center>

<?php
if(isset($_POST['evenement']) && !empty($_POST['evenement'])){
    echo $_POST['evenement'];
}
else{
    echo '<center><h1>BONJOUR</h1></center>';
}
?>

