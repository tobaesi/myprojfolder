/* Testé sous MySQL 5.x */

CREATE DATABASE IF NOT EXISTS `myprojfolder` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `myprojfolder`;

drop table if exists USER;
drop table if exists MENAGE;
drop table if exists FICHE;

create table USER (
  ID integer primary key auto_increment,
  USERNAME varchar(100) not null,
  PASSWORD varchar(100) not null,
  ADMIN TINYINT(1) DEFAULT 0
  
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;


create table MENAGE (
  ID integer primary key auto_increment,
  NAME_MENAGE varchar(100) not null,
  AUTHOR varchar(100) not null,
  SUMMARY varchar(400) not null
    
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

create table FICHE (
  NUM_IMMAT integer primary key auto_increment,
  NAME_FICHE varchar(100) not null,
  SURNAME_FICHE varchar(100) not null,
  BIRTH_FICHE DATE not null,
  BIRTH_PLACE varchar(100) not null,
  SITUA_FAM varchar(100) not null,
  PROFESS varchar(100) not null,
  NATIO_ACTU varchar(100) not null,
  NATIO_ORIG varchar(100) not null,
  ADRESS_ACTU varchar(200) not null,
  TEL varchar(30) not null,
  FATHER_NAME varchar(100),
  MOTHER_NAME varchar(100),
  DIPLOME varchar(200),
  DATE_IN DATE not null,
  DATE_OUT DATE,
  ADRESS_MADA varchar(200) not null,
  ADRESS_MADA_URG varchar(200) not null,
  
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;


insert into BOOK(TITLE, AUTHOR, SUMMARY) values
('Nineteen Eighty-Four', 'George Orwell', 'Nineteen Eighty-Four: A Novel, often published as 1984, is a dystopian novel by English novelist George Orwell. It was published on 8 June 1949 by Secker & Warburg as Orwell s ninth and final book completed in his lifetime.');

insert into BOOK(TITLE, AUTHOR, SUMMARY) values
('Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', '100,000 years ago, at least six human species inhabited the earth. Today there is just one. Us. Homo sapiens.');

insert into USER(USERNAME, PASSWORD) values
('user', 'user');
insert into USER(USERNAME, PASSWORD, ADMIN) values
('admin', 'admin',1);
