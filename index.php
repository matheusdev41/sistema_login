<?php 
include('conexao.php');

//isset = "se existir" (verificando a existência do login e senha no banco) 
if(isset($_POST['email']) || isset($_POST['senha'])){

    //strlen é a quantidade de caracteres
    //se a quantidade de caracteres do email for zero..
    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";

    //se não for zero e a senha for zero...
    }else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";

    //se não, processo verificação
    }else {

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Acesse sua conta</h1>
<!--form -->
    <form action="" method="$_POST">
        <p>
            <label>E-mail</label>
            <input type="text" name="email">
        </p>
        <p>
            <label>Senha</label>
            <input type="password" name="senha">
        </p>
        <p>
            <button type="submit">Entrar</button>
    </form>
<!--end form-->
</body>
</html>
