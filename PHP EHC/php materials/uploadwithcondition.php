<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <script>
        function validateFile() {
            var fileInput = document.getElementById('image');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type. Please upload a JPG, JPEG, PNG, or GIF file.');
                fileInput.value = '';
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h2>Upload and Hien Thi Image</h2>

    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateFile()">
        <label for="image">Select Image:</label>
        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png, .gif" required>
        <br>
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <div id="imageContainer">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
            $uploadDir = "uploads/";
            $uploadFile = $uploadDir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

            $allowedExtensions = array("jpg", "jpeg", "png", "gif");

            if (in_array($imageFileType, $allowedExtensions)) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
                    echo '<img src="' . $uploadFile . '" alt="Uploaded Image" style="max-width: 300px; margin: 10px;">';
                } else {
                    echo "Error uploading image.";
                }
            } else {
                echo "Invalid file type. Please upload a JPG, JPEG, PNG, or GIF file.";
            }
        }
        ?>
    </div>
</body>
</html>
