<?php
$query = sprintf("INSERT INTO usuarios (nome, celular, cpf, usuario, email, senha, confirmaSenha) VALUES('%s','%s','%s','%s','%s','%s','%s');",
    $_POST['nome'], $_POST['celular'], $_POST['cpf'], $_POST['usuario'], $_POST['email'], $_POST['senha'], $_POST['confirmaSenha']
);
echo $query;
