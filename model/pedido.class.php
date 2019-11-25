<?php


class Pedido
{
    private $id_pedido;
    private $usuario;
    private $entregador;
    private $produto;
    private $quantidade;
    private $endereco_entrega;
    private $valor_total;
    private $data_pedido;
    private $ativo;
    private $db;

    function __get($name)
    {
        return $this->$name;
    }

    function __set($name, $value)
    {
        $this->$name = $value;
    }

    function __construct()
    {
        include_once("conexao.class.php");
        $conexao = new Conexao();
        $this->db = $conexao->Conectar();
    }

    /*
     * Acionado quando o usuario efetua o pedido
     * Deixando o pedido disponivel para que um entregador pegue
     */
    function FazerPedido()
    {
        $query = "INSERT INTO pedido (usuario, produto, quantidade, endereco_entrega, valor_total) 
                  VALUES (?,?,?,?,?,?);";
        $values = array(
            $this->usuario,
            $this->produto,
            $this->quantidade,
            $this->endereco_entrega,
            $this->valor_total
        );
        $exec = $this->db->prepare($query);
        $exec->execute($values);
    }

    /*
     * Acionado quando o entregador pega pedido para entregar
     * Vincula pedido ao entregador
     */
    function PegarPedido()
    {
        $query = "UPDATE pedido SET entregador = ? WHERE id_pedido = ?;";
        $values = array(
            $this->entregador,
            $this->id_pedido
        );
        $exec = $this->db->prepare($query);
        $exec->execute($values);
    }

    function Consultar($tipo_consulta)
    {
        $pedido = new Pedido();
        $dados = array();

        switch ($tipo_consulta) {
            case 'all_from_usuario':
                $query = "SELECT * FROM pedido WHERE usuario = ?;";
                $exec = $this->db->prepare($query);
                $exec->execute($this->usuario);
                break;

            case 'ative_from_usuario':
                $query = "SELECT * FROM pedido WHERE usuario = ? AND ativo = 1;";
                $exec = $this->db->prepare($query);
                $exec->execute($this->usuario);
                break;

            case 'all_from_entregador':
                $query = "SELECT * FROM pedido WHERE entregador = ?;";
                $exec = $this->db->prepare($query);
                $exec->execute($this->entregador);
                break;

            case 'ative_from_entrador':
                $query = "SELECT * FROM pedido WHERE entregador = ? AND ativo = 1;";
                $exec = $this->db->prepare($query);
                $exec->execute($this->entregador);
                break;

            case 'all_ative':
                $query = "SELECT * FROM pedido WHERE ativo = 1;";
                $exec = $this->db->prepare($query);
                $exec->execute($this->usuario);
                break;

            case 'all_entregue':
                $query = "SELECT * FROM endereco WHERE ativo = 0;";
                $exec = $this->db->prepare($query);
                $exec->execute();
                break;

            default:
                break;
        }
        foreach ($exec->fetchAll() as $value) {
            $pedido->id_pedido = $value["id_pedido"];
            $pedido->usuario = $value["usuario"];
            $pedido->entregador = $value["entregador"];
            $pedido->produto = $value["produto"];
            $pedido->quantidade = $value["quantidade"];
            $pedido->endereco_entrega= $value["endereco_entrega"];
            $pedido->valor_total= $value["valor_total"];
            $dados[] = $pedido;
        }
        return $dados;
    }

    /*
    function PedidoEntregue(){
        $query = "UPDATE pedido SET ativo = ?, entregue = ? WHERE id_pedido = ?;";
        $values = array(
            $this->ativo,
            $this->entregue,
            $this->id_pedido
        );
        $exec = $this->db->prepare($query);
        $exec->execute($values);
    }

    # Necessario limpar todos os registros do banco onde incluem esse pedido

    function Excluir(){}
    */
}