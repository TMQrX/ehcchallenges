<!DOCTYPE html>
<html>
<body>
    <h2>Factorial 1 den n</h2>
    <form action="" method="POST">
        Enter n: <input type="text" name="n" required>
        <button type="submit">Calculate</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = isset($_POST["n"]) ? (int)$_POST["n"] : 0;
        if ($n <= 0) {
            echo "<p>Phai la so nguyen duong xd</p>";
        } else {
            $giaithua = 1;
            for ($i = 1; $i <= $n; $i++) {
                $giaithua *= $i;
            }
            echo "<p>Factorial from 1 den $n = $giaithua</p>";
        }
    }
    ?>
</body>
</html>
