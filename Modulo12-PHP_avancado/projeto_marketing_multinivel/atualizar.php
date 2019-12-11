<?php
require_once 'config.php';

atualiza();

function atualiza (){

     $bd = newbd();
     $ql = "SELECT id FROM usuarios";
     $sqlUpdate = " UPDATE usuarios
                    SET patente = (SELECT MAX(id)
                                        FROM patentes
                                        WHERE min <= :filhos
                                        ORDER BY min DESC)
                    WHERE id = :id";
     $resultado = $bd->exec2($ql);
     

     if( !isset($resultado['dados']) or !is_array($resultado['dados']) ) return;

     foreach ($resultado['dados'] as $key => $value) {
          
          //$resultado['dados'][$key]['filhos'] = calcularCadastros($value['id'], MAX_NIVEIS);
          $quantidadeFilhos = calcularCadastros($value['id'], MAX_NIVEIS);

          $bd->execBDv2($sqlUpdate, array(':id' => $value['id'], ':filhos' => $quantidadeFilhos));

     }
     unset($bd);
}

function calcularCadastros(int $id, int $limite):int {

     $filhos = 0;
     $bd = newbd();
     $sql = "SELECT *
               FROM usuarios
               WHERE id_pai = :id";

     $resultado = $bd->execBDv2($sql, array(':id' => $id));

     unset($bd);

     if( !isset($resultado['info']) or !is_array($resultado['info']) ) return $filhos;

     $filhos = count( $resultado['info'] );

     foreach ($resultado['info'] as $value) {
          
          if($limite) $filhos += calcularCadastros($value['id'], $limite-1);
     }

     return $filhos;
}

function newbd(): BD{

     require_once '../BD.generico.class.php';
     return new BD('projeto_marketingmultinivel');
}