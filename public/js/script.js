
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