<?php
if (isset($_GET["file"])) {
    $filePath = "uploads/" . $_GET["file"];

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
?>