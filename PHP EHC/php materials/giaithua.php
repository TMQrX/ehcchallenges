<html>
<body>
<form action="" method="POST">
<br>Factoria 1 den n<br>
Enter n: <input type=text name=n>
<input type=submit value="Calculate">
</form>
</body>
<?php
$n = $_POST["n"];
$giaithua = 1;
for($i = 1; $i <= $n;$i++){
    $giaithua *=$i;
}
echo "Giai thua tu 1 den $n = $giaithua";
?>
</html>