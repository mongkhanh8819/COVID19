<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Simple Image Gallery</title>
<!--
<style type="text/css">
    .img-box{
        display: inline-block;
        text-align: center;
        margin: 0 15px;
    }
</style>
-->
</head>
<body >
    <?php
    // Array containing sample image file names
    $images = array("GK2.docx","KT.pdf", );
    
    // Loop through array to create image gallery
    foreach($images as $image){
        echo '<div class="img-box">';
           //echo '<img src="IMG/' . $image . '" width="200" alt="' .  pathinfo($image, PATHINFO_FILENAME) .'">';
            echo '<p><a href="tst.php?file=' . urlencode($image) . '">Download</a></p>';
        echo '</div>';
    }
    ?>
	<?php
if(isset($_REQUEST["file"])){
    // Get parameters
    $file = urldecode($_REQUEST["file"]); // Decode URL-encoded string
    $filepath = "IMG/" . $file;
    
    // Process download
    if(file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Flush system output buffer
        readfile($filepath);
        exit;
    }
}
?>
</body>
</html>