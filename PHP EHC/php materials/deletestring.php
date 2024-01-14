<?php
    $string = "12,345.00A";
    $string2 = preg_replace("/[^0-9.,]/", '', $string);
    echo $string2;
?>
