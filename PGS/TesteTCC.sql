create database TesteTCC; 
use TesteTCC;

-- drop database projetoTCC;

-- usuario ------------------------------------------------
create table usuario(

	id_usuario int auto_increment
	,email_usuario varchar(40)
    ,nome_usuario varchar(30)
    ,senha_usuario int
    ,stasts int
    ,foto_capa varchar(10)
    ,foto_perfil varchar(10)
	,primary key(id_usuario)
    
) ENGINE = MYISAM;

insert into usuario(email_usuario,nome_usuario,senha_usuario,stasts)
value("adm@adm.com","adm",123,0);

select * from usuario;

-- Tentativas Login ------------------------------------------------

CREATE TABLE tentativa_login(
	id_tentativa INT AUTO_INCREMENT PRIMARY KEY,
    ip_tentativa VARCHAR(15),
    email_tentativa VARCHAR(100),
    senha_tentativa VARCHAR(300),
    origem_tentativa VARCHAR(300),
    bloqueado CHAR(3),
    data_hora_tentativa timestamp NULL DEFAULT CURRENT_TIMESTAMP
);
select * from tentativa_login;

-- trabalho------------------------------------------------

create table trabalho(

	id_trabalho int auto_increment
	,nome_trabalho varchar(40)
    ,id_usuario int -- id do trabalhador q assume tal função-- 
	,primary key(id_trabalho)
    ,foreign key (id_usuario) references usuario(id_usuario)
    
) ENGINE = MYISAM;

select * from trabalho;

-- lugares------------------------------------------------

create table lugares(

	id_lugar int auto_increment
	,nome_lugar varchar(100)
    ,endereco_lugar varchar(100)
	,primary key(id_lugar)
    
) ENGINE = MYISAM;

select * from lugares;

-- denuncia------------------------------------------------

	create table denuncia(

	id_denuncia int auto_increment
    ,denuncia varchar(1000)
	,id_usuario int 
    ,id_lugar int 
	,primary key(id_denuncia)
    ,foreign key (id_usuario) references usuario(id_usuario)
    ,foreign key (id_lugar) references lugares(id_lugar)
    
) ENGINE = MYISAM;

select * from denuncia;

-- a se pensar --------------------------------------------------------

-- materiais------------------------------------------------

	create table materiais(

	id_reciclagem int auto_increment
    ,dados_reciclagem varchar(1000)
	,materiais_reciclagem int 
    ,id_lugar int 
	,primary key(id_denuncia)
    ,foreign key (id_usuario) references usuario(id_usuario)
    ,foreign key (id_lugar) references lugares(id_lugar)
    
) ENGINE = MYISAM;

select * from materiais;

-- reciclagem------------------------------------------------

	create table reciclagem(

	id_reciclagem int auto_increment
    ,dados_reciclagem varchar(1000)
	,materiais_reciclagem int 
	,primary key(id_reciclagem)
    
) ENGINE = MYISAM;

select * from reciclagem;