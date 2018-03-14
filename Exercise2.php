<?php
$amount = '1'; 
$convertTo = "USD";
$eurToUsdRatio = "1.085965";
$usdToeurRatio = "0.920839999";

If($convertTo == "USD"){
    $result= $amount * $eurToUsdRatio;
    echo $result;
} else {
    $result= $amount * $usdToeurRatio ;
    echo $result ;
}