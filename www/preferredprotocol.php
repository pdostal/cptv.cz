<?php
  if (filter_var($_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP,FILTER_FLAG_IPV4)) {
    echo "IPv4\n";
  }

  if (filter_var($_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP,FILTER_FLAG_IPV6)) {
    echo "IPv6\n";
  }
?>
