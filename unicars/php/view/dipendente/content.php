<?php
switch ($vd->getSottoPagina()) {
    case 'anagrafica':
        include 'anagrafica.php';
        break;

    case 'appelli':
        include 'appelli.php';
        break;
    
    case 'appelli_modifica':
        include 'appelli.php';
        include 'appelli_modifica.php';
        break;
    
    case 'appelli_crea':
        include 'appelli.php';
        include 'appelli_crea.php';
        break;
    
    case 'appelli_iscritti':
        include 'appelli.php';
        include 'appelli_iscritti.php';
        break;
    
    case 'reg_esami':
        include 'reg_esami.php';
        break;
    
    case 'reg_esami_step1':
        include 'reg_esami_step1.php';
        break;
    
    case 'reg_esami_step2':
        include 'reg_esami_step2.php';
        break;
    
     case 'reg_esami_step3':
        include 'reg_esami_step3.php';
        break;
    
    case 'el_esami':
        include 'el_esami.php';
        break;
    
    case 'el_esami_json':
        include 'el_esami_json.php';
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
            <li><a href="dipendente/prenotazioni">Prenotazioni</a></li>
        </ul>
        <?php
        break;
}
?>


