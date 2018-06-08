<?php

require_once 'bootstrap.php';
$status = false;

function validaCampo($campo) {
    return isset($_POST[$campo]) && !empty($_POST[$campo]);
}

if($_POST['acao'] == 'Cadastrar') {
    if(validaCampo('usuario') && validaCampo('email') && validaCampo('senha')) {
        $stmt = $db->prepare("INSERT INTO usuario (nome, email, senha) VALUES(:nome, :email, :senha)");
        $stmt->bindValue(":nome", $_POST['usuario'], \PDO::PARAM_STR);
        $stmt->bindValue(":email", $_POST['email'], \PDO::PARAM_STR);
        $stmt->bindValue(":senha", $_POST['senha'], \PDO::PARAM_STR);
        $status = $stmt->execute();
    }
}

if($_POST['acao'] == 'Entrar') {
    $stmt = $db->prepare("SELECT * FROM usuario WHERE nome=:nome AND email=:email AND senha=:senha");
    $stmt->bindValue(":nome", $_POST['usuario'], \PDO::PARAM_STR);
    $stmt->bindValue(":email", $_POST['email'], \PDO::PARAM_STR);
    $stmt->bindValue(":senha", $_POST['senha'], \PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
    if($result){
        $_SESSION['login']['usuario'] = $result['nome'];
        $_SESSION['login']['email'] = $result['email'];
        $_SESSION['login']['senha'] = $result['senha'];
        $status = true;
    }
    
}

if($status) {
    header('Location: index.php');
} else {
    header('Location: login.php');
}