<?php
session_start();

    if ( !empty($_SESSION['rand_code']) )
    {
        unset($_SESSION['rand_code']);
    }

    if (empty($_SESSION['rand_code']))
    {
        $str = "";
	    $a = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        /*for ($i = 0; $i <= 3; $i++)
        {
            $str.= $a[rand(0, 61)];
        }*/
        $str = 'dddd';

    $_SESSION['rand_code'] = $str;
}
header ('Content-Type: image/png');
$img = imagecreatetruecolor(60, 30);
$text_color = imagecolorallocate($img, 158, 1, 255);
imagestring($img, 10, 5, 5,$str, $text_color);
imagepng($img);
imagedestroy($img);
