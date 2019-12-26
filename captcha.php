<?php
session_start();
function getCode($n)
{
    $char = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $str = array();
    for ($i = 0; $i < $n; $i++) {
        $idx = rand(0, strlen($char) - 2);
        $str[] = $char[$idx];
    }
    return $n = implode($str);
}
$_SESSION['captcha_code'] = getCode(6);
$random_alpha = $_SESSION['captcha_code'];
$target_layer = imagecreate(100, 30);
$captcha_background = imagecolorallocate($target_layer, 22, 86, 165);
$captcha_text_color = imagecolorallocate($target_layer, 223, 230, 233);
imagefill($target_layer, 0, 0, $captcha_background);
imagestring($target_layer, 10, 20, 5, $random_alpha, $captcha_text_color);
header('content-type: image/jpeg');
imagejpeg($target_layer);
imagedestroy($target_layer);
