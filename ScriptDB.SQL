create database if not exists tadepe;
use tadepe;
create table if not exists usuario(
	idUser bigint auto_increment not null unique,
	nickname varchar(64) not null unique,
    email varchar(64) not null unique,
    pass varchar(256) not null,
    pontuacao int,
    primary key(idUser)
)engine=innodb;
create table if not exists alertas(
	idAlerta bigint not null auto_increment,
    endereco varchar(128) not null,
    cidade varchar(32) not null,
    uf varchar(2) not null,
    escola varchar(64) not null,
    numeroAlertas int,
    alertaRespondido int,
	primary key(idAlerta)
)engine=innodb;

insert into alertas values(null,"Rua Serra de Botucatu, Vila Gomes Cardim","São Paulo","SP", "Cei Setor 8002", 3,0);
insert into alertas values(null,"Rua Domingos Delgado, Vila Francos","São Paulo","SP", "Cei Setor 1106",2,0);
insert into alertas values(null,"Via Transversal Sul, Conceição","São Paulo","SP", "Emei Conceição",1,1);
insert into alertas values(null,"Rua Francisco Morato, Vila Menk","São Paulo","SP", "Emei Vila Menk",1,1);
insert into alertas values(null,"Rua Cláudio Aparecido Oliveira, Jardim Roberto","São Paulo","SP", "Emei Jardin Roberto II",5,1);
insert into alertas values(null,"Rua Doutor Pedro dos Santos Figueiredo, Veloso","São Paulo","SP", "Emei Veloso",5,1);
insert into alertas values(null,"Rua Egeu, Conjunto Habitacional Presidente Castelo Branco","São Paulo","SP", "Rua Egeu",2,0);
insert into alertas values(null,"Rua João Fasoli, Jardim Marilu","São Paulo","SP", "Estrada João Fasoli",1,0);
insert into alertas values(null,"Avenida Soldado-Polícia Militar Gilberto Augustinho, Jardim Valo Velho","São Paulo","SP", "Creche 007 Valo Velho",1,1);
insert into alertas values(null,"Estrada do Jatobá, Vila Veloso","São Paulo","SP", "Estrada do Jatobá",1,1);
