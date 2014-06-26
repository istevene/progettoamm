<?php

include_once 'Db.php';
include_once 'Veicolo.php';
include_once 'ModelloFactory.php';
include_once 'NoleggioFactory.php';

class VeicoloFactory {

    private static $singleton;

    private function __constructor() {
        
    }

    /**
     * Restiuisce un singleton per creare veicoli
     * @return \VeicoloFactory
     */
    public static function instance() {
        if (!isset(self::$singleton)) {
            self::$singleton = new VeicoloFactory();
        }

        return self::$singleton;
    }

    /**
     * Restituisce tutti i CorsiDiLaurea esistenti
     * @return array|\CorsoDiLaurea
     */
    public function &getVeicoli() {
        $mysqli = Db::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("[getVeicoli] impossibile inizializzare il database");
            return array();
        }

        $query = "SELECT * from veicoli";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        if (!$stmt) {
            error_log("[getVeicoli] impossibile" .
                    " inizializzare il prepared statement");
            $mysqli->close();
            return array();
        }

        $toRet = self::inizializzaListaVeicoli($stmt);
        $mysqli->close();
        return $toRet;
    }

    /**
     * Popola una lista di veicoli con una query variabile
     * @param mysqli_stmt $stmt
     * @return array|\Veicoli
     */
    private function &inizializzaListaVeicoli(mysqli_stmt $stmt) {
        $veicoli = array();

        if (!$stmt->execute()) {
            error_log("[inizializzaListaVeicoli] impossibile" .
                    " eseguire lo statement");
            return $veicoli;
        }

        $id = 0;
        $idmodello = 0;
        $anno = 0;

        if (!$stmt->bind_result($id, $idmodello, $anno)) {
            error_log("[inizializzaListaVeicoli] impossibile" .
                    " effettuare il binding in output");
            return array();
        }
        while ($stmt->fetch()) {
            $veicolo = new Veicolo();
            $veicolo->setId($id);
            $veicolo->setModello(ModelloFactory::instance()->getModelloPerId($idmodello));
            $veicolo->setAnno($anno);
            $veicolo->setPrenotabile(NoleggioFactory::instance()->isVeicoloPrenotabile($id));
            $veicoli[] = $veicolo;
        }
        return $veicoli;
    }

}

?>
