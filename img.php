<?php
//var_dump($_GET);
//echo '<br>';
$mark = $_GET['mark'];
//echo $mark;
//echo '<br>';

if ($mark == 0) {
	$code = 2;
} elseif ($mark == 1) {
	$code = 3;
} elseif ($mark == 2) {
	$code = 4;
} elseif ($mark == 3) {
	$code = 5;	
}
//код генерации картинки

//echo $code;

$image = imagecreatetruecolor(410, 315);

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

imagettftext($image, 100, 30, 190, 200, $textColor, $fontFile, $code);
header('Content-Type: image/png');

imagepng($image); //после этой строки в браузер уходит картинка
// не имеет никакого значения чо происходит тут
imagedestroy($image);
?>