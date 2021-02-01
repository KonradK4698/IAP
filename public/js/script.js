
const errorContener = document.querySelector('.errorContener');
const zamknijBledy  = document.querySelector('.closeError');
if(!!zamknijBledy){
    zamknijBledy.addEventListener('click', function(){
        errorContener.style.display = "none";
    })
}


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
    $('#wybierzTytul').select2({
        tags: true,
    });
    $('#wybierzLekSelect').select2();
});

$('#wybierzTytul').one('select2:open', function(e) {
    $('input.select2-search__field').prop('placeholder', 'Wpisz tytuł, jeżeli nie ma go w opcji wyboru i potwierdź klawiszem "Enter"');
});

$('#wybierzLekSelect').one('select2:open', function(e) {
    $('input.select2-search__field').prop('placeholder', 'Wyszukaj lek');
});


//datables

$(document).ready(function() {
    $('#leki').DataTable();
} );

$(document).ready(function() {
    $('#uzytkownicy').DataTable();
    $('#waga').DataTable();
    $('#wzrost').DataTable();
    $('#obwody').DataTable();
    $('#lekiAdmin').DataTable();
    $('#wydarzenia').DataTable();
    $('#cisnienie').DataTable();
} );


//datatables koniec

//popup z pytaniem o poprawnośc danych
let nazwy;
const openPoup = document.querySelectorAll('.openConfirm');
const showPopup = document.querySelector('.confirmPopupBox');
const dodajDanePopup = document.querySelector('.popupInformacjeBox');
const zmienDane = document.querySelector('.zmienDane');
const poswiata = document.querySelector('.overlay');
const potwierdz = document.querySelector('.potwierdzDane');
document.addEventListener('click', function(e){
    if(e.target.classList.value == "openConfirm"){
    showPopup.style.display = "block";
    poswiata.style.display = "block";
     formularz  = document.querySelector("#"+e.target.parentElement.id);
     nazwy = formularz.querySelectorAll('[data-opis]');
     console.log(nazwy);
     for(let i=0; i<nazwy.length; i++){
        
         if(nazwy[i].name != "_token"){
            let newSpan = document.createElement("span");
            newSpan.classList.add('danaDoPotwierdzenia');
             
                
             if(nazwy[i].id == "wybierzLekSelect"){
                newSpan.textContent =  nazwy[i].dataset.opis + " - " + nazwy[i].options[nazwy[i].selectedIndex].text + "\n";
             }else{
                newSpan.textContent =  nazwy[i].dataset.opis + " - " + (nazwy[i].type=="checkbox" ? (nazwy[i].checked==true ? "Wyrażono zgodę" : "Brak zgody") : nazwy[i].value) + "\n";
             }
             
             dodajDanePopup.appendChild(newSpan);  
         }

         if(nazwy[i].type == "checkbox"){
            if(nazwy[i].checked == true){
                potwierdz.style.display = "block";
                przeslijDane(e.target.parentElement.id);
            } else{
                potwierdz.style.display = "none";
            }   
          }else{
              przeslijDane(e.target.parentElement.id);
          } 
     }
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

