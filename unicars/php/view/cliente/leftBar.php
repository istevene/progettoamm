<h2 class="icon-title">Studente</h2>
<ul>
    <li class="<?= $vd->getSottoPagina() == 'home' || $vd->getSottoPagina() == null ? 'current_page_item' : '' ?>"><a href="cliente">Home</a></li>
    <li class="<?= $vd->getSottoPagina() == 'anagrafica' ? 'current_page_item' : '' ?>"><a href="cliente/anagrafica">Anagrafica</a></li>
    <li class="<?= $vd->getSottoPagina() == 'prenotazioni' ? 'current_page_item' : '' ?>"><a href="cliente/prenotazioni">Prenotazioni</a></li>
</ul>
