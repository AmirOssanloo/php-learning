<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["photo"])) {
      if ($_FILES["photo"]["error"] != 0) {
        die("Error: " . $_FILES["photo"]["error"]);
      }

      $allowed = array(
        "jpg" => "image/jpg",
        "jpeg" => "image/jpeg",
        "gif" => "image/gif",
        "png" => "image/png",
      );

      $filename = $_FILES["photo"]["name"];
      $filetype = $_FILES["photo"]["type"];
      $filesize = $_FILES["photo"]["size"];
      $filetmp = $_FILES["photo"]["tmp_name"];

      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      $maxsize = 5 * 1024 * 1024;

      if (!array_key_exists($ext, $allowed)) {
        die("Error: Please select a valid file format.");
      }

      if ($filesize > $maxsize) {
        die("Error: File size is larger than the allowed limit.");
      }

      if (in_array($filetype, $allowed)) {
        $uploadPath = "./uploaded/";

        if (file_exists($uploadPath . $filename)) {
          echo $filename . " already exists.";
        } else {
          move_uploaded_file($filetmp, $uploadPath . $filename);
          echo "Your file was uploaded successfully.";
        }
      } else {
        echo "Error: There was a problem uploading your file. Please try again."; 
      }
    }
  }
?>