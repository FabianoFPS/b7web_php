<?php
require_once 'carros.class.php';
require_once 'reservas.class.php';

if(  !empty($_POST['carro'])       and 
     !empty($_POST['data1']) and
     !empty($_POST['data2'])    and
     !empty($_POST['pessoa']) ){

     $carro         = addslashes( $_POST['carro'] );
     //$data_inicio2   = addslashes( $_POST['data_inicio'] );
     //$data_fim2      = addslashes( $_POST['data_fim'] );
     $pessoa        = addslashes( $_POST['pessoa'] );

     $data_inicio   = addslashes( $_POST['data1'] );
     $data_fim      = addslashes( $_POST['data2'] );

     // $data_inicio2 = explode('/', $data_inicio2);
     // $data_inicio2 = $data_inicio2[2].'-'.$data_inicio2[1].'-'.$data_inicio2[0];

     //echo "data_inicio = $data_inicio<br>data_inicio2 = $data_inicio2";
     // $data_fim = explode('/', $data_fim);
     // $data_fim = $data_fim[2].'-'.$data_fim[1].'-'.$data_fim[0];

     $reservas = new Reservas();
     $dados = array('carro'        => $carro,
                    'data_inicio'  => $data_inicio,
                    'data_fim'     => $data_fim,
                    'pessoa'       => $pessoa);

     if(reserva($reservas, $dados)){

          $ano = date( 'Y', strtotime($data_inicio) );
          $mes = date( 'm', strtotime($data_inicio) );
         
          header("Location: index.php?ano=$ano&mes=$mes");
          exit('Reserva Incluida');
    }

    echo "Esse caro já possui reserva nesse período";
}
/**
 * 
 * @param Reservas $reservas
 * @param Array $dados carro, data_inicio, data_fim, pessoa
 * @return Bool
 */
function reserva(Reservas $reservas, array $dados){

     if ( !$reservas->verificaDisponibilidade($dados) ){

          return false;
     }

     if( !$reservas->reservar($dados) ){

          return false; 
     }

     return true;
}

function option(){

     $retorno = "<option>Selecionar</option>";

     $carros = new Carro();
     $dados = $carros->getCarros();

     if( $dados['retorno'] and is_array($dados['dados']) ){

          foreach ($dados['dados'] as $key => $value) {
               
               $opcoes   = $value['nome'];
               $id       = $value['id'];

               $retorno .= "<option value=\"$id\">$opcoes</option>";
          }
     }
     unset($carros);
     return $retorno;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <meta name="description" content="Descrição">
     <meta name="author" content="Autor">
     <link rel="icon" href="logo.ico">
     <title>Document</title>
     <link rel="stylesheet" href="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/css/bootstrap.min.css">
</head>
<body>
     <div class="container">
          <div class="row">
               <div class="col-6">
                    <form method="post" action="">
                         <div class="form-group">
                              <label for="my-select">Carro</label>
                              <select id="my-select" class="form-control" name="carro">
                                   <?php echo option(); ?>
                              </select>
                         </div>
                         <!-- <div class="form-group">
                              <label for="my-input">Data de início</label>
                              <input id="my-input" class="form-control" type="text" name="data_inicio">
                         </div>
                         <div class="form-group">
                              <label for="my-input2">Data de fim</label>
                              <input id="my-input2" class="form-control" type="text" name="data_fim">
                         </div> -->
                         <div class="form-group">
                              <label for="id_imput_calendario">Data início</label>
                              <input class="form-control" type="date" value="" id="id_imput_calendario" name="data1">
                         </div>
                         <div class="form-group">
                              <label for="id_data2">Data fim</label>
                              <input id="id_data2" class="form-control" type="date" name="data2">
                         </div>
                         <div class="form-group">
                              <label for="my-input3">Nome da Pessoa</label>
                              <input id="my-input3" class="form-control" type="text" name="pessoa">
                         </div>
                         <button class="btn btn-primary" type="submit">Reservar</button>
                    </form>
               </div>
          </div>
     </div>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../../Modulo11-BootstrapV4/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>