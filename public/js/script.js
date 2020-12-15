
const errorContener = document.querySelector('.errorContener');

setTimeout(function(){
    errorContener.style.display = 'none';
}, 5000);

// obsługa scrolowania nawigacji
var nawigacja = document.querySelector('.nawigacjaStronaGlowna');

window.addEventListener('scroll', function () {
    if (window.scrollY > 50) {
        nawigacja.classList.add('nawigacjaPrzewinieta');
    } else {
        nawigacja.classList.remove('nawigacjaPrzewinieta');
    }
})
// koniec scrolowania

//otwieranie aside menu w panelu 

var button = document.querySelector('.fa-bars');
var submenu = document.querySelector('.submenu');

button.addEventListener('click', function(){
    submenu.classList.toggle('show');
})

//koniec otwierania

//select2

$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

//popup z pytaniem o poprawnośc danych
let nazwy;
var openPoup = document.querySelectorAll('.openConfirm');
var showPopup = document.querySelector('.confirmPopupBox');
let dodajDanePopup = document.querySelector('.popupInformacjeBox');
let zmienDane = document.querySelector('.zmienDane');
let poswiata = document.querySelector('.overlay');
document.addEventListener('click', function(e){
    if(e.target.classList.value == "openConfirm"){
    showPopup.style.display = "block";
    poswiata.style.display = "block";
     formularz  = document.querySelector("#"+e.target.parentElement.id);
     nazwy = formularz.querySelectorAll('input');
     for(let i=0; i<nazwy.length; i++){
         if(nazwy[i].name != "_token"){
            let newSpan = document.createElement("span");
            newSpan.classList.add('danaDoPotwierdzenia');
             newSpan.textContent =  nazwy[i].dataset.opis + " - " + nazwy[i].value + "\n";
             dodajDanePopup.appendChild(newSpan);
         }
     }
     
     przeslijDane(e.target.parentElement.id);

    }
})

zmienDane.addEventListener('click', function(){
    let daneDoUsuniecia = document.querySelectorAll('.danaDoPotwierdzenia');
    showPopup.style.display = "none";
    poswiata.style.display = "none";
    for(let i=0; i<daneDoUsuniecia.length; i++){
        daneDoUsuniecia[i].remove();
    }

})

function przeslijDane(formularz){
    document.querySelector('.potwierdzDane').addEventListener("click", function () {
        let getForm = document.querySelector('#' + formularz);
        getForm.submit();
      });
} 

//koniec popupa
