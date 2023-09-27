
<?php
require_once('lib/common.php');
?>
<?php
if (isset($_POST["submit"])) {
    $targetDirectory = "uploads/"; // Directory where uploaded files will be stored
    $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);

    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, the file already exists.";
    } else {
        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";

            // Provide a download link
            echo "<p><a href='download.php?file=" . urlencode(basename($targetFile)) . "'>Download File</a></p>";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

    <h2>Upload a File</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>

    <?php
require_once('lib/footer.php')
?>

