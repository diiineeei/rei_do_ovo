<?php

if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']) OR empty($_POST['nome']) OR empty($_POST['cpf']) OR empty($_POST['usuario']) OR empty($_POST['email']) OR empty($_POST['confirmasenha']))) {
//    header("Location: index.php");
    echo "<h3>Todos os dados devem estar preenchidos</h3>";
    die();
}

if ($_POST['confirmasenha'] != $_POST['senha']) {
    echo "<h3>Erro senhas não conferem</h3>";
    die();
}

$dsn = 'mysql:host=127.0.0.1;dbname=rei_do_ovo';
$username = 'root';
$password = 'password';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try {
    $conn = new PDO($dsn, $username, $password, $options);
    $conn->beginTransaction();
} catch (PDOException $e) {
    $conn->rollBack();
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
try {
    $query = sprintf("INSERT INTO usuarios (nome, celular, cpf, usuario, email, senha) VALUES('%s','%s','%s','%s','%s','%s');",
        $_POST['nome'], $_POST['celular'], $_POST['cpf'], $_POST['usuario'], $_POST['email'], $_POST['senha']);

    $conn->query($query);
    if($conn->errorCode() > 0){
        echo "<br> codigo: " . $conn->errorCode() . "<br> erro: " . $conn->errorInfo()[2];
    }else{
        $conn->commit();
        $conn = null;
        echo "<h3>Usuario Cadastrado com Sucesso!</h3>";
    }
} catch (Exception $e){
    $conn->rollBack();
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
