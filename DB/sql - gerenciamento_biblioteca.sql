CREATE DATABASE gerenciamento_biblioteca;
USE gerenciamento_biblioteca;

CREATE TABLE livro(
id_livro INT PRIMARY KEY AUTO_INCREMENT,
titulo VARCHAR(200) NOT NULL,
autor VARCHAR(150) NOT NULL,
genero VARCHAR(100) NOT NULL,
ano_publicacao CHAR(4) NOT NULL,
isbn CHAR(13) NOT NULL
);
