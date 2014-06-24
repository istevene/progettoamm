<h2 class="icon-title">Docente</h2>
<ul>
    <li class="<?= $vd->getSottoPagina() == 'home' || $vd->getSottoPagina() == null ? 'current_page_item' : ''?>"><a href="dipendente/home">Home</a></li>
    <li class="<?= $vd->getSottoPagina() == 'anagrafica' ? 'current_page_item' : '' ?>"><a href="dipendente/anagrafica">Anagrafica</a></li>
    <li class="<?= $vd->getSottoPagina() == 'auto' ? 'current_page_item' : '' ?>"><a href="dipendente/auto">Parco auto</a></li>
    <li class="<?= $vd->getSottoPagina() == 'prenotazioni' ? 'current_page_item' : '' ?>"><a href="dipendente/prenotazioni">Elenco prenotazioni</a></li></ul>
