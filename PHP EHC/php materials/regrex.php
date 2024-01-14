<?php
$str = '<ul>
    <li>Coffee</li>
    <li>Tea</li>
    <li>Milk</li>
</ul>';
preg_match_all('/<li>(.*?)<\/li>/', $str, $check);
foreach ($check[1] as $value) {
    echo $value . ' ';
}
?>
