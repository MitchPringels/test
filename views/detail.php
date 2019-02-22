<?php

/* ------------------------------------------
   url id opvragen om te kunnen gebruiken
------------------------------------------ */
$page = $_GET["product_id"];
$budget = $_GET["budget_hours"];

$target_url = "https://app.paymoapp.com/api/entries?where=project_id=$page";
$email = "mitch.pringels@gmail.com";
$password = "IkWerkBijEdge!";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $target_url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
curl_setopt($ch, CURLOPT_USERPWD, $email . ":" . $password);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$timeEntries = json_decode(curl_exec($ch), true)['entries'];
if ($timeEntries === false) {
    echo "Curl error: " . curl_error($ch) . "\n";
}
//var_dump($timeEntries);

/* !!GEEN . VERGETEN!! */
$out = "<h2>Details</h2>";
$out .= "<input type='hidden' id='myInput' value='$budget'>";
$out .= "<button class='reload' onclick='location.reload()'>Update</button>";

$out .= "<h3 id='volledigeAantalUren'></h3>";
$out .= "<p id='urenOverOfWijnig'></p>";
$out .="<ol>";
foreach($timeEntries as $duration){
  $out .= "<li>";
  $out .= "<br/> <p>Duration:</p>";
  /* Berelening van sec naar uur */
  $secMin = $duration["duration"]/60;
  $minUur = $secMin/60;
  $out .= "<p class='durationSec' value='".$duration["duration"]."'>$minUur u</p>";
  $out .= "</li>";
}
$out .="</ol>";

/*
$deeling2 = $_POST['deeling2'];
echo($deeling2);

  echo "
    <script type=\"text/javascript\">

    console.log($budget);

    var uitkomst = 0;
    if ($budget === 0) {
      console.log('Geen tijd gedefineerd voor dit project.');
    } else if($budget !== 0){
      uitkomst = $budget;
      console.log('Project heeft een waarde toegekent.')
    }

    </script>
  ";
*/
return $out;
?>
