<?php
include_once("model/pedido.class.php");
$pedido = new Pedido();
if (isset($_REQUEST["acao"])) {
    switch ($_REQUEST["acao"]) {
        case 'teste':
            break;
    }
}
