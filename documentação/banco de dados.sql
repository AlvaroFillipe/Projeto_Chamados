CREATE DATABASE db_projeto_easy_life;




CREATE TABLE tb_departamentos(
    pk_id_departamento int not null auto_increment primary key,   
    departamento varchar(30) not null,
    situacao_departamento int not null
);

CREATE TABLE tb_usuarios(   
    pk_id_usuario int not null auto_increment primary key,  
    fk_id_departamento int not null,  
    email varchar(150) not null,
    usuario varchar(150) not null,
    tipo_usuario int not null,    
    situacao_usuario int not null,
    senha varchar(32) not null,   

     FOREIGN KEY(fk_id_departamento)REFERENCES tb_departamentos(pk_id_departamento)
 
);

CREATE TABLE tb_chamados(
    pk_id_chamado int not null auto_increment primary key,
    fk_id_usuario int not null,
    fk_id_departamento int not null,
    chamado text not null,
    status_chamado int not null,
    solucao_chamado text not null,
    data_chamado DATETIME DEFAULT CURRENT_TIMESTAMP,
    situacao_chamado int not null,

    FOREIGN KEY(fk_id_usuario)REFERENCES tb_usuarios(pk_id_usuario),
    FOREIGN KEY(fk_id_departamento)REFERENCES tb_departamentos(pk_id_departamento)
);











CREATE TABLE tb_modalidade_arquivos(
    pk_id_modalidade_arquivo int not null auto_increment primary key,
    modalidade_arquivo varchar(30),
    situacao_modalidade int
);

CREATE TABLE tb_modalidade_evento(
    pk_id_modalidade_evento int not null auto_increment primary key,
    modalidade_evento varchar(30),
    situacao_modalidade int 
);



CREATE TABLE tb_evento_conselho(
    pk_id_evento int not null auto_increment primary key,
    fk_id_modalidade_evento int,
    nome_evento TEXT,
    caminho_pasta TEXT,
    data_criacao_evento DATETIME DEFAULT CURRENT_TIMESTAMP,
    data_evento DATETIME,
    tag_evento TEXT,
    situacao_evento int,

    FOREIGN KEY(fk_id_modalidade_evento)REFERENCES tb_modalidade_evento(pk_id_modalidade_evento)
);

CREATE TABLE tb_arquivos_conselho(
    pk_id_arquivo int not null auto_increment primary key,
    fk_id_modalidade_arquivo int not null,
    fk_id_evento_conselho int not null,
    nome_arquivo varchar(150) not null, 
    assunto_arquivo varchar(50),
    caminho_arquivo TEXT,
    data_criacao_arquivo DATETIME DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY(fk_id_modalidade_arquivo)REFERENCES tb_modalidade_arquivos(pk_id_modalidade_arquivo), 
    FOREIGN KEY(fk_id_evento_conselho)REFERENCES tb_evento_conselho(pk_id_evento)
);
















//adicionando primeiro depatrtamto e usuario
INSERT INTO 
    tb_departamentos
        (
        departamento,
        situacao_departamento
        )
VALUES
        ("dep_piloto",1);
INSERT INTO 
    tb_usuarios
        (
        email, 
        usuario, 
        tipo_usuario,
        fk_id_departamento,
        situacao_usuario,         
        senha
        )
VALUES
        ("alvarofillipe6@gmail.com","alvaro",1,1,1,"202cb962ac59075b964b07152d234b70a");








