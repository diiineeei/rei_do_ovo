<?php


class Usuario
{
    private $id_usuario;
    private $nome;
    private $cpf;
    private $senha;
    private $email;
    private $celular;
    private $nivel_acesso;
    private $ativo;
    private $data_cadastro;
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
        $query = "INSERT INTO usuario (nome, cpf, senha, email, celular, nivel_acesso) VALUES (?,?,?,?,?,?);";
        $values = array(
            $this->nome,
            $this->cpf,
            sha1($this->senha),
            $this->email,
            $this->celular,
            $this->nivel_acesso
        );
        $exec = $this->db->prepare($query);
        $exec->execute($values);
    }

    function Atualizar()
    {
        $query = "UPDATE usuario SET nome = ?, cpf = ?, email = ?, senha = ?, celular = ?, nivel_acesso =? WHERE id_usuario = ?;";
        $values = array(
            $this->nome,
            $this->cpf,
            $this->email,
            $this->senha,
            $this->celular,
            $this->nivel_acesso,
            $this->id_usuario
        );
        $exec = $this->db->prepare($query);
        $exec->execute($values);
    }

    function Consultar($tipo_consulta)
    {
        $usuario = new Usuario();
        switch ($tipo_consulta) {
            /*
             * $tipo_consulta = "to_update"
             * Necessario verificar qual o tipo de usuario que vai fazer a alteração
             * pois o nivel de acesso e se esta ativo, somente o adm pode alterar
             */
            case 'to_update':
                $query = "SELECT * FROM usuario WHERE id_usuario = ?;";
                $exec = $this->db->prepare($query);
                $exec->execute($this->id_usuario);
                $resul = $exec->fetch();
                $usuario->nome = $resul["nome"];
                $usuario->email = $resul["email"];
                $usuario->senha = $resul["senha"];
                $usuario->nivel_acesso = $resul["nivel_acesso"];
                $usuario->id_usuario = $resul["id_usuario"];
                $usuario->ativo = $resul['ativo'];
                return $usuario;

            case 'to_login':
                    $query = "SELECT * FROM usuario WHERE email = '?' AND senha = '?';";
                    $values= array($this->email, sha1($this->senha));
                    $exec = $this->db->prepare($query);
                    $exec->execute($values);
                    $resul = $exec->fetch();
                    if(!empty($resul["id_usuario"]))
                    {
                        $usuario->nome = $resul["nome"];
                        $usuario->email = $resul["email"];
                        $usuario->nivel_acesso = $resul["nivel_acesso"];
                        $usuario->id_usuario = $resul["id_usuario"];
                        $usuario->ativo = $resul['ativo'];
                        return $usuario;
                    }
                    return "E-mail ou senha inválido!";

            case 'all':
                $query = "SELECT * FROM usuario;";
                $exec = $this->db->prepare($query);
                $exec->execute();
                $dados = array();
                foreach ($exec->fetchAll() as $value) {
                    $usuario->nome = $value["nome"];
                    $usuario->email = $value["email"];
                    $usuario->cpf = $value["cpf"];
                    $usuario->nivel_acesso = $value["nivel_acesso"];
                    $usuario->id_usuario = $value["id_usuario"];
                    $usuario->ativo = $value["ativo"];
                    $usuario->data_cadastro = $value["data_cadastro"];

                    $dados[] = $usuario;
                }
                return $dados;

            default:
                return "error";
        }
    }

    function AtivarBloquear(){
        $query = "UPDATE usuario SET ativo = ? WHERE id_usuario = ?;";
        $values = array(
            $this->ativo,
            $this->id_usuario
        );
        $exec = $this->db->prepare($query);
        $exec->execute($values);
    }

    # Necessario limpar todos os registros do banco onde incluem esse usuario
    /*
    function Excluir(){}
    */
}