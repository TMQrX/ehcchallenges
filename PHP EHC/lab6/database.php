<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nung";

// Create a connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database if it doesn't exist
// $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
// if ($conn->query($sql) === TRUE) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . $conn->error;
// }

// $sql = " CREATE TABLE students (
//     mssv INT(6),
//     hovaten VARCHAR(30),
//     mobile INT(10),
//     email VARCHAR(30) 

// )";

// // if ($conn->query($sql) === TRUE) {
// //     echo "Table created successfully";
// // } else {
// //     echo "Error creating table: " . $conn->error;
// // }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete_mssv"])) {
        $delete_mssv = $_POST["delete_mssv"];
        $delete_sql = "DELETE FROM students WHERE mssv='$delete_mssv'";

        if ($conn->query($delete_sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } elseif (isset($_POST["edit_mssv"])) {
        $edit_mssv = $_POST["edit_mssv"];
        $edit_hovaten = $_POST["edit_hovaten"];
        $edit_mobile = $_POST["edit_mobile"];
        $edit_email = $_POST["edit_email"];

        $update_sql = "UPDATE students SET hovaten='$edit_hovaten', mobile='$edit_mobile', email='$edit_email' WHERE mssv='$edit_mssv'";

        if ($conn->query($update_sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } elseif (isset($_POST["check_details"])) {
        $mssv_to_check = $_POST["mssv_to_check"];

        $check_sql = "SELECT * FROM students WHERE mssv='$mssv_to_check'";
        $check_result = mysqli_query($conn, $check_sql);
        echo '<h2>Details</h2>';
        echo '<div>';
        if (mysqli_num_rows($check_result) > 0) {
            while ($row = mysqli_fetch_array($check_result)) {
                echo 'Thong tin chi tiet: ';
                echo 'ID: ' . $row['mssv'];
                echo ', Ho Va Ten: ' . $row['hovaten'];
                echo ', Mobile: ' . $row['mobile'];
                echo ', Email: ' . $row['email'];
            }
        }
        echo '</div>';
    }else {
        $mssv = $_POST["mssv"];
        $hovaten = $_POST["hovaten"];
        $mobile = $_POST["mobile"];
        $email = $_POST["email"];

        $insert_sql = "INSERT INTO students (mssv, hovaten, mobile, email) VALUES ('$mssv', '$hovaten', '$mobile', '$email')";
        if ($conn->query($insert_sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error inserting record: " . $conn->error;
        }
    }
}
$sql = "SELECT * FROM students";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
        echo 'ID: ' . $row['mssv'];
        echo ', Ho Va Ten: ' . $row['hovaten'];
        echo ', Mobile: ' . $row['mobile'];
        echo ', Email: ' . $row['email'];
        // Delete form
        echo '<form action="database.php" method="post">';
        echo '<input type="hidden" name="delete_mssv" value="' . $row['mssv'] . '">';
        echo '<input type="submit" value="Delete">';
        echo '</form>';
        // Edit form
        echo '<form action="database.php" method="post">';
        echo '<input type="hidden" name="edit_mssv" value="' . $row['mssv'] . '">';
        echo '<input type="text" name="edit_hovaten" placeholder="New Ho Va Ten">';
        echo '<input type="text" name="edit_mobile" placeholder="New Mobile">';
        echo '<input type="email" name="edit_email" placeholder="New Email">';
        echo '<input type="submit" value="Edit">';
        echo '</form>';
    }
}
// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
</head>
<body>
    <h1>Student Information Form</h1>
    <form action="database.php" method="post">
        <label for="mssv">MSSV:</label>
        <input type="text" id="mssv" name="mssv" required><br>

        <label for="hovaten">Họ và tên:</label>
        <input type="text" id="hovaten" name="hovaten" required><br>

        <label for="mobile">Mobile:</label>
        <input type="text" id="mobile" name="mobile" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <input type="submit" value="Submit">
    </form>
    <!-- Check details form -->
    <h2>Check Details</h2>
    <form action="database.php" method="post">
        <label for="mssv_to_check">MSSV to Check:</label>
        <input type="text" id="mssv_to_check" name="mssv_to_check" required>
        <input type="submit" name="check_details" value="Check Details">
    </form>
</body>
</html>