CREATE DATABASE IF NOT EXISTS Calcio;
USE Calcio;
SHOW DATABASES;

CREATE TABLE IF NOT EXISTS squadre(
    ID_Squadre int auto_increment primary key not null,
    nome varchar(30)
);
SHOW TABLES;


create table if not exists calciatori(
    ID_calciatori int primary key auto_increment not null,
    Cognome varchar(30) not null,
    ruolo int, 
    stipendio int,
    nascita date not null,
    capitano int,
    fk_squadra int,
    foreign key (fk_squadra) references squadre(ID_Squadre) on update cascade on delete no action
);
SHOW TABLES;

create table if not exists valutazioni(
    ID_valutazioni int primary key auto_increment not null,
    voto int not null,
    dsata_partita date not null,
    fk_calciatore int,
    foreign key (fk_calciatore) references calciatori(ID_calciatori) on update cascade on delete no action
);
SHOW TABLES;

alter table calciatori CHANGE ruolo ruolo varchar(30);
insert into squadre (ID_Squadre,nome) values(1,'Milan');
insert into calciatori values(1,'Grassi','trequartista',21000,'2005/05/16',3,1);