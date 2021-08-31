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
            <h1>ENTRAR</h1>
            <input type="e-mail" name="email" placeholder="Usuário">
            <input type="password" name="senha" placeholder="Senha">
            <input id="btn" type="submit" value="ACESSAR">
            <a href="cadastrar.php">Ainda não é inscrito? <strong>Cadastre-se</strong></a>
        </form>
    </div>

    <?php
        if(isset($_POST['email']))
        {
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            //Verificar se esta preenchido
            if(!empty($email) && !empty($senha)) {
                $u->conectar("projeto_login", "localhost", "root", "");
                if($u->msgErro == "") { 

                if($u->logar($email,$senha)) {
                    header("location: AreaPrivada.php");
                } else {
                    ?>
                        <div id="msg-sucesso">
                            Email e/ou senha incorretos
                        </div> 
                    <?php
                }
            } else {
                echo "Erro: ".$u->msgErro;
            }

            } else {
                ?>
                    <div id="msg-sucesso">
                        Preencha todos os campos
                    </div> 
                <?php
            }
        }    
    ?>

</body>

</html>