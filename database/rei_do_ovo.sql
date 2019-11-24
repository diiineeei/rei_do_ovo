-- DROP DATABASE rei_do_ovo;
-- CREATE DATABASE rei_do_ovo;
USE rei_do_ovo;

CREATE TABLE nivel_acesso(
    id_nivel_acesso TINYINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nivel VARCHAR(13) NOT NULL
);

CREATE TABLE usuario(
    id_usuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    cpf CHAR(14) NOT NULL,
    senha VARCHAR(40) NOT NULL,
    email VARCHAR(100) NOT NULL,
    celular VARCHAR(15) NOT NULL,
    nivel_acesso TINYINT NOT NULL,
    ativo TINYINT NOT NULL DEFAULT '1',
    data_cadastro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (nivel_acesso) REFERENCES nivel_acesso(id_nivel_acesso)
);

CREATE TABLE endereco_entrega(
    id_endereco INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cep CHAR(8) NOT NULL,
    rua VARCHAR(50) NOT NULL,
    bairro VARCHAR(25),
    cidade VARCHAR(30),
    estado CHAR(2) NOT NULL DEFAULT 'SP',
    ativo TINYINT NOT NULL DEFAULT '1',
    usuario INT NOT NULL,
    FOREIGN KEY (usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE produto(
    id_produto INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    descricao TEXT NOT NULL,
    valor DECIMAL(5,2) NOT NULL DEFAULT '00.00',
    ativo TINYINT NOT NULL DEFAULT '1'
);

CREATE TABLE pedido(
    id_pedido INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    usuario INT NOT NULL,
    entregador INT NOT NULL,
    produto INT NOT NULL,
    quantidade INT NOT NULL,
    endereco_entrega INT NOT NULL,
    valor_total DECIMAL(5,2) NOT NULL,
    data_pedido DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    ativo TINYINT NOT NULL DEFAULT '1',
    FOREIGN KEY (usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY (endereco_entrega) REFERENCES endereco_entrega(id_endereco),
    FOREIGN KEY (entregador) REFERENCES usuario(id_usuario),
    FOREIGN KEY (produto) REFERENCES produto(id_produto)
);
