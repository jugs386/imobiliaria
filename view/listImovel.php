
<div class="container">

<h1>Usuários</h1>
<hr>
<table class="table table-bordered table-striped" style="top:40px;">
        <thead>
            <tr>
                <th>Descricao</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th><a href="index.php?page=imovel">Novo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            //importa o ImovelController.php
            require_once 'controller/ImovelController.php';
            //Chama uma função PHP que permite informar a classe e o Método que será acionado
            $imoveis = call_user_func(array('ImovelController','listar'));
            //Verifica se houve algum retorno
            if (isset($imoveis) && !empty($imoveis)) {
                foreach ($imoveis as $imovel) {
                    ?>
                    <tr>
                        <!-- Como o retorno é um objeto, devemos chamar os get para mostrar o resultado -->
                        <td><?php echo $imovel->getDescricao(); ?></td>
                        <td><?php echo $imovel->getTipo()=="A"?"Aluguel":"Venda"; ?></td>
                        <td><?php echo $imovel->getValor();?></td>
                        <td>
                            <a href="index.php?action=editar&id=<?php echo $imovel->getId();?>&page=imovel" class="btn btn-primary btn-sm">Editar</a>
                            <a href="index.php?action=excluir&id=<?php echo $imovel->getId();?>&page=imovel" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="3">Nenhum registro encontrado</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>


