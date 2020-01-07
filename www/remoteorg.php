<?php
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, 'https://rest.db.ripe.net/search?source=RIPE&query-string='.$_SERVER['HTTP_X_FORWARDED_FOR']);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Accept: application/json'
  ));

  $return = '';
  $values = array();
  foreach (json_decode(curl_exec($curl), true)['objects']['object'] as $j) {
    foreach ($j as $k) {
      foreach ($k['attribute'] as $l) {
        if ($l['name'] == 'address') {
          if (!in_array($l['value'], $values)) {
            $return .= $l['value'].'; ';
            $values[] = $l['value'];
          }
        }
      }
    }
  }
  echo substr(trim($return),0,-1);

  curl_close($curl);
?>
