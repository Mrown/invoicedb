<?php
// example for json data - in this case a local file
$jsondata = file_get_contents("data.json");
$json = json_decode($jsondata, true);

//we make an output in the form of a UL, and every LI is $output within the foreach loop
//the output is then looped for each client containing the beneath outputs.
$output = "<ul>";
foreach ($json['clients'] as $clients) {
  $output .= "<h4>Name: " . $clients['name'] . "</h4>";
  $output .= "<h4>Phone: " . $clients['phone'] . "</h4>";
  $output .= "<h4>Ammount due: " . $clients['currency'] . "</h4>";
  $output .= "<br>" . "</br>";
}
$output .= "</ul>";
echo $output;;