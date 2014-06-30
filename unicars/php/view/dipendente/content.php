<?php
switch ($vd->getSottoPagina()) {
    case 'anagrafica':
        include 'anagrafica.php';
        break;

    case 'noleggi':
        include 'noleggi.php';
        break;
    
    case 'noleggi_json':
        include 'noleggi_json.php';
        break;
        ?>
        

    <?php default: ?>
        <h2 class="icon-title" id="h-home">Pannello di Controllo</h2>
        <p>
            Benvenuto, <?= $user->getNome() ?>
        </p>
        <p>
            Scegli una fra le seguenti sezioni:
        </p>
        <ul class="panel">
            <li><a href="dipendente/anagrafica">Anagrafica</a></li>
            <li><a href="dipedente/auto">Parco auto</a></li>
            <li><a href="dipendente/noleggi">Noleggi</a></li>
        </ul>
        <?php
        break;
}
?>


