<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File upload and download</title>
</head>
<body>
  <h1>Upload file:</h1>
  <form action="upload-manager.php" method="post" enctype="multipart/form-data">
    <input id="file-select" type="file" name="photo">
    <button class="btn btn-primary" type="submit" name="submit" value="upload">Submit</button>
  </form>
  <br /><br /><hr />

  <h1>Download files:</h1>
  <?php
    define("IMAGES_PATH", "./uploaded/");

    if (file_exists(IMAGES_PATH) && is_dir(IMAGES_PATH)) {
      $files = array_diff(scandir(IMAGES_PATH), array('.', '..', '.DS_Store'));

      if (count($files) > 0) {
        foreach ($files as $file) {
          echo "<a href=\"download-manager.php?file=" . urlencode($file) . "\">" . $file . "</a><br />";
        }
      }
    } else {
      echo "ERROR: No files found in the directory";
    }
  ?>
</body>
</html>