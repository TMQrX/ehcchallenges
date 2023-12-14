<html>
<body>
<form action="" method="POST">
<br>Sum 1 den n<br>
Enter n: <input type=text name=n>
<input type=submit value="Calculate">
</form>
</body>
<?php
$n = $_POST["n"];
$sum = 0;
for($i = 1; $i <= $n;$i++){
    $sum+=$i;
}
echo "Sum = $sum";
?>
</html>