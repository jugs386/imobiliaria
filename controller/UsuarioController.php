<?php
require_once 'model/Usuario.php';

class UsuarioController{
    /**
     * Salvar o usuario submetido pelo formulário
     */
    public function salvar()
    {
        //cria um objeto do tipo Usuario
        $usuario = new Usuario;

        //armazena as informações do $_POST via set
        $usuario->setId($_POST['id']);
        $usuario->setLogin($_POST['login']);
        $usuario->setSenha($_POST['senha1']);
        $usuario->setPermissao($_POST['permissao']);

        //chama o método save para gravar as informações no banco de dados
        $usuario->save();
    }

    /**
     * Lista os usuários
     */
    public function listar()
    {
        //cria um objeto do tipo Usuario
        $usuarios = new Usuario;
        //chama o método listAll()
        return $usuarios->listAll();
    }

    /**
     * Mostrar formulário para editar um usuario
     */
    public function editar($id)
    {
        //cria um objeto do tipo Usuario
        $usuario = new Usuario;
        
        $usuario = $usuario->find($id);

        return $usuario;

    }

    /**
     * Apagar um usuario conforme o id informado
     */
    public function excluir($id)
    {

        //cria um objeto do tipo Usuario
        $usuario = new Usuario;
        
        $usuario = $usuario->remove($id);

    }

    /**
     * Logar com um usuario no sistema
     */
    public function logar()
    {
        $usuario = new Usuario();
        $usuario->setLogin($_POST['login']);
        $usuario->setSenha($_POST['senha']);

        return $usuario->logar();
    }

}