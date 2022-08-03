# Inteligentny asystent pacjenta
#### Niniejsza aplikacja powstała na potrzeby opracowanej pracy inżynierskiej
Głównym celem programu jest dostarczenie użytkownikowi aplikacji wspierającej go w codziennych czynnościach związanych z dbaniem o jego zdrowie, oraz zdrowy tryb życia.  Inteligentny asystent pacjenta jest dostępny dla użytkowników za pomocą przeglądarki. Po uprzednim utworzeniu konta, a następnie zalogowaniu na nie, do dyspozycji użytkownika zostały oddane następujące funkcjonalności: 

- **Panel użytkownika** - prezentujący podstawowe informacje po zalogowaniu na konto
- **Dane użytkownika** - widok pozwalający uzupełnić dane osobowe,
- **Dane dodatkowe** - sekcja umożliwiająca dodanie wymiarów użytkownika,
- **Pomiar ciśnienia** - widok przechowujący informacje o dadanych pomiarach ciśnienia,
- **Baza leków**
- **Twoje leki** - widok umożliwający dodawanie aktualnie zażywanych leków, a także tworzący harmonogram dawkowania ich,
- **Dodaj wydarzenie**
- **Raport** - sekcja przechowująca raporty podsumowujące każdy miesiąc użytkownika,
- **Historia**
- **Administracja** - panel administratora przeznaczony do zarządzania funkcjonalnościami w aplikacji,



## Wykorzystane technologie 

- PHP - Wersja 7 - Aplikacja stabilnie działa z PHP w wersji 7.2.5 oraz 7.3.3
- Laravel - wersja 7.30.0
- HTML
- CSS i SASS
- JavaScript
- MySQL
- XAMPP i phpMyAdmin
- Composer


## Instrukacja uruchomienia
1. **Pobranie plików**<br/>
Niniejsza aplikacja działa w oparciu o narzędzie XAMPP uruchomionym na systemie Windows. W celu poprawnego uruchomienia aplikacji, należy: 
    - upewnić się że posiadasz zainstalowane narzędzie XAMPP 
    - przejść do katalogu **htdocs** w folderze XAMPP
    - umieścić pobrane pliki w kaalogu **htdocs**
3. **Instalacja niezbędnych plików** <br/>
W celu instalacji niezbędnych plików wykorzystano narzędzie composer, aby zainstalować pliki: 
    - Upewnij się że posiadasz zainstalowane narzędzie composer
    - Otwórz terminal w folderze którym są pliki aplikacji, 
    - Uruchom polecenie ``` composer install ```
4. **Utworzenie bazy danych** - Utwórz nową bazę danych MySQL, np. za pomocą phpMyAdmin. W trakcie tworzenia bazy, pamiętaj o wykorzystaniu odpowiedniego kodowania np. **"utf8_unicode_ci"**
5. **Dostosuj plik konfiguracyjny** <br/>
    - Znjadź plik **".env.example"** i usuń z niego rozszerzenie **".example"**
    - W powstałym pliku **".env"**, uzupełnij niezbęde informacje w celu połączenia się z bazą danych <br/>
    ```
    DB_CONNECTION=mysql #tutaj wprowadź nazwę bazy danych
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE= #nazwa bazy danych
    DB_USERNAME= #login do bazy danych
    DB_PASSWORD= #hasło do bazy danych
    ```
4. Wprowadź dane do bazy danych wykorzystując przygotowane dane, uruchamiając poniższe polecenia: <br/>
```
php artisan migrate
php artisan db:seed
```
5. Wygeneruj klucz aplikacji <br/>

```
php artisan key:generate
```
6. Uruchom aplikacje </br>

Wpisując polcenie ``` php artisan serve ``` następnie przechodząc pod wskazany adres w konsoli. <br/>

Gdyby generowanie plików PDF nie działało, należy uruchomić aplikację za pomocą lokalnego serwera XAMPP.

