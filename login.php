<?php
require_once('lib/common.php');
session_start();
?>
<?php
if (!isset($_SESSION['Login']) || $_SESSION['Login'] !== true) {

    header("Location: index.php");
    exit;
}
if (isset($_POST['logout'])) {
    session_destroy();
}
?>
<?php
if(isset($_POST['download'])){
if (isset($_GET["file"])) {
    $filePath = "uploads/" . $_GET["file"];
// echo $filePath;
// exit;
    // Check if the file exists
    if (file_exists($filePath)) {
        // Set headers to force download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Content-Length: ' . filesize($filePath));

        // Read the file and output it to the browser
        readfile($filePath);
        exit;
    } else {
        echo "File not found.";
    }
}
}
?>
<p>welcome <?php echo $_COOKIE['name']; ?></p>
<form method='post'>

<button type="submit" class='btn btn-primary col-md-2' name='download'>download</button>
    <a class=" btn btn-dark text-light col-md-2" name='logout' href="index.php">Log Out</a>

</form>
<?php
require_once('lib/footer.php');
?>