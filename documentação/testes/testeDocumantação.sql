query para contar quantas apostas o usuario fez durante o mes

para apelidar um alias que estamos fazendo no nosso banco podemos renomear uma variavel no banco

SELECT
     "coisa selecionada",count(id) as nome do apelido
FROM
    tb_aspostas
WHERE



relacionamento de um para um{
    como fazer o insert em tabelas relacionadas



    query na hora de fazer o banco para relacionar-los
create table tb_exemolo(
    id int nol null AUTO_INCREMENT primary key
    (coluna que vai ter os dados para mandar para a outra estrangeira)int

);


create table tb_exemolo(
    id int nol null AUTO_INCREMENT primary key
    (coluna para receber os dados a serem puchados)int not null
    foreign key(nome da chave que vai receber o dado a ser puchado) references tabela que vai ser puchada a coluna(coluna que vai ter o valor puchado)

);
}

