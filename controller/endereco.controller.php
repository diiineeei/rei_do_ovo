<?php
include_once("model/endereco.class.php");

$endereco = new Endereco();

if (isset($_REQUEST["acao"])) {
    switch ($_REQUEST["acao"]) {
        case 'cadastrar_endereco':
            $endereco->cep = $_POST['cep'];
            $endereco->rua = $_POST['rua'];
            $endereco->bairro = $_POST['bairro'];
            $endereco->cidade = $_POST['cidade'];
            $endereco->estado = $_POST['estado'];
            $endereco->usuario = $_SESSION['id_usuario'];
            $endereco->Cadastrar();
            break;

        case 'consultar':
            $endereco->usuario = $_SESSION['id_usuario'];
            $endereco->Consultar();
            break;

        case 'atualizar':
            break;

        case 'bloquear':
            $endereco->id_endereco = $_POST['id_endereco'];
            $endereco->Bloquear();
            break;
    }
}
