<?php
//importa o ImovelController.php
require_once 'controller/ImovelController.php';
//Chama uma função PHP que permite informar a classe e o Método que será acionado
if(isset($_GET['tipo'])){
  $imoveis = call_user_func(array('ImovelController','listarTipo'),$_GET['tipo']);
}else{
  $imoveis = call_user_func(array('ImovelController','listar'));
}

?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <ul class="navbar-nav">
  <li class="nav-item">
      <a class="nav-link" href="index.php?tipo=A">Alugar</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.php?tipo=V">Comprar</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.php">Tudo</a>
    </li>
    <li class="nav-item">
      <a class="nav-link right" href="index.php?logar"><i class="fa fa-lock" aria-hidden="true"></i></a>
    </li>

  </ul>
</nav>
<br>
<table class="table" style="top:40px;">
        <tbody>
        <?php 
        $cont=0;
        //Verifica se houve algum retorno
        if (isset($imoveis) && !empty($imoveis)) {
          foreach ($imoveis as $imovel) {
            
            if($cont==0){
              echo '<tr>';
            }
            
            echo '<td>';
            echo '<p align="center"><img class="img-thumbnail" style="width: 75%;" src="data:'.$imovel->getFotoTipo().';base64,'.base64_encode($imovel->getFoto()).'"></p><br>';;
            echo substr($imovel->getDescricao(),0,70).'...<br>';
            echo '<strong>Valor: </strong>'.$imovel->getValor().'<br>';
            $tipo = $imovel->getTipo()=='A'?'Aluguel':'Venda';
            echo '<strong>Tipo: </strong>'.$tipo.'<br>';
            $cont++;
            if($cont==4)
              $cont=0;

          }
        }
?>
        </tbody>
</table>

