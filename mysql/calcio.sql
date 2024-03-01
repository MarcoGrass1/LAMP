CREATE DATABASE IF NOT EXIST Calcio;

create table if not EXIST squdre(
    ID_Squadre int auto_increment primary key not null,
    nome varchar(30)
)

create table if not exist calciatori(
    ID_calciatori int primary key auto_increment not null,
    Cognome varchar(30) not null,
    ruolo int, 
    stipendio int,
    nascita date not null,
    capitano int,
    fk_squadra int,
    foreing key fk_squadra references squdre(ID_Squadre) on update cascade on delete no action
)
create table if not exist valutazioni(
    ID_valutazioni int primary key auto_increment not null,
    voto int not null,
    dsata_partita date not null,
    fk_calciatore int,
    foreing key fk_calciatore references calciatori(ID_calciatori) on update cascade on delete no action
)