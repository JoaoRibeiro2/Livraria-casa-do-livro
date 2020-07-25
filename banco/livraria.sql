create database livraria;

use livraria;

create table tb_usuario(
cd_usuario int primary key auto_increment,
nm_usuario VARCHAR(60) not null,
ds_senha VARCHAR(60) not null,
nm_login VARCHAR(60) not null,
dt_nascimento DATE not null,
cd_telefone VARCHAR(20) not null,
nm_email VARCHAR(60) not null,
cpf_usuario VARCHAR(45) not null,
rg_usuario VARCHAR(45) not null
)default character set = utf8;

create table tb_endereco(
cd_endereco int primary key auto_increment,
cep_endereco VARCHAR(20) not null,
ds_endereco VARCHAR(60) not null,
complemento_endereco VARCHAR(45),
id_usuario int,
foreign key(id_usuario) references tb_usuario(cd_usuario)
)default character set = utf8;

create table tb_compra(
cd_compra int primary key auto_increment,
dt_compra DATE,
vl_total_compra REAL,
id_usuario int
)default character set = utf8;

create table tb_categoria(
cd_categoria int primary key auto_increment,
nm_categoria VARCHAR(60) not null,
ds_categoria LONGTEXT
)default character set = utf8;

create table tb_editora(
cd_editora int primary key auto_increment,
nm_editora VARCHAR(40),
nm_logo_editora VARCHAR(45)
)default character set = utf8;

create table tb_autor(
cd_autor int primary key auto_increment,
nm_autor VARCHAR(60) not null,
nm_foto_autor VARCHAR(45)
)default character set = utf8;

create table tb_livro(
cd_livro int primary key auto_increment,
nm_livro VARCHAR(120) not null,
idioma_livro VARCHAR(30) not null,
isbn_livro VARCHAR(13) not null,
ano_lancamento YEAR(4) not null,
altura_livro int ,
largura_livro int,
profundidade_livro int ,
peso_livro double,
n_paginas int not null,
n_exemplares int not null,
vl_livro real not null,
id_editora int ,
id_autor int,
foreign key(id_editora) references tb_editora(cd_editora),
foreign key(id_autor) references tb_autor(cd_autor)
)default character set = utf8;

create table tb_livro_categoria(
id_categoria int,
id_livro int,
foreign key(id_categoria) references tb_categoria(cd_categoria),
foreign key(id_livro) references tb_livro(cd_livro)
)default character set = utf8;

create table tb_desejo(
id_livro int,
id_usuario int,
ds_aviso VARCHAR(45),
foreign key(id_livro) references tb_livro(cd_livro),
foreign key(id_usuario) references tb_usuario(cd_usuario)
)default character set = utf8;

create table tb_item_compra(
id_livro int,
id_compra int,
vl_livro real not null,
qt_livro VARCHAR(45) not null,
foreign key(id_livro) references tb_livro(cd_livro),
foreign key(id_compra) references tb_compra(cd_compra)
)default character set = utf8;

create table tb_foto(
cd_foto int primary key auto_increment,
nm_foto VARCHAR(120) not null,
id_livro int,
foreign key (id_livro) references tb_livro(cd_livro)
)default character set = utf8;








insert into tb_autor values (null, "Tolkien","tolkien.png");
insert into tb_autor values (null, "Stephiane Meyer","stephane.png");
insert into tb_autor values (null, "C.S Lewis","lewis.png");

insert into tb_categoria values (null, "Ação","Tiroteios");
insert into tb_categoria values (null, "Aventura","Guerras e animais em Nárnia");


insert into tb_editora values (null, "Martins Fontes","martins.png");
insert into tb_editora values (null, "Harler Coppins","Harler.png");


insert into tb_livro values (null, "Narnia", "Portugues",1111222,"2000",40,35,1,1,700,100,80,1,3);


select * from tb_autor;
select * from tb_editora;
select * from tb_livro;

