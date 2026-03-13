CREATE DATABASE sms;

USE sms;

CREATE TABLE students(
id INT PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(50),
email VARCHAR(50),
age INT,
course ENUM('DBMS','JS','OS','DAA','DSA','Python'),
marks INT
);