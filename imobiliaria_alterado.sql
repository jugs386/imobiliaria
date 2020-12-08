create database imobiliaria;
use imobiliaria;

create table usuario(
	id int(4) auto_increment primary key,
    login varchar(10),
    senha varchar(100),
    permissao char(1)
);

create table imovel(
	id int(4) auto_increment primary key,
    descricao text,
    foto longblob,
    fotoTipo varchar(20),
    valor decimal(9,2),
    tipo char(1)
);

create table visualizacao(
	id int(4) auto_increment primary key,
    idImovel int (4) not null,
    data date,
    hora time,
    foreign key(idImovel) references Imovel(id)
);

insert into usuario values (null,'admin','e10adc3949ba59abbe56e057f20f883e','A');
alter table imovel add path varchar(50);