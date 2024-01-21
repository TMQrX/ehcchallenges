<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "labehc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function displayStudents() {
    global $conn;
    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["id"]."</td>
                    <td>".$row["name"]."</td>
                    <td>".$row["mobile"]."</td>
                    <td>".$row["email"]."</td>
                    <td><a href='index.php?action=view&id=".$row["id"]."'>View</a> | 
                        <a href='index.php?action=edit&id=".$row["id"]."'>Edit</a> |  
                        <a href='index.php?action=delete&id=".$row["id"]."' onclick='return confirm(\"Are you sure you want to delete this student?\");'>Delete</a>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "No records found";
    }
}


function viewStudent($id) {
    global $conn;
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>Student Details</h2>";
        echo "<p>ID: " . $row["id"] . "</p>";
        echo "<p>Name: " . $row["name"] . "</p>";
        echo "<p>Mobile: " . $row["mobile"] . "</p>";
        echo "<p>Email: " . $row["email"] . "</p>";
        echo "<p><a href='index.php'>Back to student list</a></p>";
    } else {
        echo "Student not found";
    }
}


function editStudent($id, $name, $mobile, $email) {
    global $conn;
    $sql = "UPDATE students SET name='$name', mobile='$mobile', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Student information updated successfully!";
    } else {
        echo "Error updating student information: " . $conn->error;
    }
}


function deleteStudent($id) {
    global $conn;
    $sql = "DELETE FROM students WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Student deleted successfully!";
    } else {
        echo "Error deleting student: " . $conn->error;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        switch ($action) {
            case 'add':
                $name = $_POST['name'];
                $mobile = $_POST['mobile'];
                $email = $_POST['email'];

                $sql = "INSERT INTO students (name, mobile, email) VALUES ('$name', '$mobile', '$email')";
                if ($conn->query($sql) === TRUE) {
                    echo "New student added successfully!";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                break;

            case 'edit_student':
                $studentId = $_POST['student_id'];
                $name = $_POST['name'];
                $mobile = $_POST['mobile'];
                $email = $_POST['email'];

                editStudent($studentId, $name, $mobile, $email);
                break;

            default:
                break;
        }
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

    <!-- Form for adding new student -->
    <form method="post" action="index.php">
        <input type="hidden" name="action" value="add">
        <h2>Add New Student</h2>
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <label for="mobile">Mobile:</label>
        <input type="text" name="mobile" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <button type="submit">Add Student</button>
    </form>

    <!-- Display list of students -->
    <?php
        displayStudents();
    ?>

</body>
</html>

<?php
$conn->close();
?>
