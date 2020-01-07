<?php
  echo gethostbyaddr($_SERVER['HTTP_X_FORWARDED_FOR'])."\n";
?>
