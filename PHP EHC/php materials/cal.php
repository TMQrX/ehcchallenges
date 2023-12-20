<!DOCTYPE html>
<html>
<body>
    <h2>Calculator</h2>
    <form action="" method="POST">
        a: <input type="text" name="a" required><br>
        b: <input type="text" name="b" required><br>
        <br><br>
        <input type="submit" value="Calculate">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = isset($_POST["a"]) ? (float)$_POST["a"] : 0;
        $b = isset($_POST["b"]) ? (float)$_POST["b"] : 0;
        echo "<p>Addition: " . ($a + $b) . "</p>";
        echo "<p>Subtraction: " . ($a - $b) . "</p>";
        echo "<p>Multiplication: " . ($a * $b) . "</p>";
        if ($b != 0) {
            echo "<p>Division: " . ($a / $b) . "</p>";
        } else {
            echo "<p>Mai chia</p>";
        }
    }
    ?>
</body>
</html>
