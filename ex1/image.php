<?php
$countImage = isset($_COOKIE['countimage']) ? $_COOKIE['countimage'] : 0;
$countImage += 1;

setcookie("countimage", $countImage);

if ($countImage > 20) setcookie("countimage", '', 1); // здесь помещается механизм обнуления счетчика

header('Content-Type: image/jpg');
readfile($_SERVER['DOCUMENT_ROOT'].'/cross.jpg');
