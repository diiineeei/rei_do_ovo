<?php
header('Content-type: application/json');
http_response_code(200);
if (!empty($_POST) AND (empty($_POST['senha']) OR empty($_POST['nome']) OR empty($_POST['cpf']) OR empty($_POST['email']) OR empty($_POST['confirmasenha']))) {
    http_response_code(403);
    echo json_encode(array("erro" => "Todos os dados devem estar preenchidos"));
    die();
}

if ($_POST['confirmasenha'] != $_POST['senha']) {
    http_response_code(403);
    echo json_encode(array("erro" => "Erro senhas não conferem"));
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
    http_response_code(500);
    echo json_encode(array("erro" => $e->getMessage()));
    die();
}
try {
    $query = sprintf("INSERT INTO usuarios (nome, celular, cpf, email, senha) VALUES('%s','%s','%s','%s','%s');",
        $_POST['nome'], $_POST['celular'], $_POST['cpf'], $_POST['email'], $_POST['senha']);
    $conn->query($query);
    if ($conn->errorCode() > 0) {
        http_response_code(406);
        echo json_encode(array("erro" => "code: " . $conn->errorInfo()[1] . " " . $conn->errorInfo()[2]));
    } else {
        $conn->commit();
        $conn = null;
        echo json_encode(array("Usuario Cadastrado com Sucesso!"));
    }
} catch (Exception $e) {
    $conn->rollBack();
    http_response_code(500);
    echo json_encode(array("erro" => $e->getMessage()));
    die();
}
