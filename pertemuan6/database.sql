CREATE DATABASE artikels;

USE artikels;

CREATE TABLE 'posts'
(
    id int(11) NOT NULL auto_increment,
    'judul' varchar(255),
    'konten' text(),
    PRIMARY_KEY('id')
);