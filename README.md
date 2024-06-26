Creați o aplicație care monitorizează alte aplicații. Sa ii spunem ItecMonitor.

ItecMonitor va avea un Developer Dashboard si un Dashboard public. Dashboardul pentru Developer se poate accesa doar după autentificare.
~~Autentificarea poate fi atât user/pass~~ cat si prin social media accounts.

Punctarea se va face bazat pe Tiers. Pentru fiecare tier îndeplinit se primesc de la 0 la 10 de puncte in funcție de complexitatea implementării.

Tier 1.
* ~~Developerul poate să adauge Aplicații pentru monitorizare, si poate înregistra endpointuri pentru aceasta aplicație~~.
* ~~Pentru fiecare aplicație, Developerul are acces la un Dashboard, in care vede toate endpointurile listate cu starea lor pe ultimele X zile/ore.~~

Tier 2.
* P~~entru a monitoriza starea aplicației, ItecMonitor va call-uii endpointurile înregistrate în intervale de X secunde si va asigna 3 stări acelui endpoint~~:
    - Stable (ultimele 10 call-uri sunt 200 sau 302)
    - Unstable (exista cel puțin un call, din ultimele 10 care nu este 200 sau 302)
    - Down (nici unul din ultimele 10 call-uri nu e 200 sau 302)
~~* In funcție de răspunsuri se va afișa in Dashboard evoluția stării fiecărui endpoint.~~
* Starea aplicației este definita de cumulul stărilor endpointurile. Adică,
  ~~Daca toate endpointurile sunt pe Stable, aplicația e Stable.~~
  ~~Daca cel puțin un endpoint este pe Unstable sau Down, atunci aplicația este Unstable.~~
  ~~Daca toate endpointurile sunt pe Down, aplicația este Down.~~

Tier 3.
~~* Din Dashboardul public, se poate raporta un bug de către orice utilizator/vizitator al acelui Dashboard.~~
~~* Odată raportat, bug-ul trebuie sa apară într-o secțiune dedicată în Dashboardul Developerului si Aplicația trece pe Unstable daca este pe Stable. Daca Aplicația este pe Unstable sau Down, raportarea unui bug nu va schimba starea aplicației. Daca aplicația are raportat un bug, cat timp acesta nu este marcat ca rezolvat de către Developer, aplicația NU poate trece înapoi in Stable.~~

Tier 4.
* ~~Când este raportat un bug, Developerul este notificat. Alegerea modalității de notificare este la alegerea echipei, si in funcție de complexitate se va primi punctaj diferit.~~

Tier 5.
* ~~Starea endpointurilor se va reîmprospăta in real-time pe Dashboardului.~~
* ~~Developerul are posibilitatea, într-o rubrica de Setări, sa editeze intervalele notate cu X in enunț.~~
