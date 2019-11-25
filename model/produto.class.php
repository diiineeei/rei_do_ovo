<?php


class Produto
{
    private $id_produto;
    private $produto;
    private $descricao;
    private $valor;
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

    function Cadastrar()
    {
        $query = "INSERT INTO produto (produto, descricao, valor) VALUES (?,?,?);";
        $values = array(
            $this->produto,
            $this->descricao,
            $this->valor,
        );
        $exec = $this->db->prepare($query);
        $exec->execute($values);
    }


    function Consultar($tipo_consulta)
    {
        $produto = new Produto();
        switch ($tipo_consulta) {
            case 'to_update':
                $query = "SELECT * FROM produto WHERE id_produto = ?;";
                $exec = $this->db->prepare($query);
                $exec->execute($this->id_produto);
                $resul = $exec->fetch();
                $produto->produto = $resul["produto"];
                $produto->descricao = $resul["descricao"];
                $produto->valor = $resul["valor"];
                $produto->ativo = $resul["ativo"];
                return $produto;

            case 'all':
                $query = "SELECT * FROM produto;";
                $exec = $this->db->prepare($query);
                $exec->execute();
                $dados = array();
                foreach ($exec->fetchAll() as $value) {
                    $produto->id_produto = $value["id_produto"];
                    $produto->produto = $value["produto"];
                    $produto->descricao = $value["descricao"];
                    $produto->valor = $value["valor"];
                    $produto->ativo = $value["ativo"];
                    $dados[] = $produto;
                }
                return $dados;
            default:
                return "error";
        }
    }

    public function Atualizar()
    {
        $query = "UPDATE produto SET produto = ?, descricao = ?, valor = ? WHERE id_produto = ?;";
        $values = array(
            $this->produto,
            $this->descricao,
            $this->valor,
            $this->id_produto
        );
        $exec = $this->db->prepare($query);
        $exec->execute($values);
    }
    function AtivarBloquear(){
        $query = "UPDATE produto SET ativo = ? WHERE id_produto = ?;";
        $values = array(
            $this->ativo,
            $this->id_produto
        );
        $exec = $this->db->prepare($query);
        $exec->execute($values);
    }

    # Necessario limpar todos os registros do banco onde incluem esse produto
    /*
    function Excluir(){}
    */
}