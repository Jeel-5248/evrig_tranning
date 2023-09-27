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
// $fileName = $_GET['name'];
// $filesize = $_GET['size'];
// $userName=$_GET['userName'];
// $filename = "your file name is $fileName";
// $fileSize = "your file size is: " . $filesize;
// if (isset($_POST['download'])) {
//     $file_url ="asset/uploads/".$fileName;
//     $ext = pathinfo($file_url, PATHINFO_EXTENSION);
//     //    echo '<br>Name<br>File: '. __FILE__.'<br>Line: '.__LINE__.'<br><pre>';print_r($ext);echo '</pre>'; die();
//     $fNm = str_replace(' ', '', $fileName);

//     //    echo '<br>Name<br>File: '. __FILE__.'<br>Line: '.__LINE__.'<br><pre>';print_r($fNm);echo '</pre>'; die();
//     // header("Content-Type: image/$ext");
//     // // header('Content-Type: application/octet-stream');
//     // header("Content-Disposition: attachment; filename=$fNm");
//     // flush();
//     // // $fPath = "asset/".$fNm;
//     // readfile($file_url);
//     // exit();
//     header('Content-Description: File Transfer');
//       header("Content-Type: image/$ext");
//       header('Content-Disposition: attachment; filename="' .$fNm . '"');
//       header('Expires: 0');
//       header('Cache-Control: must-revalidate');
//       header('Pragma: public');
//       header('Content-Length: ' . $filesize);
//       flush(); // Flush system output buffer
//       readfile($file_url);
// }
if (isset($_POST['download'])) {
    $filePath = trim(__DIR__."/asset/uploads/" . $_GET["name"]);
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
    // $file_url = trim(__DIR__."/asset/uploads/" . $fileName);
    // /var/www/html/tranning/asset/uploads/passbook.jpeg
    // echo $file_url;
    //   echo 'http://127.0.0.1/tranning/asset/uploads/'.$fileName;exit;
    // if (file_exists($file_url)) {
    //     // Debugging information
    //     echo "File URL: $file_url<br>";
    //     $mime_type = mime_content_type($file_url);
    //     echo "MIME Type: $mime_type<br>";
    //     exit;
    //     // ... rest of the download code
    // } else {
    //     echo "File not found!";
    //     exit;
    // }
    // $ext = pathinfo($file_url, PATHINFO_EXTENSION);
    // $fNm = str_replace(' ', '', $fileName);

    // // Determine the correct Content-Type based on the file extension
    // $mime_type = mime_content_type($file_url);

    // if ($mime_type === false) {
    //     // If mime_content_type fails, use a generic MIME type
    //     $mime_type = 'application/octet-stream';
    // }

    // // Set the Content-Type header
    // header("Content-Type: $mime_type");

    // // Set other headers
    // header('Content-Description: File Transfer');
    // header('Content-Disposition: attachment; filename="' . $fNm . '"');
    // header('Expires: 0');
    // header('Cache-Control: must-revalidate');
    // header('Pragma: public');
    // header('Content-Length: ' . $filesize);

    // flush(); // Flush system output buffer
    // readfile('file:///var/www/html/tranning/asset/uploads/Screenshot_20230926_112420.jpg');
    // exit;
    // readfile($file_url);
    // exit();
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