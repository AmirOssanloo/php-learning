<?php
  if (isset($_REQUEST["file"])) {
    $file = urldecode($_REQUEST["file"]);

    if (preg_match("/^[^.][-a-z0-9_.]+[a-z]$/i", $file)) {
      $filepath = "./images/" . $file;

      if (file_exists($filepath)) {
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"$filepath\"");
        header("Expires: 0");
        header("Cache-Control: must-revalidate");
        header("Pragma: public");
        header("Content-Length: " . filesize($filepath));
        
        flush();
        readfile($filepath);
        die();
      } else {
        http_response_code(404);
        die();
      }
    } else {
      die("Invalid file name!");
    }
  }

?>