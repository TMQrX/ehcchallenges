<?php
session_start();

function checkValidId($str) {
    return in_array(substr($str, 0, 2), ["HS", "HE", "HF"]) && strlen(substr($str, 2)) <= 6;
}

function display($str) {
    foreach ($_SESSION['used'] as $user) {
        echo $user[$str];
    }
}

$_SESSION['used'] = [
    ['id' => 'HS123456', 'name' => 'ABC', 'mobile' => '1234567890', 'email' => 'fgh@gmail.com'],
    ['id' => 'HS123457', 'name' => 'DBE', 'mobile' => '1234567890', 'email' => 'try@gmail.com'],
    ['id' => 'HS123458', 'name' => 'GHJ', 'mobile' => '1234567890', 'email' => 'sc@gmail.com'],
    ['id' => 'HS123459', 'name' => 'YUI', 'mobile' => '1234567890', 'email' => 'bh5@gmail.com'],
    ['id' => 'HS123451', 'name' => 'SEG', 'mobile' => '1234567890', 'email' => '675fghfg@gmail.com'],
    ['id' => 'HS123452', 'name' => 'ESG', 'mobile' => '1234567890', 'email' => '5756gfh@gmail.com'],
];

if (isset($_POST["studentId"], $_POST["studentName"], $_POST["studentMobile"], $_POST["studentEmail"])) {
    $id = $_POST["studentId"];
    $name = $_POST["studentName"];
    $mobile = $_POST["studentMobile"];
    $email = $_POST["studentEmail"];
    $check_id = false;
    $check_mobile = false;
    $check_email = false;
    if (strlen(trim($id)) > 0 && strlen(trim($name)) > 0 && strlen(trim($mobile)) > 0 && strlen(trim($email)) > 0) {
        if (checkValidId($id) && strlen($mobile) == 10) {
            foreach ($_SESSION['used'] as $user) {
                if ($user['id'] == $id) {
                    $check_id = true;
                }
                if ($user['mobile'] == $mobile) {
                    $check_mobile = true;
                }
                if ($user['email'] == $email) {
                    $check_email = true;
                }
            }

            if ($check_id) {
                $log = "<h1>Student ID is invalid or already exists.</h1>";
            } elseif ($check_mobile) {
                $log = "<h1>Mobile number is invalid or already exists.</h1>";
            } elseif ($check_email) {
                $log = "<h1>Email is invalid or already exists.</h1>";
            } else {
                array_push($_SESSION['used'], ['id' => $id, 'name' => $name, 'mobile' => $mobile, 'email' => $email]);
                $log = "<h1>Add student successfully.</h1>";
            }
        } else {
            $log = "<h1>Student ID is invalid.</h1>";
        }
    } else {
        $log = "Nope!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
</head>

<body>
    <h1>Student Management System</h1>

    <form method="POST" action="">
        <label for="studentId">Student ID:</label>
        <input type="text" name="studentId" required>

        <label for="studentName">Name:</label>
        <input type="text" name="studentName" required>

        <label for="studentMobile">Mobile:</label>
        <input type="text" name="studentMobile" required>

        <label for="studentEmail">Email:</label>
        <input type="email" name="studentEmail" required>

        <button type="submit">Add Student</button>
    </form>

    <?php
    if (isset($log)) {
        echo $log;
    }
    ?>

    <h2>Student List</h2>
    <ul>
        <?php
        foreach ($_SESSION['used'] as $user) {
            echo "<li>{$user['id']} - {$user['name']} - {$user['mobile']} - {$user['email']}</li>";
        }
        ?>
    </ul>
</body>

</html>
