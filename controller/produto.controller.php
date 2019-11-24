<?php
include_once("model/produto.class.php");

$produto = new Produto();

if (isset($_REQUEST["acao"])) {
    switch ($_REQUEST["acao"]) {
        case 'cadastrar':
            $produto->produto = $_POST['produto'];
            $produto->descricao = $_POST['descricao'];
            $produto->valor = $_POST['valor'];
            $produto->Cadastrar();
            break;

        case 'consultar_todos':
            $produto->Consultar("all");
            break;

        case 'consultar_por_id':
            $produto->id_produto = $_POST['id_produto'];
            $produto->Consultar("to_update");
            break;


        case 'atualizar':
            $produto->produto = $_POST['nome_produto'];
            $produto->descricao = $_POST['descricao'];
            $produto->valor = $_POST['valor'];
            $produto->id_produto = $_POST['id_produto'];
            $produto->Atualizar();
            break;

        case 'bloquear':
            $produto->ativo = $_POST['ativo_bloqueado'];
            $produto->id_produto = $_POST['id_produto'];
            $produto->AtivarBloquear();
            break;
    }
}
