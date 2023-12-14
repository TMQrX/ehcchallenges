<html>
<body>
<form action="" method="POST">
<br>phuong trinh bac nhat<br>
<input type=text name=a>x +
b <input type=text name=b> = 0
<br><br><input type=submit value="Calculate">
</form>
</body>
<?php
$a = $_POST["a"];
$b = $_POST["b"];
if ($a != 0) {
    $x = (-$b / ($a));
    echo "nghiem cua phuong trinh: x = $x";
} elseif ($b == 0) {
    echo "phuong trinh vo so nghiem";
} else {
    echo "phuong trinh vo nghiem";
}
?>
</html>