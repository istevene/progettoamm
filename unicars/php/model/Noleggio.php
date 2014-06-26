<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Prenotazione
 *
 * @author amm
 */
class Noleggio {
    
    private $id;
    
    private $cliente;
    
    private $veicolo;
    
    private $datainizio;
    
    private $datafine;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function getVeicolo() {
        return $this->veicolo;
    }

    public function setVeicolo($veicolo) {
        $this->veicolo = $veicolo;
    }

    public function getDatainizio() {
        return $this->datainizio;
    }

    public function setDatainizio($datainizio) {
        $this->datainizio = $datainizio;
    }

    public function getDatafine() {
        return $this->datafine;
    }

    public function setDatafine($datafine) {
        $this->datafine = $datafine;
    }


    
}

?>
