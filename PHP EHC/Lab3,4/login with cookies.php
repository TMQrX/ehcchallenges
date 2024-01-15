<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        div {
            width: 40%;
            margin: 20px;
        }

        form {
            border: 1px solid #ccc;
            padding: 20px;
        }
    </style>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="POST" onsubmit="return validateForm()">
        Username <br><input type="text" name="user" id="username" required><br>
        Password <br><input type="password" name="pass" id="password" required><br>
        <label>
            <input type="checkbox" name="remember_me"> Remember Me
        </label><br>
        <input type="submit" value="Login">
    </form>
    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["user"]) && isset($_POST["pass"])) {
            $a = (string)$_POST["user"];
            $b = (string)$_POST["pass"];
            if (isset($_POST["remember_me"])) {
                $rememberedUser = $_POST["user"];
                setcookie("remembered_user", $rememberedUser, time() + (86400 * 30), "/");
            }
    
            if (!empty($a) && !empty($b)) {
                if (preg_match('/^[a-zA-Z1-9]+$/', $a)) {
                    if (isset($_SESSION['registered_user']) && $_SESSION['registered_user']['username'] == $a) {
                        $hashed_password = $_SESSION['registered_user']['hashed_password'];
                        if (password_verify($b, $hashed_password)) {
                            echo 'Hello ' . $a;
                        } else {
                            echo 'Incorrect password';
                        }
                    } else {
                        echo 'User not registered';
                    }
                } else {
                    echo 'sql injection ho cai';
                }
            } else {
                echo 'nhap username hoac password di em';
            }
        }
    }
    ?>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var rememberedUser = getCookie("remembered_user");
        });

        function getCookie(cookieName) {
            var name = cookieName + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var cookieArray = decodedCookie.split(';');
            for (var i = 0; i < cookieArray.length; i++) {
                var cookie = cookieArray[i];
                while (cookie.charAt(0) == ' ') {
                    cookie = cookie.substring(1);
                }
                if (cookie.indexOf(name) == 0) {
                    return cookie.substring(name.length, cookie.length);
                }
            }
            return "";
        }
    </script>

    <h2>Register</h2>
    <form action="" method="POST" onsubmit="return validateRegisterForm()">
        Username <br><input type="text" name="username" id="reg_username" required><br>
        Password <br><input type="password" name="password" id="reg_password" required><br>
        Email <br><input type="email" name="email" id="email" required><br>
        Select title
        <br>
        <select name="title" required>
            <option value="ms">Ms.</option>
            <option value="mr">Mr.</option>
        </select><br>
        Full Name <br><input type="text" name="full_name" id="full_name" required><br>
        Company Details Name <br><input type="text" name="company_name" id="company_name" required><br>
        <label>
            <input type="checkbox" name="agree" required> I am agree with registration
        </label><br>
        <input type="submit" value="Register">
    </form>
    <div id="registerSuccessMessage" style="display:none; color: green; font-weight: bold;">
        Đăng ký thành công nè
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = isset($_POST["username"]) ? htmlspecialchars($_POST["username"]) : "";
        $password = isset($_POST["password"]) ? htmlspecialchars($_POST["password"]) : "";
        $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";
        $title = isset($_POST["title"]) ? htmlspecialchars($_POST["title"]) : "";
        $full_name = isset($_POST["full_name"]) ? htmlspecialchars($_POST["full_name"]) : "";
        $company_name = isset($_POST["company_name"]) ? htmlspecialchars($_POST["company_name"]) : "";
        if (!empty($username) && !empty($password) && !empty($email) && !empty($title) && !empty($full_name) && !empty($company_name)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $_SESSION['registered_user'] = [
                'username' => $username,
                'hashed_password' => $hashed_password,
                'email' => $email,
                'title' => $title,
                'full_name' => $full_name,
                'company_name' => $company_name,
            ];
            echo '<script>document.getElementById("registerSuccessMessage").style.display = "block";</script>';
        }
    }
    ?>

    <script>
        function validateRegisterForm() {
            var regUsername = document.getElementById("reg_username").value;
            var regPassword = document.getElementById("reg_password").value;
            var email = document.getElementById("email").value;
            var full_name = document.getElementById("full_name").value;
            var company_name = document.getElementById("company_name").value;

            if (regUsername.trim() === "" || regPassword.trim() === "" || email.trim() === "" || full_name.trim() === "" || company_name.trim() === "") {
                alert("Please fill in all fields");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
