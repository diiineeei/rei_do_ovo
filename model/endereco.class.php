<?php


class Endereco
{
    private $id_endereco;
    private $cep;
    private $rua;
    private $bairro;
    private $cidade;
    private $estado;
    private $ativo;
    private $usuario;
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
        $query = "INSERT INTO endereco (cep, rua, bairro, estado, usuario, cidade) VALUES (?,?,?,?,?,?);";
        $values = array(
            $this->cep,
            $this->rua,
            $this->bairro,
            $this->cidade,
            $this->estado,
            $this->usuario
        );
        $exec = $this->db->prepare($query);
        $exec->execute($values);
    }


    function Consultar()
    {
        $endereco = new Endereco();

        $query = "SELECT * FROM endereco WHERE usuario = ? AND ativo = 1;";
        $exec = $this->db->prepare($query);
        $exec->execute($this->usuario);
        $dados = array();
        foreach ($exec->fetchAll() as $value) {
            $endereco->rua = $value["rua"];
            $endereco->cep = $value["cep"];
            $endereco->bairro = $value["bairro"];
            $endereco->cidade = $value["cidade"];
            $endereco->estado= $value["estado"];
            $endereco->id_endereco= $value["id_endereco"];
            $dados[] = $endereco;
        }
        return $dados;

    }

    function Atualizar()
    {
        $query = "UPDATE endereco SET rua = ?, cep = ?, bairro = ?, cidade = ?, estado = ? WHERE id_endereco = ?;";
        $values = array(
            $this->rua,
            $this->cep,
            $this->bairro,
            $this->cidade,
            $this->estado,
            $this->id_endereco
        );
        $exec = $this->db->prepare($query);
        $exec->execute($values);
    }

    function Bloquear(){
        $query = "UPDATE endereco SET ativo = 0 WHERE id_endereco = ?;";
        $values = array(
            $this->id_endereco
        );
        $exec = $this->db->prepare($query);
        $exec->execute($values);
    }

    # Necessario limpar todos os registros do banco onde incluem esse endereço
    /*
    function Excluir(){}
    */
}