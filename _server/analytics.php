<?php
// Read current playCount from analytics JSON file, 
// increment and overwrite value
$ANALYTICS_FILE_PATH =  "../_data/projects/1/analytics/analytics.json";

$str_data = file_get_contents($ANALYTICS_FILE_PATH);
$data = json_decode($str_data,true);

$playCount = $data["hypervideos"]["2"]["playCount"];

// increment playCount value
$newPlayCount = $playCount + 1;
$data["hypervideos"]["2"]["playCount"] = $newPlayCount;

// overwrite file with incremented value 
$fh = fopen($ANALYTICS_FILE_PATH, 'w')
      or die("Error opening output file");
fwrite($fh, json_encode($data,JSON_UNESCAPED_UNICODE));
fclose($fh);

// Debug
echo $newPlayCount;

return
?>