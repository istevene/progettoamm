
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Progetto Amministrazione di Sistema</title>
    </head>
    <body>
        <h1>Accesso al progetto</h1>
        <p>
            <a href="http://spano.sc.unica.it/amm2014/landeStefano/unicars/php/login">Login</a>
        </p>
        <p>
        <h3>Descrizione</h3>
        L'applicazione gestisce le funzionalità di un autonoleggio. Gli utenti sono divisi in clienti e dipendenti.</br>
        I dipendenti possono:
        <ul>
            <li>Visualizzare il parco auto</li>
            <li>Aggiungere veicoli al parco auto</li>
            <li>Rimuovere veicoli dal parco auto</li>
            <li>Visualizzare lo storico prenotazioni di tutti gli utenti</li>
            <li>Gestire la propria anagrafica</li>
        </ul>
        I clienti possono:
        <ul>
            <li>Visualizzare il parco auto</li>
            <li>Registrare un noleggio</li>
            <li>Visualizzare lo storico dei propri noleggi</li>
        </ul>
    </p>
    <p>
        <h3>Note</h3>
        <ul>
            <li>Le date sono nel formato Y-m-d</li>
            <li>Il costo giornaliero è una caratteristica del modello di veicolo, non del singolo veicolo</li>
        </ul>
    </p>
    <p>
    <h3>Requisiti soddisfatti</h3>
    <ol>
        <li>Utilizzo di HTML e CSS</li>
        <li>Utilizzo di PHP e MySQL</li>
        <li>Utilizzo del pattern MVC</li>
        <li>Dueue ruoli (cliente e dipendente)</li>
        <li>Transazione per il salvataggio di un nuovo noleggio (metodo nuovo della classe NoleggioFactory)</li>
        <li>Caricamento ajax dei risultati filtrati dello storico dei noleggi (ruolo dipendente)</li>
    </ol>
</p>
<p>
<h3>Utenti</h3>
<ul>
    <li>Dipendente
        <ul>
            <li>username: stefano</li>
            <li>passowrd: stefano</li>
        </ul>
    </li>
    <li>Cliente
        <ul>
            <li>username: davide</li>
            <li>passowrd: davide</li>
        </ul>
    </li>
</ul>
</p>

</body>
</html>
