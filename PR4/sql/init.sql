CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT,DELETE ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;
CREATE TABLE IF NOT EXISTS users (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    login VARCHAR(20) NOT NULL,
    password VARCHAR(40) NOT NULL,
    PRIMARY KEY (ID)
);

INSERT INTO users (login, password)
SELECT * FROM (SELECT 'Alex', '1111') AS tmp
WHERE NOT EXISTS (
    SELECT login FROM users WHERE login = 'Alex' AND password = '1111'
) LIMIT 1;

INSERT INTO users (login, password)
SELECT * FROM (SELECT 'Bob', '2222') AS tmp
WHERE NOT EXISTS (
    SELECT login FROM users WHERE login = 'Bob' AND password = '2222'
) LIMIT 1;

INSERT INTO users (login, password)
SELECT * FROM (SELECT 'Kate', '3333') AS tmp
WHERE NOT EXISTS (
    SELECT login FROM users WHERE login = 'Kate' AND password = '3333'
) LIMIT 1;

INSERT INTO users (login, password)
SELECT * FROM (SELECT 'Lilo', '4444') AS tmp
WHERE NOT EXISTS (
    SELECT login FROM users WHERE login = 'Lilo' AND password = '4444'
) LIMIT 1;


CREATE TABLE IF NOT EXISTS dishes (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    dishName VARCHAR(20) NOT NULL,
    cost INT(11) NOT NULL,
    PRIMARY KEY (ID)
);

INSERT INTO dishes (dishName, cost)
SELECT * FROM (SELECT 'Omelette', 600) AS tmp
WHERE NOT EXISTS (
    SELECT dishName FROM dishes WHERE dishName = 'Omelette' AND cost = 600
) LIMIT 1;

INSERT INTO dishes (dishName, cost)
SELECT * FROM (SELECT 'Julienne', 400) AS tmp
WHERE NOT EXISTS (
    SELECT dishName FROM dishes WHERE dishName = 'Julienne' AND cost = 400
) LIMIT 1;

INSERT INTO dishes (dishName, cost)
SELECT * FROM (SELECT 'Tiramisu', 1000) AS tmp
WHERE NOT EXISTS (
    SELECT dishName FROM dishes WHERE dishName = 'Tiramisu' AND cost = 1000
) LIMIT 1;

INSERT INTO dishes (dishName, cost)
SELECT * FROM (SELECT 'Burger', 500) AS tmp
WHERE NOT EXISTS (
    SELECT dishName FROM dishes WHERE dishName = 'Burger' AND cost = 500
) LIMIT 1;