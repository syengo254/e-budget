<?php 
session_start();
include "../sharedlibs/SimpleImage.php";

$code;

$str = "a b c d e f g h i j k l m n o p q r s t u v w x y z A B C D E F G H I J K L M N O P Q R S T U V W X Y Z 0 1 2 3 4 5 6 7 8 9 ' ? #";

$letters = substr($str,0,103);
$nums = substr($str,104,20);
$marks = substr($str,123,6);

function gen_string($let){
	$temp = explode(" ", $let);
	$c1 = $temp[rand(0, 17)];
	$c2 = $temp[rand(15, 38)];
	$c3 = $temp[rand(36, 51)];
	$c4 = $temp[rand(0, 51)];
	
	return $c1.$c2.$c3.$c4;
}

function gen_num($num){
	$temp = explode(" ", $num);
	$c1 = $temp[rand(1, 3)];
	$c2 = $temp[rand(3, 7)];
	$c3 = $temp[rand(4, 10)];
	$c4 = $temp[rand(1, 6)];
	
	return $c1.$c2.$c3.$c4;
}

$code = gen_string($letters)." ".gen_num($nums);

$_SESSION["code"] = strtolower($code);

$img = new SimpleImage("..\\images\\captcha_bg.png");
//$img->text($code, "../fonts/times.ttf",32, "#fff","center",0,-8);
$img->text($code, array(
'fontFile' => 'C:\xampp\htdocs\e-budget.com\task\LHANDW.TTF',
'size' => 32,
'color' => '#FFFFFF',
'anchor' => 'center')
);
$path = "..\\images\\captchas\\".date('U').".png";
//$info = $img->get_original_info();
$img->toFile($path, 'image/png',9);

header('Content-Type: image/png');
header("Pragma: no-cache");
readfile($path);
?>