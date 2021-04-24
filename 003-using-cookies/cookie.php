<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    setcookie("name", "maggie");
    echo "hello";
  }
?>