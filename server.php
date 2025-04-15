<?php

// Read file JSON
$json = file_get_contents('dischi.json');


// Decode JSON to PHP array
$dischi = json_decode($json, true);
