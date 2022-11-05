<?php 
session_start();
include "../sharedlibs/session_validator.php";
include "../sharedlibs/SimpleImage.php";

$name = $_SESSION["name"];
$amt = $_SESSION["paid"];
$order = $_SESSION["order_id"];

$img = new SimpleImage("../images/receipts_bg.png");
//$img->text("Customer name: ".$name, "../fonts/timesbi.ttf", 14, "#ffffff", "top left", 10, 50);
$img->text("Customer name: ".$name, array(
    'fontFile' => 'C:\xampp\htdocs\e-budget.com\fonts\timesbi.ttf',
    'size' => 14,
    'color' => '#FFFFFF',
    'anchor' => 'top left', 'xOffset' => 10, 'yOffset' => 50)
    );
//$img->text("Receipt for payment of [KShs]: ".$amt, "../fonts/timesbi.ttf", 14, "#ffffff", "top left", 10, 100);
$img->text("Receipt for payment of [KShs]: ".$amt, array(
    'fontFile' => 'C:\xampp\htdocs\e-budget.com\fonts\timesbi.ttf',
    'size' => 14,
    'color' => '#FFFFFF',
    'anchor' => 'center', 'xOffset' => 10, 'yOffset' => 100)
    );
//$img->text("Order Id: ".$order, "../fonts/timesbi.ttf", 14, "#ffffff", "top left", 10, 180);
$img->text("Order Id: ".$order, array(
    'fontFile' => 'C:\xampp\htdocs\e-budget.com\fonts\timesbi.ttf',
    'size' => 14,
    'color' => '#FFFFFF',
    'anchor' => 'top left', 'xOffset' => 10, 'yOffset' => 180)
    );
//$info = $img->get_original_info();
$path = "../images/receipts/".$name.".png";
//$img->save($path, 8);
$img->toFile($path, 'image/png',9);
$size = filesize($path);
header('Content-Disposition: attachment; filename="'.$name.".png".'"');
header("Content-length: ".$size."");
header('Content-Type: image/png');
readfile($path);
?>