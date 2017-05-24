<!-- formulaire d'upload-->
<form method="post" enctype="multipart/form-data" action="">
	<p>
		<input type="file" name="file" size="30">
		<input type="submit" name="upload" value="Envoyer">
	</p>
</form>

<?php
function getExtension($str) 
{

         $i = strrpos($str,".");
         if (!$i) { return ""; } 
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}
if(isset($_POST['upload']))
{
	define ("MAX_SIZE",	"400");
	$errors	=	0;
	$filename		=	$_FILES["file"]["name"];
	$uploadedfile 	= 	$_FILES['file']['tmp_name'];
	$type_file 		= $_FILES['file']['type'];
	if ($filename) 
	{
		if( !is_uploaded_file($uploadedfile) )
		{
			exit("Le fichier est introuvable");
		}
		// on vérifie maintenant l'extension
		elseif( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
		{
			exit("Le fichier n'est pas une image");
		}
		else
		{
			//verification de la taille
			$size		=	filesize($_FILES['file']['tmp_name']);
			if ($size > MAX_SIZE*1024)
			{
				exit ("verifier la taille de votre image!!");
				$errors=1;
			}
			//recup extension
			$extension 	= 	getExtension($filename);
			//mise en minuscule extension
			$extension 	= 	strtolower($extension);
			
			
			if($extension=="jpg" || $extension=="jpeg" )
			{
				$uploadedfile 	= 	$_FILES['file']['tmp_name'];
				$src 			= 	imagecreatefromjpeg($uploadedfile);
			}
			else if($extension=="png")
			{
				$uploadedfile 	= 	$_FILES['file']['tmp_name'];
				$src 			= 	imagecreatefrompng($uploadedfile);
			}
			else 
				$src 	= 	imagecreatefromgif($uploadedfile);
			
			list($width,$height)	=	getimagesize($uploadedfile);

			$newwidth	=	60;
			$newheight	=	($height/$width)*$newwidth;
			$tmp		=	imagecreatetruecolor($newwidth,$newheight);

		

			imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

		

			$filename 	= 	"". $_FILES['file']['name'];
		

			imagejpeg($tmp,$filename,100);
		

			imagedestroy($src);
			imagedestroy($tmp);
		
			
			echo "imagecopyresampled: <img src='{$filename}'/>";
		}
	}
	
}
	
?>