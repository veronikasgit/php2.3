<?php
var_dump($_GET);
exit;

$code = $_GET['i'];
//код генерации картинки

$image = imagecreatetruecolor(400, 300);

//RGB
$backColor = imagecolorallocate($image, random_int(1, 255), random_int(1, 255), 221);
$textColor = imagecolorallocate($image, 0, random_int(1, 255), random_int(1, 255));

$boxFile = __DIR__ . '/captcha.png';

if (!file_exists($boxFile)) {
 	echo 'Файл с картинкой не найден';
 	exit;
}
$imBox = imagecreatefrompng($boxFile);

imagefill($image, 0, 0, $backColor) ;
imagecopy($image, $imBox, -50, -100, 0, 0, 556, 556);

$fontFile = __DIR__ . '/font.ttf';
if (!file_exists($fontFile)) {
	echo 'Файл со шрифтом не найден';
	exit;
}

imagettftext($image, 100, 30, 90, 250, $textColor, $fontFile, $code);
header('Content-Type: image/png');

imagepng($image); //после этой строки в браузер уходит картинка
// не имеет никакого значения чо происходит тут
imagedestroy($image);
?>