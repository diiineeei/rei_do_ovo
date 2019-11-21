<?php
header('Content-type: application/json');
http_response_code(200);
if (!empty($_POST) AND (empty($_POST['senha']) OR empty($_POST['cpf']))) {
    http_response_code(403);
    echo json_encode(array("erro" => "Todos os dados devem estar preenchidos"));
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
} catch (PDOException $e) {
    $conn->rollBack();
    http_response_code(500);
    echo json_encode(array("erro" => $e->getMessage()));
    die();
}
try {
    $query = sprintf("SELECT id, nome, email, nivel, ativo, cpf, celular 
        FROM usuarios WHERE cpf = '%s' AND senha = '%s' LIMIT 1;", $_POST['cpf'], $_POST['senha']);
    $result = $conn->query($query);
    if ($conn->errorCode() > 0) {
        http_response_code(406);
        echo json_encode(array("erro" => "code: " . $conn->errorInfo()[1] . " " . $conn->errorInfo()[2]));
    } else {
        $user = json_encode($result->fetch(PDO::FETCH_ASSOC));
        if ($user == false){
            http_response_code(403);
            echo json_encode(array("erro" => "login ou senha invalidos"));
        }else{
            http_response_code(200);
            echo $user;
        }
        $conn = null;
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(array("erro" => $e->getMessage()));
    die();
}
