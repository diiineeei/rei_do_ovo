<?php

if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
//    header("Location: index.php");
    echo "<h3>Os dados devem estar preenchidos</h3>";
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
    $dbh = new PDO($dsn, $username, $password, $options);
    $dbh->beginTransaction();

    $query = sprintf("INSERT INTO usuarios (nome, celular, cpf, usuario, email, senha) VALUES('%s','%s','%s','%s','%s','%s');",
    $_POST['nome'], $_POST['celular'], $_POST['cpf'], $_POST['usuario'], $_POST['email'], $_POST['senha']);

    foreach ($dbh->query($query) as $row) {
        print_r($row);
    }
    $dbh->commit();
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

