<?php
require(realpath('../../').'/includes/config.inc.php');
startCMSSession();
if (!isset($_SESSION['mgrValidated'])) exit(); // Only allow viewing of images if manager logged in.

$image_path = realpath('../../../').'/'.$_GET['src'];

$image_info = getimagesize($image_path);

switch ($image_info[2]) {
    case IMAGETYPE_JPEG:
        $i = imagecreatefromjpeg($image_path);
        break;
    case IMAGETYPE_GIF:
        $i = imagecreatefromgif($image_path);
        break;
    case IMAGETYPE_PNG:
        $i = imagecreatefrompng($image_path);
        break;
}

if ($i) {

    $mw = @$_GET['w'] ? $_GET['w'] : $image_info[0];
    $mh = @$_GET['h'] ? $_GET['h'] : $image_info[1];

    if (($sfw = ($mw / $image_info[0])) < ($sfh = ($mh / $image_info[1]))) {
        $tw = $mw;
        $th = $sfw * $image_info[1];
    } else {
        $tw = $sfh * $image_info[0];
        $th = $mh;
    }

    $t = imagecreatetruecolor($tw, $th);
    imagecopyresampled($t, $i, 0, 0, 0, 0, $tw, $th, $image_info[0], $image_info[1]);
    
    header('Content-type: image/jpeg');
    
    imagejpeg($t);
    imagedestroy($i);
    imagedestroy($t);
}
