<?php
require_once 'classes/usuarios.php';
$u = new Usuario;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<style>
    #msg-sucesso {
    width: 420px;
    margin: 10px auto;
    padding: 10px;
    color: white;
    text-align: center;
}

.msg-erro {
    width: 420px;
    margin: 10px auto;
    padding: 10px;
    color: white;
    text-align: center;
}
</style>

<body>
    <div id="corpo-form">
        <form method="post">
            <h1>CADASTRO</h1>
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
            <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
            <input type="e-mail" name="email" placeholder="Usuário" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
            <input id="btn" type="submit" value="CADASTRAR">
        </form>
    </div>
    
<?php
//Verificar se clicou no botão
if(isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confSenha']);
    //Verificar se esta preenchido
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) {

        $u->conectar("projeto_login", "localhost", "root", "");
        if($u->msgErro == "")   //Se esta tudo ok
        {
            if($senha == $confirmarSenha)
            {
                if($u->cadastrar($nome,$telefone,$email,$senha))
                {
                    ?>
                        <div id="msg-sucesso">
                            Cadastrado com sucesso! Acesse para entrar!
                        </div> 
                    <?php

                } else {
                    ?>
                        <div class="msg-erro">
                            Email já cadastrado!
                        </div> 
                    <?php
                }
            } else {
                ?>
                    <div class="msg-erro" style=>
                        Senhas não correspondem
                    </div> 
                <?php
                
            }
        } else {
            ?>
            <div class="msg-erro">
            <?php echo "Erro: ".$u->msgErro; ?>
            </div> 
        <?php
            
        }

    } else {
        ?>
            <div class="msg-erro">
            Preencha todos os campos!
            </div> 
        <?php
    }

}

?>

</body>

</html>