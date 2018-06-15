<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link href="css/login.css" rel="stylesheet"/>
    </head>
    <body>
        <form action="login_cadastro.php" method="post">
            <h1>Login</h1>
            <input type="text" name="usuario" placeholder="Usuário">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="senha" placeholder="Senha">
            <input type="submit" name="acao" value="Entrar">
            <input type="submit" name="acao" value="Cadastrar">
        </form>
    </body>
</html>