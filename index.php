<?php 
include('conexao.php');

//isset = "se existir" (verificando a existência do login e senha no banco) 
if(isset($_POST['email']) || isset($_POST['senha'])) {

    //strlen é a quantidade de caracteres
    //se a quantidade de caracteres do email for zero..
    if(strlen($_POST['email']) == null) {
        echo "Preencha seu e-mail";

    //se não for zero e a senha for zero...
    } else if(strlen($_POST['senha']) == null) {
        echo "Preencha sua senha";

    //se não, processo verificação
    } else {

        // real_escape_string para limpar o campo de email
        // variável mysqli vem do arquivo de conexão
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die('Falha na execução do codigo SQL: ' . $mysqli->error);

        //autenticação
        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){
            
            $usuario = $sql_query->fetch_assoc();
            
            if(!isset($_SESSION)) {
                session_start();
            }

            //inicio de sessão 
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            //redirecionamento da pagina
            header("Location: painel.php");

        } else {
           echo "Falha ao logar! E-mail ou senha incorretos";
        }
        
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
    <form action="" method="POST">
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
        </p>
    </form>
<!--end form-->
</body>
</html>
