<?php
class Calendario {

  private $data;
  private $dia1;
  private $dias;
  private $linhas;
  private $data_inicio;
  private $data_fim;

  /**
  * ...
  * @param
  * @return
  */
  public function __construct(int $ano, int $mes){
  
    $this->data = "$ano-$mes";
    $this->dia1 = date('w', strtotime($this->data) );
    $this->dias = date('t', strtotime($this->data) );
    $this->linhas = ceil( ($this->dia1+$this->dias)/7 );
    $this->data_inicio = date('Y-m-d', strtotime( "-$this->dia1 days", strtotime( $this->data ) ));
    $this->data_fim = date('Y-m-d', strtotime( (-$this->dia1 + ($this->linhas*7)-1) ."days", strtotime( $this->data ) ));
  }

  /**
  * ...
  * @param
  * @return
  */
  public function getDataInicio(){
  
    return $this->data_inicio;
  }

  public function getDataFim(){
  
    return $this->data_fim;
  }

  public function geraCalendario(array $dados){

    //$data = '2017-01';
    
    $table = 
    "
    <table class=\"table table-bordered\">
      <thead>
        <tr>
          <th scope=\"col\">Domingo</th>
          <th scope=\"col\">Segunda</th>
          <th scope=\"col\">Terça</th>
          <th scope=\"col\">Quarta</th>
          <th scope=\"col\">Quinta</th>
          <th scope=\"col\">Sexta</th>
          <th scope=\"col\">Sabado</th>
        </tr>
      </thead>
      <tbody>
      ";  
    $tableFim =
    "</tbody>
    </table>
    ";

    for ($l=0; $l<$this->linhas; $l++){

        $table .= '<tr>';

        for ($i=0; $i < 7; $i++) { 
              
              $diaCalendario = date( 'Y-m-d', strtotime( $i+( $l*7 ).' days', strtotime($this->data_inicio) ));
              $table .= "<td>".substr($diaCalendario,8,2)."<br>";

            foreach ($dados as $key => $value) {
              
              if (  strtotime( $diaCalendario ) >= strtotime( $value['data_inicio'] ) and 
                    strtotime( $diaCalendario ) <= strtotime( $value['data_fim'] ) ) {
                
                $table .=  $value['pessoa']." (".$value['id_carro'].")<br>";
              }
            }
              
            $table .= "</td>";
        }

        $table .= '</tr>';
    }

    $table .= $tableFim;

    return $table;
  }
}