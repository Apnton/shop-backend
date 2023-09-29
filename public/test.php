<?php
//use function CV\{ imread, imshow, waitKey};
//
//phpinfo();
//$im = imread('./8Q6A1101.jpg');//加载图片
//var_dump($im);
//die();
//imshow('This is Obama id card',$im);//调用imshow方法暂时图片
//waitKey(0);
$mainImage = cv\imread('./8Q6A1101.jpg');
$templateImage = cv\imread('./8Q6A1101.jpg');



$result = cv\matchTemplate($mainImage, $templateImage);
print_r($result);
die();
$minVal; $maxVal; $minLoc; $maxLoc;
cv\minMaxLoc($result, $minVal, $maxVal, $minLoc, $maxLoc);

$threshold = 0.8; // You can adjust this threshold
if ($maxVal >= $threshold) {
    $templateWidth = cv\Mat::cols($templateImage);
    $templateHeight = cv\Mat::rows($templateImage);

    $topLeft = $maxLoc;
    $bottomRight = new cv\Point($topLeft->x + $templateWidth, $topLeft->y + $templateHeight);

    cv\rectangle($mainImage, $topLeft, $bottomRight, [0, 255, 0], 2);

    cv\imwrite('output_image.jpg', $mainImage);
}
