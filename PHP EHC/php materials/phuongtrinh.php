<!DOCTYPE html>
<html>
<body>
    <h2>Phương trình bậc nhất</h2>
    <form action="" method="POST">
        <input type="text" name="a">x +
        <input type="text" name="b"> = 0
        <br><br>
        <input type="submit" value="Calculate">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = isset($_POST["a"]) ? (float)$_POST["a"] : 0;
        $b = isset($_POST["b"]) ? (float)$_POST["b"] : 0;

        if ($a != 0) {
            $x = (-$b / $a);
            echo "<p>Nghiem cua pt: x = $x</p>";
        } elseif ($b == 0) {
            echo "<p>Phuong trinh vo so nghiem</p>";
        } else {
            echo "<p>Phuong trinh vo nghiem</p>";
        }
    }
    ?>
</body>
</html>
