<!DOCTYPE html>
<html>
<body>
    <h2>Login</h2>
    <form action="" method="POST" onsubmit="return validateForm()">
        Username <br><input type="text" name="user" id="username" required><br>
        Password <br><input type="password" name="pass" required><br>
        <input type="submit" value="Login">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = isset($_POST["user"]) ? (string)$_POST["user"] : "";
        $b = isset($_POST["pass"]) ? (string)$_POST["pass"] : "";
        if (!empty($a)) {
            if (preg_match('/^[a-zA-Z]+$/', $a)) {
                if ($a == 'admin' && $b == '123123') {
                    echo 'hello admin';
                } elseif ($a == 'user' && $b == '123456') {
                    echo 'hello user';
                } else {
                    echo 'user or password wrong bro';
                }
            } else {
                echo 'sql injection dc cc';
            }
        } else {
            echo 'nhap username di em';
        }
    }
    ?>

    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            if (username.trim() === "") {
                alert("nhap username di em");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
