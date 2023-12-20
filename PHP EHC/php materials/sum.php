<!DOCTYPE html>
<html>
<body>
    <h2>Sum 1 den n</h2>
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
            $sum = 0;
            for ($i = 1; $i <= $n; $i++) {
                $sum += $i;
            }
            echo "<p>Sum from 1 den $n = $sum</p>";
        }
    }
    ?>
</body>
</html>
