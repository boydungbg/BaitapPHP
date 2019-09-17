Drop DATABASE if EXISTS onlineshopdb;
CREATE DATABASE if NOT EXISTS onlineshopdb;
USE onlineshopdb;
CREATE TABLE IF not EXISTS Users(
user_id int PRIMARY KEY AUTO_INCREMENT,
user_fname varchar(50) not null,
user_lname varchar(50)  not null,
user_username varchar(50)  not null,
user_email varchar(50) not null,
user_pass varchar(30) not null,
user_registerdate datetime DEFAULT Now(),
user_level tinyint(1)
);