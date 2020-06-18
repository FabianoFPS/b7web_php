<?php
class Anuncios extends Model {

    function getQuantidades(){

        $sql = "SELECT COUNT(*) AS c FROM anuncios;";

        $stm = $this->executaSQL($sql);

        if ($stm->rowCount() > 0 ) {
            
            $resultado = $stm->fetch();

            return $resultado['c'];
        }

        return 0;
    }
}