<?php
require_once 'model/Imovel.php';

class ImovelController{
    /**
     * Salvar o usuario submetido pelo formulário
     */
    public function salvar($fotoAtual="",$fotoTipo="")
    {
        //cria um objeto do tipo Usuario
        $imovel = new Imovel;

        //trata a foto para ser armazenada no banco de dados
        $imagem = array();
        if(is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $imagem['data'] =file_get_contents($_FILES['foto']['tmp_name']);
            $imagem['tipo'] = $_FILES['foto']['type'];
            $path = 'imagens/'.$_FILES['foto']['name'];
            $imagem['path'] = $path;
            //upload do arquivo para o servidor 
            move_uploaded_file($_FILES['foto']['tmp_name'],$path);
        }
        //verifica se o array imagem não está vazio, se tiver alguma imagem no mesmo
        //quer dizer que o usuário alterou a imagem ou está cadastrando um imovel novo
        if(!empty($imagem)){
            $imovel->setFoto($imagem['data']);
            $imovel->setFotoTipo($imagem['tipo']);
            $imovel->setPath($imagem['path']);
            //Verifica se existe um path da imagem e se sim remove a mesma do servidor
            if(!empty($_POST['path']))
                unlink($_POST['path']);

        }else{
            $imovel->setFoto($fotoAtual);
            $imovel->setFotoTipo($fotoTipo);
            $imovel->setPath($_POST['path']);
        }
    
        //armazena as informações do $_POST via set
        $imovel->setId($_POST['id']);
        $imovel->setDescricao($_POST['descricao']);
        $imovel->setValor($_POST['valor']);
        $imovel->setTipo($_POST['tipo']);

        //chama o método save para gravar as informações no banco de dados
        $imovel->save();
    }

    /**
     * Lista os imoveis
     */
    public function listar()
    {
        //cria um objeto do tipo Usuario
        $imovel = new Imovel;
        //chama o método listAll()
        return $imovel->listAll();
    }

    /**
     * Mostrar formulário para editar um imovel
     */
    public function editar($id)
    {
        //cria um objeto do tipo imovel
        $imovel = new Imovel;
        
        $imovel = $imovel->find($id);

        return $imovel;

    }

    /**
     * Apagar um imovel conforme o id informado
     */
    public function excluir($id)
    {

        //cria um objeto do tipo imovel
        $imovel = new Imovel;
        $imovel = $imovel->find($id);
        unlink($imovel->getPath());
        $imovel = $imovel->remove($id);

    }

    /**
     * Upload da foto
     */
    public function uploadFoto($foto)
    {
        $imagem = array();
        if(is_uploaded_file($foto['foto']['tmp_name'])) {
            $imagem['data'] =file_get_contents($foto['foto']['tmp_name']);
            /*$imagem['properties'] = getimageSize($foto['foto']['tmp_name']);
            $imagem['tipo'] = $imagem['properties']['mime'];*/
            $imagem['tipo'] = $foto['foto']['type'];
        }

        return $imagem;
    }

    /**
     * Lista os imoveis por tipo
     */
    public function listarTipo($tipo)
    {
        //cria um objeto do tipo Usuario
        $imovel = new Imovel;
        //chama o método listAll()
        return $imovel->listAllTipo($tipo);
    }

}