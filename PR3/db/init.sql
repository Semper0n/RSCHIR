CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;
CREATE TABLE IF NOT EXISTS users (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  login VARCHAR(20) NOT NULL,
  password VARCHAR(40) NOT NULL,
  PRIMARY KEY (ID)
);
CREATE TABLE IF NOT EXISTS products (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(80) NOT NULL,
  price INTEGER,
  PRIMARY KEY (ID)
);

INSERT INTO users (login, password)
SELECT * FROM (SELECT 'login', '{SHA}QL0AFWMIX8NRZTKeof9cXsvbvu8=') AS tmp
WHERE NOT EXISTS (
    SELECT login FROM users WHERE login='login' AND password='123'
) LIMIT 1;

INSERT INTO products (name, price)
SELECT * FROM (SELECT 'Mussels "Marine"', 590) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM products WHERE name = 'Mussels "Marine"' AND price = 590
) LIMIT 1;

INSERT INTO products (name, price)
SELECT * FROM (SELECT 'Mussels "Provencal"', 590) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM products WHERE name = 'Mussels "Provencal"' AND price = 590
) LIMIT 1;

INSERT INTO products (name, price)
SELECT * FROM (SELECT 'Eggplant with mozzarella', 330) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM products WHERE name = 'Eggplant with mozzarella' AND price = 330
) LIMIT 1;

INSERT INTO products (name, price)
SELECT * FROM (SELECT 'Giant prawns with fennel salad', 320) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM products WHERE name = 'Giant prawns with fennel salad' AND price = 320
) LIMIT 1;

INSERT INTO products (name, price)
SELECT * FROM (SELECT 'Escalope of foie gras with pear in red wine', 690) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM products WHERE name = 'Escalope of foie gras with pear in red wine' AND price = 690
) LIMIT 1;

INSERT INTO products (name, price)
SELECT * FROM (SELECT 'Saint Jacques with zucchini fondue', 690) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM products WHERE name = 'Saint Jacques with zucchini fondue' AND price = 690
) LIMIT 1;

INSERT INTO products (name, price)
SELECT * FROM (SELECT 'San Jacques with cauliflower puree', 750) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM products WHERE name = 'San Jacques with cauliflower puree' AND price = 750
) LIMIT 1;

INSERT INTO products (name, price)
SELECT * FROM (SELECT 'Grape snails "Escargot"', 390) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM products WHERE name = 'Grape snails "Escargot"' AND price = 390
) LIMIT 1;

INSERT INTO products (name, price)
SELECT * FROM (SELECT 'Mille-feuille with chicken fillet and crepe with bechamel sauce', 330) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM products WHERE name = 'Mille-feuille with chicken fillet and crepe with bechamel sauce' AND price = 330
) LIMIT 1;