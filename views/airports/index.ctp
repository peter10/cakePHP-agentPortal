<?php
if ($index_by == 'airport'):
foreach($airports as $airport){
  echo "<option value='" . $airport['Airport']['iata'] . "'>" . $airport['Airport']['airport'] . " (" . $airport['Airport']['iata'] . ")</option>\n";
}
else: // $index_by == 'city'
foreach($airports as $airport){
  echo "<option value='" . $airport['Airport']['iata'] . "'>" . $airport['Airport']['city'] . " (" . $airport['Airport']['iata'] . ")</option>\n";
}
endif;
?>