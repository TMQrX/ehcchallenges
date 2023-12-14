<?php
$my_array = array('EHC', 'HackYourLimits', 'Training');
$maxLength = -99999;
$minLength = 99999;
foreach ($my_array as $str) {
    $length = strlen($str);

    if ($length > $maxLength) {
        $maxLength = $length;
    }
    if ($length < $minLength) {
        $minLength = $length;
    }
}

echo "output: maxLength = $maxLength minLength = $minLength";
?>
