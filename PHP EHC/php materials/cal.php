<html>
<body>
<form action="" method="POST">
a <input type=text name=a><br>
b <input type=text name=b><br>
<br><br><input type=submit value="Calculate">
</form>
</body>
<?php
$a = $_POST["a"];
$b = $_POST["b"];
echo "Addition: " . ($a + $b) . "<br>";
echo "Subtraction: " . ($a - $b) . "<br>";
echo "Multiplication: " . ($a * $b) . "<br>";
if ($b != 0) {
    echo "Division: " . ($a / $b) . "<br>";
} else {
    echo "Chia cho 0 thi chia kieu gi?<br>";
}
?>
</html>