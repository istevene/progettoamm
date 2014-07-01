<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Costruttore
 *
 * @author amm
 */
class Costruttore {
    
    private $id;
    
    private $nome;
    
    public function setId($id){
        $this->id=$id;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setNome($nome){
        $this->nome=$nome;
    }
    
    public function getNome(){
        return $this->nome;
    }
}

?>
