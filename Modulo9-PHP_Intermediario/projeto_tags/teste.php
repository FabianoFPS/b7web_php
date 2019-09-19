<?php
require_once 'conexaoBD.php';

$parametros = array('mysql', 'projeto_caixaeletronico', 'localhost', 'adm', '374937');

$conexao = new ConexaoBancoDeDados($parametros);

$sql = "INSERT INTO historico (id_conta, tipo, valor, data_operacao) VALUES (:id_conta, :tipo, :valor, NOW() )";
$variaveis = array(':id_conta'=>'1',
                    ':tipo'=>'0',
                    ':valor'=>'98');

$conexao->executaOperacao($sql, $variaveis);