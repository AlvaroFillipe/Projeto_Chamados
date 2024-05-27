CREATE DATABASE db_projeto_chamados;


CREATE TABLE tb_usuarios(   
    pk_id_usuario int not null auto_increment primary key,
    email varchar(150) not null,
    usuario varchar(150) not null,
    tipo_usuario int not null,
    Departamento int not null,
    senha varchar(32) not null   
);


CREATE TABLE tb_chamados(
    pk_id_chamado int not null auto_increment primary key,
    fk_id_usuario int not null,
    chamado text not null,
    data_chammado DATETIME DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY(fk_id_usuario)REFERENCES tb_usuarios(pk_id_usuario),
    FOREIGN KEY(fk_id_departamento)REFERENCES tb_departamentos(pk_id_departamento),
)

CREATE TABLE tb_departamentos(
    pk_id_departamento int not null auto_increment primary key,   
    departamento varchar(30) not null   
)




INSERT INTO 
    tb_usuarios
        (
        email, 
        usuario, 
        tipo_usuario, 
        departamento, 
        senha
        )
VALUES
        ("alvarofillipe6@gmail.com","alvaro",1,1,"123");





