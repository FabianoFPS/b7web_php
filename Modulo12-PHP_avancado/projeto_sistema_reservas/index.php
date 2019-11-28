<?php
require_once 'reservas.class.php';
require_once 'carros.class.php';
require_once 'calendario.class.php';

$reserva = new Reservas();
$reservasAtivas = "";
$htmlCalendario = "";
$htmlTabela = "";

if ( !empty($_GET['ano']) and !empty($_GET['mes']) ) {

     $ano = (int) $_GET['ano'];
     $mes = (int) $_GET['mes'];
     $calendario = new Calendario($ano, $mes);
     $dInicio = $calendario->getDataInicio();
     $dFim = $calendario->getDataFim();
     $reservasAtivas = $reserva->getReservas($dInicio, $dFim);

          
     if ( isset( $reservasAtivas['info'] ) ) {
          
          $htmlTabela = montaTabela($reservasAtivas['info']);

          $htmlCalendario = $calendario->geraCalendario($reservasAtivas['info']);
     }
}

function montaTabela(array $dados){

     $tabela = "<table class=\"table\">
               <thead>
                    <tr>
                         <th scope=\"col\">Carro</th>
                         <th scope=\"col\">Data início</th>
                         <th scope=\"col\">Data fim</th>
                         <th scope=\"col\">Pessoa</th>
                    </tr>
               </thead>
               <tbody>";

     foreach ($dados as $value) {

          $carro = $value['id_carro'];
          $dataInicio = date( 'd/m/Y', strtotime( $value['data_inicio'] ) );
          $dataFim = date( 'd/m/Y', strtotime( $value['data_fim'] ) );
          $pessoa = $value['pessoa'];

          $tabela .= "<tr>
                         <th scope=\"row\">$carro</th>
                         <td>$dataInicio</td>
                         <td>$dataFim</td>
                         <td>$pessoa</td>
                    </tr>";
     }

     $tabela .= "</tbody>
               </table>";

     return $tabela;
}

function anosSelect(){

     $select = "";

     for ($ndice=date('Y')-10; $ndice <= date('Y')+10; $ndice++) { 
          
          $select .= "<option>$ndice</option>";
     }

     return $select;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <meta name="description" content="Sistema de reservas">
     <meta name="author" content="Fabiano">
     <link rel="icon" href="logo.ico">
     <title>Reservas</title>
     <link rel="stylesheet" href="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/css/bootstrap.min.css">
</head>
<body>
     <div class="container">
          <div class="row">
               <div class="col-12">
                    <h1>Reservas</h1>
               </div>
          </div>
          <div class="row">
               <div class="col-2">
                    <div class="row">
                         <a href="reservar.php" class="btn btn-success">Adicionar Reserva</a>
                    </div>
                    <div class="row">
                         <form method="get" action="">
                              <div class="form-group">
                                   <label for="id_ano">Ano</label>
                                   <select id="id_ano" class="form-control" name="ano">
                                        <?php echo anosSelect(); ?>
                                   </select>
                              </div>
                              <div class="form-group">
                                   <label for="id_mes">Mês</label>
                                   <select id="id_mes" class="form-control" name="mes">
                                        <option value="1">Janeiro</option>
                                        <option value="2">Favereiro</option>
                                        <option value="3">Março</option>
                                        <option value="4">Abril</option>
                                        <option value="5">Maio</option>
                                        <option value="6">Junho</option>
                                        <option value="7">Julho</option>
                                        <option value="8">Agosto</option>
                                        <option value="9">Setembro</option>
                                        <option value="10">Outubro</option>
                                        <option value="11">Novembro</option>
                                        <option value="12">Dezembro</option>
                                   </select>
                              </div>
                              <button class="btn btn-primary" type="submit">Mostrar Calendário</button>
                         </form>
                    </div>
                    <br>
               </div>
               <div class="col-10">
               <?php echo $htmlTabela; ?>
               </div>
          </div>
          <div class="row">
               <div class="col">
                    <?php echo $htmlCalendario; ?>
               </div>
          </div>
     </div>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>