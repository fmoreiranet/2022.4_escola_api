/* Comandos de DDL */
/* Criar o banco de dados*/
create database dbescola;

/* Selecionar o banco de dados */
use dbescola;

/* Criar tabelas */
CREATE TABLE aluno(
    matricula int not null AUTO_INCREMENT PRIMARY KEY,
    nome varchar(150) not null,
    email varchar(150) not null,
    senha varchar(100) not null,
    data_nasc date null
);

CREATE TABLE avaliacao(
    id int(11) not null AUTO_INCREMENT PRIMARY KEY,
    turma varchar(10) NOT NULL,
    nota1 decimal(5, 2) NULL,
    nota2 decimal(5, 2) NULL,
    media decimal(5, 2) NULL,
    resultado varchar(30) NULL,
    matricula int not null,
    foreign key (matricula) references aluno(matricula)
);

/* Altera estrutura da tabela*/
alter table avaliacao
add matricula int not null after resultado,
add foreign key (matricula) references aluno(matricula);

/*Remove elementos da estrutura da table*/
alter table avaliacao
drop column turma;

/* remove a tabela do banco de dados*/
drop table avaliacao;


/* Comandos de DML*/
/*Adicionar registro no banco de dados*/
INSERT into aluno (nome, email, senha) 
value("Fabiano Moreira", "fabianomoreira@email.com", "123456");

INSERT into aluno (nome, email, senha) 
value
("Ana Silva", "anasilva@email.com", "123456"),
("Pedro Silva", "pedrosilva@email.com", "123456");
