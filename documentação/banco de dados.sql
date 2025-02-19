CREATE DATABASE db_projeto_easy_life;


-->         TABELA DO MODULO DE CHAMADOS

CREATE TABLE tb_departamentos(
    pk_id_departamento int not null auto_increment primary key,   
    departamento varchar(30) not null,
    situacao_departamento int not null
);

CREATE TABLE tb_usuarios(   
    pk_id_usuario int not null auto_increment primary key,  
    fk_id_departamento int not null,
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








-->         TABELAS DO MODULO CONSELHO

CREATE TABLE tb_modalidade_arquivos(
    pk_id_modalidade_arquivo int not null auto_increment primary key,
    modalidade_arquivo varchar(30),
    situacao_modalidade int
);

CREATE TABLE tb_arquivos(
    pk_id_arquivo int not null auto_increment primary key,
    nome_arquivo TEXT,
    caminho_arquivo TEXT,
    situacao_arquivo int
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
















-->         adicionando primeiro depatrtamto e usuario
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
        usuario, 
        tipo_usuario,
        fk_id_departamento,
        situacao_usuario,         
        senha
        )
VALUES
        ("alvaro",1,1,1,"202cb962ac59075b964b07152d234b70a");
        






INSERT INTO tb_usuarios (usuario, senha, tipo_usuario, situacao_usuario, fk_id_departamento) VALUES

('SERGIO', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('RONALDO', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('PASCOAL', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('LUIS', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('ISA', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('MARLI', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('CAMILA', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('SECRETARIA', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('LEANDRO.SEC', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('SOFTWELL', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('CAYLON', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('CINTIA', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('VANDA', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('VICTORIA', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('DAIANE2', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('DAIANE1', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('FELIPE', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('LUCIANE', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('EDEVILMA', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('JORGE', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('JESSICA', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('ANTONIO.RUIZ', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('SUELLEN.GALERA', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('CLOVIS', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('ANGELA.PIS', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('LUCIANO', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('ELAINE', '202cb962ac59075b964b07152d234b70a', 2, 1, 13),
('IVANETE', '202cb962ac59075b964b07152d234b70a', 2, 1, 25),
('OSWALDO', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('ELIETE', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('VANESSA.BRITO', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('EMERSON', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('PISCINA', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('CESAR', '202cb962ac59075b964b07152d234b70a', 2, 1, 25),
('ESTACIONAMENTO', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('MELINA', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('ALVARO', '202cb962ac59075b964b07152d234b70a', 1, 1, 10),
('LARISSA.SEC', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('BIA', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('ANGELA', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('ADRIANO', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('CELSO.BIANCHI', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('MEDICO', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('MARCOS.ALMOX', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('DAIANE3', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('RODRIGO', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('JOAO.SEG', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('FABIO.COMPRAS', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('LAERTE', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('LEANDRO.RH', '202cb962ac59075b964b07152d234b70a', 2, 1, 25),
('ARIANE', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('ROSE', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('MANUTENCAO', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('ALEX.ALMOX', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('FUTEBOL', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('FABIO', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('PIERRE', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('JENIFER', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('MAURO', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('RAI.SAUNA', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('ALEX.SAUNA', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('BETE', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('VANESSA.EVENTOS', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('CONSELHO', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('POLLIANE', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('ALEX.RH', '202cb962ac59075b964b07152d234b70a', 2, 2, 25),
('THIAGO', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('NATHAN', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('MONICA', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('TADEU', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('PRISCILA', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('CLAUDIO.ARQ', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('LIMPEZA', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('REGIANE', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('LETICIA', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('GABRIELA', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('MARCIA', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('WLADIMIR', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('BEACH', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('PORTARIA', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('VENDAS', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('GIOVANNA', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('EVELYN', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('GUILHERME', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('ADILSON', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('JUNIOR', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('MARCELO TI', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('LUCAS.RH', '202cb962ac59075b964b07152d234b70a', 2, 1, 25),
('DANIEL', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('RAUL', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('ALEX_5', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('LUA', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('LEIDI', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('ALLANA', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('LARISSA.PIS', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('PROC.AUT', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('REGINA', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('ALINE', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('SILVESTRE', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('HAYNA', '202cb962ac59075b964b07152d234b70a', 2, 2, 10),
('BRUNA', '202cb962ac59075b964b07152d234b70a', 2, 1, 10),
('FISCAL', '202cb962ac59075b964b07152d234b70a', 2, 1, 10);





INSERT INTO tb_departamentos (departamento, situacao_departamento) VALUES
('DEP. PORTARIA', 1),
('DEP. PISCINAS TERMICAS', 1),
('ESPORTES', 1),
('DEP. MEDICO', 1),
('DEP. COMPRAS', 1),
('DEP. TENIS', 1),
('DEP. ALMOXARIFADO', 1),
('DEP. FUTEBOL DE SALAO', 1),
('DEP. SEDE ADMINISTRATIVA', 1),
('SECRETARIA', 1),
('ESTADIO JAVARI', 1),
('DEP. PESSOAL', 1),
('DEP. PALACIOS DE FESTAS', 1),
('DEP. LAVANDERIA', 1),
('DEP. KARATE', 1),
('DEP. JUDO', 1),
('DEP. GARAGENS', 1),
('DEP. FUTEBOL PROFISSIONAL', 1),
('DEP. FUTEBOL FEMININO', 1),
('DEP. FUTEBOL DE CAMPO ASSOC.', 1),
('DEP. FUTEBOL AMADORES (JUNIORES)', 1),
('DEP. FISIOTERAPIA (SAUNA)', 1),
('DEP. ESPACO UGOLINI (BINGO)', 1),
('DEP. ESTADIO ROBERTO UGOLINI', 1),
('DEP. ESTADIO CONDE. ROD. CRESPI', 1),
('DEP. ESPORTES OLIMP. AMADORES', 1),
('DEP. CONJUNTO AQUATICO', 1),
('DEP. COBR. PREST. TIT. TX. MANUT.', 1),
('DEP. CARTEIRAS SOCIAS', 1),
('DEP. BOCHAS', 1),
('DEP. BOATE', 1),
('DEP. BASQUETEBOL', 1),
('DEP. ADMINISTRACAO', 1),
('DEP. VOLEBOL', 1),
('DEP. VESTIARIOS', 1),
('DEP. TESOURARIA', 1),
('DEP. SOCIAL', 1),
('DEP. MANUTENCAO', 1),
('DEP. LIMPEZA', 1);