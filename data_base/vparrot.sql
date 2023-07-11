-- DB creation

CREATE DATABASE vparrot;
-- DB select 
-- USE vparrot

-- CREATE TABLE users;

-- create users table 
CREATE TABLE users (
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    first_name VARCHAR(50) NOT NULL, 
    last_name VARCHAR(100) NOT NULL, 
    email VARCHAR(100) NOT NULL, 
    password CHAR(64) NOT NULL, 
--     role VARCHAR(10) NOT NULL
-- );

-- create admin
INSERT INTO users (first_name, last_name, email, password, role) VALUES ('Vincent', 'Parrot', LOWER(CONCAT(first_name, '.', last_name, '@example.com'), 'admin', 'admin'));


-- root
-- root
-- 3306

-- root
-- mdp
-- 3306