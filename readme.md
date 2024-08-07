Zadanie pre WEB Developer position for the jewelry e-shop - ŠPERKY s.r.o.

Spustenie projektu:

Nainštalujeme si balíčky pomocou composer z composer.json
1. Composer install 

2. Pre spustenie projektu je potrebné nastaviť localhost na virtualHost

3. V APP/.migrations sú query pre tabuľky

Príklad XAMPP VirtualHost: 

Krok 1) C:\WINDOWS\system32\drivers\etc\ Open the "hosts" file :

127.0.0.1       localhost
127.0.0.1       zadanie.local

Krok 2) xampp\apache\conf\extra\httpd-vhosts.conf

<VirtualHost *:80>
    DocumentRoot C:/xampp/htdocs/test/
    ServerName zadanie.local
</VirtualHost>

Krok 3) C:\xampp\apache\conf\httpd.conf.

#Virtual hosts
Include conf/extra/httpd-vhosts.conf

Krok 4) Reštartujte XAMPP a v prehliadači zadajte :

zadanie.local


Pre riešenie úlohy som postupoval nasledovne:
1. Vytvoríl MySQL tabuľky product a product_attribute a naplníl ich náhodnými dátami.

2. Napísal som v ProductRepository metódou getWarehouseValue, ktorá vykoná SQL dotaz a vráti hodnotu skladu v EUR.

3. Vytvoril nette.ajax volanie v default.latte a spracoval odpoveď z PHP pre zobrazenie výsledku.

4. Pre výpočet EUR som postupoval nasledovne
    Použil som COALESCE v SQL, ktorá vráti prvú nenulovú hodnotu zo zoznamu argumentov.
    Používa sa na náhradu nulových (NULL) hodnôt inými hodnotami. Kde chceme z tabuliek product a product_attribute so stĺpcami, ktoré môžu obsahovať nulové hodnoty. 
    Chceme získať hodnotu, ktorá nie je NULL, z oboch tabuliek.
    Vyberal som podľa pid, kde mi vybralo konkretný produkt podľa toho na aký btn bolo kliknuté a následne som vynásobil purchase_price_usd s rate_eur_usd a tím som ziskal cenu v eur, ktorú som vynásobil s stock_quantity. 