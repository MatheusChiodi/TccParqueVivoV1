create database TCC;
use TCC;

-- usuario ------------------------------------------------

create table usuario(

	id_usuario int auto_increment
	,email_usuario varchar(40)
    ,nome_usuario varchar(30)
    ,senha_usuario int
    ,stasts_usuario int
	,primary key(id_usuario)
    
) ENGINE = MYISAM;

insert into usuario(email_usuario,nome_usuario,senha_usuario,stasts_usuario)
value("adm@adm.com","adm",1234,0);-- adm do site
insert into usuario(email_usuario,nome_usuario,senha_usuario,stasts_usuario)
value("luchiodi312@gmail.com","luciana",1234,0);

select * from usuario;

-- Tentativas Login ------------------------------------------------

CREATE TABLE tentativa_login(
	id_tentativa INT AUTO_INCREMENT PRIMARY KEY,
    ip_tentativa VARCHAR(15),
    email_tentativa VARCHAR(100) references usuario(email_usuario),
    origem_tentativa VARCHAR(300),
    bloqueado VARCHAR(10),
    data_hora_tentativa timestamp NULL DEFAULT CURRENT_TIMESTAMP
)ENGINE = MYISAM;
select * from tentativa_login;
SET SQL_SAFE_UPDATES = 0;

set global event_scheduler = on;
select @@event_scheduler;

/*CREATE EVENT apagar_tentativa
ON SCHEDULE
EVERY 30 minute
DO
delete from tentativa_login where data_hora_tentativa < DATE_SUB(NOW(), INTERVAL 30 MINUTE); ver se ta certo*/

-- delete from tentativa_login where data_hora_tentativa < DATE_SUB(NOW(), INTERVAL 30 MINUTE);

-- select * from tentativa_login where ip_tentativa = '::1' ;

-- select data_hora_tentativa 
-- from tentativa_login where ip_tentativa = '::1' and bloqueado = 'on';

-- trabalho------------------------------------------------

CREATE TABLE evento(
	id_evento int auto_increment
	,email_evento varchar(40) references usuario(email_usuario)
    ,nome_parceiro_evento varchar(40) references usuario(nome_usuario)
    ,telefone_evento varchar(12)
    ,face_evento varchar(40)
    ,insta_evento varchar(40)
    ,nome_evento varchar(40)
    ,data_evento varchar(40)
    ,horario_inicio_evento varchar(40)
    ,duracao_evento varchar(40)
    ,local_evento varchar(40)
    ,descricao_evento varchar(50)
    ,publico_alvo_evento varchar(20)
    ,solic_levar_algo_evento varchar(20) -- sim ou não
    ,solic_suporte_evento varchar(20) -- sim ou não 
    ,evento_voluntario_periodico_evento varchar(20) -- sim ou não 
    ,comentarios_adicionais_evento varchar(20)
    ,nome_voluntario_evento varchar(20)
	,primary key(id_evento)
)ENGINE = MYISAM;
select * from evento;

insert into evento(email_evento,nome_parceiro_evento,telefone_evento ,face_evento,insta_evento,nome_evento,data_evento,horario_inicio_evento ,duracao_evento,local_evento,descricao_evento,publico_alvo_evento ,solic_levar_algo_evento,solic_suporte_evento,evento_voluntario_periodico_evento ,comentarios_adicionais_evento,nome_voluntario_evento) 
value ('luchiodi312@gmail.com','hgfdsdfghjhgfds','999999999999' ,'hgfdsdfghjmhgf','jhgfdcfvgbhjkjh','kjhgfdsdfghmnbf' ,'2020-08-27','17:27','19:27' ,'sdfghgfdfghjhgf','ngfdfghgfdcfvgbhgfdfghgfdfghgf','gfdcfvgbhgfdfgh' ,'sim','sim','sim' ,'asdfgfdsdfghgfd','dfghgfdfghgrdfg');

-- mensagens para os adm

create table mensagem_adm_usuario(
	id_mensagem int auto_increment
	,email_usuario_mensagem_de varchar(40) references usuario(email_usuario)
    ,email_usuario_mensagem_para varchar(40) references usuario(email_usuario)
	,data_hora_mensagem timestamp NULL DEFAULT CURRENT_TIMESTAMP
    ,conteudo_mensagem varchar(500)
	,primary key(id_mensagem)
) ENGINE = MYISAM;

select * from mensagem_adm_usuario;

insert into mensagem_adm_usuario(email_usuario_mensagem_de,email_usuario_mensagem_para,conteudo_mensagem)
value("adm@adm.com","luchiodi312@gmail.com","oi como posso te ajudar?");

show tables;

desc usuario;

-- -------------- consultas ----------------------------------------

-- select usuario.nome_usuario,mensagem_adm_usuario.email_usuario_mensagem_de
-- from usuario,mensagem_adm_usuario
-- where usuario.email_usuario like mensagem_adm_usuario.email_usuario_mensagem_de
-- and mensagem_adm_usuario.email_usuario_mensagem_de <> 'adm@adm.com'
-- GROUP BY mensagem_adm_usuario.email_usuario_mensagem_de;

-- select email_usuario_mensagem_de
-- from mensagem_adm_usuario
-- where email_usuario_mensagem_de <> 'adm@adm.com'
-- GROUP BY email_usuario_mensagem_de;

-- select * 
-- from evento
-- where id_evento like 1;

-- update evento 
-- set nome_parceiro_evento = "hgfdsdfghjhgfds" 
-- ,telefone_evento = "999999999999" 
-- ,face_evento = "hgfdsdfghjmhgf" 
-- ,insta_evento = "jhgfdcfvgbhjkjh" 
-- ,nome_evento = "kjhgfdsdfghmnbf" 
-- ,data_evento = "2020-08-26" 
-- ,horario_inicio_evento = "15:41" 
-- ,duracao_evento = "18:41" 
-- ,local_evento = "sdfghgfdfghjhgf" 
-- ,descricao_evento = "ngfdfghgfdcfvgbhgfdfghgfdfghgf" 
-- ,publico_alvo_evento = "gfdcfvgbhgfdfgh" 
-- ,solic_levar_algo_evento = "sim" 
-- ,solic_suporte_evento = "sim" 
-- ,evento_voluntario_periodico_evento = "sim" 
-- ,comentarios_adicionais_evento = "asdfgfdsdfghgfd" 
-- ,nome_voluntario_evento = "dfghgfdfghgrdfg" 
-- WHERE id_evento = "1";




