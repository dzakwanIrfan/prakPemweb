CREATE DATABASE modul_6;

USE modul_6;

CREATE TABLE 'pengguna'
(
    'id' int(11) NOT NULL auto_increment,
    'username' varchar(100),
    'password' varchar(100),
    PRIMARY_KEY('id')
);