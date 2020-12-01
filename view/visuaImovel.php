<?php
call_user_func(array('VisualizacaoController','salvar'));
$imovel = call_user_func(array('ImovelController','editar'),$_GET['id']);
?>
<div class="container">
<table class="table" style="top:40px;">
        <tbody>
        <tr>
            <td>
                <img class="img-thumbnail" style="width: 100%;" src="data:<?php echo $imovel->getFotoTipo();?>;base64,<?php echo base64_encode($imovel->getFoto());?>"></td>
                <td style="width: 50%;"><strong>Tipo: </strong> <?php echo $imovel->getTipo()=="A"?"Aluguel":"Venda";?><br>
                <strong>Valor: </strong><?php echo $imovel->getValor();?><br><br>
                <?php echo $imovel->getDescricao();?>
                
            </td>
        </tr>
        <tr><td colspan='2'><a href="index.php" class="btn btn-outline-primary float-right">Voltar</a></td></tr>
</div>


