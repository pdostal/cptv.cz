<?php
  if (strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'http') {
    echo "True\n";
  } else {
    echo "False\n";
  }
?>
