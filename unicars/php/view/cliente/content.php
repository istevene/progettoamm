<?php
switch ($vd->getSottoPagina()) {
    case 'anagrafica':
        include_once 'anagrafica.php';
        break;

    case 'prenotazioni':
        include_once 'prenotazioni.php';
        break;

    default:
        ?>
        <h2 class="icon-title" id="h-home">Pannello di Controllo</h2>
        <p>
            Benvenuto, <?= $user->getNome() ?>
        </p>
        <p>
            Scegli una fra le seguenti sezioni:
        </p>
        <ul class="panel">
            <li><a href="cliente/anagrafica">Anagrafica</a></li>
            <li><a href="cliente/prenotazioni">Prenotazioni</a></li>
        </ul>
        <?php
        break;
}
?>


