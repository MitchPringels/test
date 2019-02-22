console.log('werkt ook');

var ophaalValue = document.getElementsByClassName('durationSec');
console.log(ophaalValue);

/* ----------------------------------------
Opvragen van alle seconden die budget bevat
---------------------------------------- */
var som = 0;
for (var i = 0 ; i < ophaalValue.length; i++){
  som = som + parseInt(ophaalValue[i].getAttribute('value'));
};

/* ----------------------------------------
Som staat in sec dus omzetten naar uur voor gebruiker
---------------------------------------- */
var deeling1 = som / 60;
var deeling2 = deeling1 / 60;
document.getElementById("volledigeAantalUren").innerHTML = deeling2 + " uur gewerkt aan dit project";
console.log(deeling2);

/* ----------------------------------------
Opvragen van php variabele in Js kijk echo pagina: detail.php
----------------------------------------

var something = '<?php echo ($budget); ?>';
console.log(something);*/
/* ----------------------------------------
Berekening om te zien hoelang je nog mag werken aan een project
---------------------------------------- */
var budget = document.getElementById('myInput').value;
console.log(budget + " url budget");


var uitkomst = deeling2 - budget;
if (budget == 0) {
  document.getElementById("urenOverOfWijnig").innerHTML = "Geen tijd gedefineerd voor dit project.";
  console.log('Geen tijd gedefineerd voor dit project.');
} else if(budget !== 0){
  if (uitkomst>0){
/*
    var paragraaf = document.createElement("p");
    var textInParagraaf = document.createTextNode("Er is al reeds " + uitkomst + " uur over de gegeven " + budget + " uur gewerkt.");
    paragraaf.appendChild(textInParagraaf);

    document.getElementById("demo").appendChild(paragraaf);
*/
    document.getElementById("urenOverOfWijnig").innerHTML = "Er is al reeds " + uitkomst + " uur over de gegeven " + budget + " uur gewerkt.";
    console.log('Er is al reeds ' + uitkomst + ' uur over de gegeven ' + budget + ' uur gewerkt.')
  }else{
    document.getElementById("urenOverOfWijnig").innerHTML = "Slechts " + uitkomst + " uur van de toegewezen " + budget + " uren zijn verstreken.";
    console.log('Slechts ' + uitkomst + ' uur van de toegewezen ' + budget + ' uren zijn verstreken.');
  }

}

/*
$.ajax({
  url: "detail.php",
  method: "POST",
  data: { "deeling2": deeling2 }
})
*/
