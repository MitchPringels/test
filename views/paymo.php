<?php

$target_url = "https://app.paymoapp.com/api/projects";
$email = "mitch.pringels@gmail.com"; /* Mijn email */
$password = "IkWerkBijEdge!"; /* Mijn wachtwoord van paymo */

/* ------------------------------------------
              installatie
------------------------------------------ */
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $target_url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
curl_setopt($ch, CURLOPT_USERPWD, $email . ":" . $password);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

/* ------------------------------------------
          van json naar array
------------------------------------------ */
$projects = json_decode(curl_exec($ch), true)['projects'];
if ($projects === false) {
    echo "Curl error: " . curl_error($ch) . "\n";
}

$out = "<h2>Overzicht Projects</h2>";
$out .="<ul class='list'>";
foreach($projects as $project){
  $out .= "<li>";
  $out .= "<button><a href='index.php?page=detail&product_id=".$project['id']
  ."&budget_hours=".$project['budget_hours']."'> ".$project['name']."</a></button>";
  $out .= "</li>";
}
$out .="</ul>";
return $out;

?>
<!--
<script type="text/javascript">
var ul = document.getElementById("list");
var li = document.getElementsByTagName("li");
var numItems = li.length;

var css = document.createElement("style");
css.type = "text/css";
css.innerHTML = "ul { column-count: " + Math.round(numItems/2) + "; }";
document.body.appendChild(css);
</script>
-->
