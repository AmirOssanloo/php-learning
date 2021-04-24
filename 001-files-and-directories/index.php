<?php
  define("ALBUMS_PATH", "./albums");

  function getFiles($path) {
    $files = array_diff(scandir($path), array('.', '..'));
    $result = [];

    if (count($files) > 0) {
      foreach ($files as $file) {
        $filePath = "$path/$file";

        if (is_file($filePath)) {
          $fileLinesList = file($filePath) or die("ERROR: Cannot open the file.");
          return $fileLinesList;
        } else {
          $result[$file] = getFiles($filePath);
        }
      }
    } else {
      echo "ERROR: No files found in the directory.";
    }

    return $result;
  }

  $albums = getFiles(ALBUMS_PATH);

  foreach ($albums as $album) {
    
  }
  print_r($albums["Dimmu Borgir"]["Abrahadabra"]);
?>
