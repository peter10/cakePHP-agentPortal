<?php

echo "<option value='-1'>" . __('Select a country', true) . "</option>\n";

foreach($countries as $country){
  echo "<option value='" . $country['Airport']['country'] . "'>" . $country['Airport']['country'] . "</option>\n";
}
?>
