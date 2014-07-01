<?php

include_once 'Noleggio.php';
include_once 'UserFactory.php';
include_once 'VeicoloFactory.php';

class NoleggioFactory {

    private static $singleton;

    private function __constructor() {
        
    }

    /**
     * Restiuisce un singleton per creare Modelli
     * @return ModelloFactory
     */
    public static function instance() {
        if (!isset(self::$singleton)) {
            self::$singleton = new NoleggioFactory();
        }

        return self::$singleton;
    }

    /**
     * Controlla che il veicolo passato sia prenotabile
     * @param int $id Identificatore del veicolo
     * @return \Boolean true se il veicolo è prenotabile
     */
    public function isVeicoloPrenotabile($id) {
        $prenotabile = false;
        $query = "SELECT * FROM noleggi WHERE `idauto` = ? LIMIT 0 , 1";
        $mysqli = Db::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("[isVeicoloPrenotabile] impossibile inizializzare il database");
            $mysqli->close();
            return $prenotabile;
        }


        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        if (!$stmt) {
            error_log("[isVeicoloPrenotabile] impossibile" .
                    " inizializzare il prepared statement");
            $mysqli->close();
            return $prenotabile;
        }

        if (!$stmt->bind_param('i', $id)) {
            error_log("[isVeicoloPrenotabile] impossibile" .
                    " effettuare il binding in input");
            $mysqli->close();
            return $prenotabile;
        }

        if (!$stmt->execute()) {
            error_log("[isVeicoloPrenotabile] impossibile" .
                    " eseguire lo statement");
            return $prenotabile;
        }

        $id = 0;
        $idauto = 0;
        $idcliente = 0;
        $datainizio = "";
        $datafine = "";

        if (!$stmt->bind_result($id, $idauto, $idcliente, $datainizio, $datafine)) {
            error_log("[isVeicoloPrenotabile] impossibile" .
                    " effettuare il binding in output");
            return false;
        }
        while ($stmt->fetch()) {
            if (strtotime("now") > strtotime($datafine)) {
                $prenotabile = true;
            }
        }


        $mysqli->close();
        return $prenotabile;
    }

    public function &ricercaNoleggi($user, $veicolo_id, $cliente_id, $datainizio, $datafine) {
        $noleggi = array();

        // costruisco la where "a pezzi" a seconda di quante 
        // variabili sono definite
        $bind = "";
        $where = " where noleggi.id >= 0 ";
        $par = array();


        if (isset($veicolo_id)) {
            $where .= " and idauto = ? ";
            $bind .="i";
            $par[] = $veicolo_id;
        }

        if (isset($cliente_id)) {
            $where .= " and idcliente = ? ";
            $bind .="i";
            $par[] = $cliente_id;
        }

        if (isset($datainizio)) {
            if ($datainizio != "") {
                $where .= " and datainizio = ? ";
                $bind .="s";
                $par[] = $datainizio;
            }
        }

        if (isset($datafine)) {
            if ($datafine != "") {
                $where .= " and datafine = ? ";
                $bind .="s";
                $par[] = $datafine;
            }
        }

        /* $query = "SELECT * 
          FROM noleggi
          JOIN clienti ON idcliente = clienti.id
          JOIN veicoli ON idauto = veicoli.id
          JOIN modelli ON veicoli.idmodello = modelli.id
          JOIN costruttori ON modelli.idcostruttore = costruttori.id
          ".$where; */

        $query = "SELECT * 
                FROM noleggi
                JOIN clienti ON idcliente = clienti.id
                JOIN veicoli ON idauto = veicoli.id
                  " . $where;


        $mysqli = Db::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("[ricercaNoleggi] impossibile inizializzare il database");
            $mysqli->close();
            return $noleggi;
        }

        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        if (!$stmt) {
            error_log("[ricercaNoleggi] impossibile" .
                    " inizializzare il prepared statement");
            $mysqli->close();
            return $noleggi;
        }

        switch (count($par)) {
            case 1:
                if (!$stmt->bind_param($bind, $par[0])) {
                    error_log("[ricercaNoleggi] impossibile" .
                            " effettuare il binding in input");
                    $mysqli->close();
                    return $noleggi;
                }
                break;
            case 2:
                if (!$stmt->bind_param($bind, $par[0], $par[1])) {
                    error_log("[ricercaNoleggi] impossibile" .
                            " effettuare il binding in input");
                    $mysqli->close();
                    return $noleggi;
                }
                break;

            case 3:
                if (!$stmt->bind_param($bind, $par[0], $par[1], $par[2])) {
                    error_log("[ricercaNoleggi] impossibile" .
                            " effettuare il binding in input");
                    $mysqli->close();
                    return $noleggi;
                }
                break;

            case 4:
                if (!$stmt->bind_param($bind, $par[0], $par[1], $par[2], $par[3])) {
                    error_log("[ricercaNoleggi] impossibile" .
                            " effettuare il binding in input");
                    $mysqli->close();
                    return $noleggi;
                }
                break;
        }

        $noleggi = self::caricaNoleggiDaStmt($stmt);

        $mysqli->close();
        return $noleggi;
    }

    public function &caricaNoleggiDaStmt(mysqli_stmt $stmt) {
        $noleggi = array();
        if (!$stmt->execute()) {
            error_log("[caricaNoleggiDaStmt] impossibile" .
                    " eseguire lo statement");
            return null;
        }

        $row = array();
        $bind = $stmt->bind_result(
                $row['noleggi_id'], $row['noleggi_idauto'], $row['noleggi_idcliente'], $row['noleggi_datainizio'], $row['noleggi_datafine'], $row['clienti_id'], $row['clienti_nome'], $row['clienti_cognome'], $row['clienti_email'], $row['clienti_numerotel'], $row['clienti_via'], $row['clienti_numero_civico'], $row['clienti_citta'], $row['clienti_username'], $row['clienti_password'], $row['veicoli_id'], $row['veicoli_idmodello'], $row['veicoli_anno'], $row['veicoli_targa']/* , 
                  $row['modelli_id'],
                  $row['modelli_nomemodello'],
                  $row['modelli_idcostruttore'],
                  $row['modelli_cilindrata'],
                  $row['modelli_potenza'],
                  $row['costruttori_id'],
                  $row['costruttori_nomecostruttore'] */);

        if (!$bind) {
            error_log("[caricaNoleggiDaStmt] impossibile" .
                    " effettuare il binding in output");
            return null;
        }

        while ($stmt->fetch()) {
            $noleggi[] = self::creaDaArray($row);
        }

        $stmt->close();

        return $noleggi;
    }

    public function creaDaArray($row) {
        $noleggio = new Noleggio();
        $noleggio->setId($row['noleggi_id']);
        $noleggio->setCliente(UserFactory::instance()->creaClienteDaArray($row));
        $noleggio->setVeicolo(VeicoloFactory::instance()->creaVeicoloDaArray($row));
        $noleggio->setDatainizio($row['noleggi_datainizio']);
        $noleggio->setDatafine($row['noleggi_datafine']);
        return $noleggio;
    }

}

?>
