<div class="container">
    <form name="cadLogin" id="cadLogin" action="" method="post">
        <div class="card" style="top:40px; width: 50%;">
            <div class="card-header">
                <span class="card-title">Login</span>
            </div>
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Usuário:</label>
                <input type="text" class="form-control col-sm-8" name="login" id="login" 
                value="" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Senha:</label>
                <input type="password" class="form-control col-sm-8" name="senha" id="senha" 
                value="" />
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-success" name="btnLogar" id="btnLogar" value="Logar">
            </div>
        </div>
    </form>
</div>

<?php

//Verifica se o botão submit foi acionado
if(isset($_POST['btnLogar'])){

    //Chama uma função PHP que permite informar a classe e o Método que será acionado
    $_SESSION['logado'] = call_user_func(array('UsuarioController','logar'));
    //Armazena o usuario na SESSION
    $_SESSION['login'] = $_POST['login'];
    //Redireciona para a index
    header('Location: index.php');
}

?>

