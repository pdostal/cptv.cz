<?php
  if (strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'http') {
    echo "False\n";
  } else {
    echo "True\n";
  }
?>
