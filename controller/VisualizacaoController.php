<?php
require_once 'model/Visualizacao.php';

class VisualizacaoController{
    /**
     * Salvar o usuario submetido pelo formulário
     */
    public function salvar()
    {
        //cria um objeto do tipo Usuario
        $visualizacao = new Visualizacao;
    
        //armazena as informações do $_POST via set
        $visualizacao->setIdImovel($_GET['id']);
        $visualizacao->setData(date('Y-m-d'));
        $visualizacao->setHora(date('H:i:s'));

        //chama o método save para gravar as informações no banco de dados
        $visualizacao->save();
    }

    /**
     * Lista os imoveis
     */
    public function listar()
    {
        //cria um objeto do tipo Usuario
        $visualizacao = new Visualizacao();
        //chama o método listAll()
        return $visualizacao->listAll();
    }

    /**
     * Mostrar formulário para editar um visualizacao
     */
    public function editar($id)
    {
        //cria um objeto do tipo visualizacao
        $visualizacao = new Visualizacao();
        
        $visualizacao = $visualizacao->find($id);

        return $visualizacao;

    }

    /**
     * Apagar um visualizacao conforme o id informado
     */
    public function excluir($id)
    {

        //cria um objeto do tipo visualizacao
        $visualizacao = new Visualizacao();
        
        $visualizacao = $visualizacao->remove($id);

    }

}