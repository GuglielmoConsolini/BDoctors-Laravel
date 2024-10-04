BDoctors - Professional Medical Profiles
BDoctors è un'applicazione web sviluppata in gruppo utilizzando Laravel. Consente ai medici di creare un profilo professionale e di gestire la propria visibilità online acquistando sponsorizzazioni. Le sponsorizzazioni permettono ai medici di aumentare la visibilità del loro profilo per un periodo limitato, attraverso il sistema di pagamento integrato Braintree.

Caratteristiche principali
Operazioni CRUD: Ogni medico può creare, visualizzare, modificare ed eliminare il proprio profilo professionale.
Profili dettagliati: I medici possono fornire informazioni dettagliate come biografia, specializzazioni, immagini del profilo e curriculum (CV).
Sponsorizzazioni: Possibilità di acquistare sponsorizzazioni per aumentare la visibilità del profilo per un certo periodo di tempo.
Pagamenti con Braintree: Integrazione con Braintree per gestire i pagamenti in modo sicuro e affidabile.
Tecnologie utilizzate
Backend: Laravel 9.x (PHP)
Frontend: Vue.js (per alcune parti interattive dell'interfaccia utente)
Database: MySQL
Autenticazione: Laravel Breeze
Pagamenti: Braintree (integrazione tramite braintree-web-drop-in)

Funzionalità
Operazioni CRUD per il profilo medico
Ogni utente registrato può creare e gestire il proprio profilo professionale. Le informazioni che possono essere inserite nel profilo includono:

Nome, cognome, indirizzo e numero di telefono
Specializzazioni
Biografia professionale
Immagine del profilo e curriculum vitae (CV)
Sponsorizzazioni
I medici possono acquistare diverse sponsorizzazioni per aumentare la visibilità del loro profilo. Le sponsorizzazioni disponibili sono:

Basic: Visibilità per 30 giorni al costo di 29,99€
Premium: Visibilità per 60 giorni al costo di 49,99€
Gold: Visibilità per 90 giorni al costo di 79,99€
Il sistema di pagamento è gestito tramite Braintree, che offre una piattaforma sicura e affidabile per effettuare le transazioni.

Sviluppo
Struttura del database
La struttura del database include tabelle per la gestione dei medici, delle specializzazioni, delle recensioni, e delle sponsorizzazioni. Alcune delle tabelle principali includono:

users: Contiene le informazioni di base sugli utenti registrati.
doctors: Contiene i dettagli del profilo medico.
reviews: contiene le recensioni da parte degli utenti.
messages: contiene i messaggi inviati dagli utenti.
specializations: Contiene le specializzazioni disponibili.
doctor_sponsorship: Tabella pivot che collega i medici alle specializzazioni.
sponsorships: Contiene le informazioni sulle sponsorizzazioni.
doctor_sponsorship: Tabella pivot che collega i medici alle sponsorizzazioni acquistate
