<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>
<body>
    <h2>Upload and Hien Thi Image</h2>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="image">Select Image:</label>
        <input type="file" name="image" id="image" accept="image/*" required>
        <br>
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <h2>Upload Thanh Cong</h2>
    <div id="imageContainer">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
            $uploadDir = "uploads/";
            $uploadFile = $uploadDir . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
                echo '<img src="' . $uploadFile . '" alt="Uploaded Image" style="max-width: 300px; margin: 10px;">';
            } else {
                echo "Error uploading image.";
            }
        }
        ?>
    </div>
</body>
</html>
