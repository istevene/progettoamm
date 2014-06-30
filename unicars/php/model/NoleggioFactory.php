<?php

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
            if(strtotime("now")>  strtotime($datafine)){
                $prenotabile = true;
            }
        }


        $mysqli->close();
        return $prenotabile;
    }

}

?>
