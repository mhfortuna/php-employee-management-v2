
CREATE DATABASE IF NOT EXISTS employee_managment;
USE employee_managment;

CREATE TABLE IF NOT EXISTS employee(
    id INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(40) NOT NULL,
    last_name VARCHAR(40),
    email VARCHAR(60) NOT NULL,
    age INT NOT NULL,
    street_number VARCHAR(6) NOT NULL,
    city VARCHAR(25) NOT NULL,
    state VARCHAR(3) NOT NULL,
    postal_code VARCHAR(6) NOT NULL,
    phone_number VARCHAR(12) NOT NULL,
    gender ENUM('man', 'woman', 'other'),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS user(
    id INT AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(60) NOT NULL,
    PRIMARY KEY (id)
    
);

INSERT INTO employee (id, first_name, last_name, email, gender, city, street_number, state, age, postal_code, phone_number) 
VALUES 
    (1, "Rack", "Lei", "jackon@network.com", "man", "San Jone", "126", "CA", 24, "394221", "7383627627"),
    (2, "John", "Doe", "jhondoe@foo.com", "man", "New York", "89", "WA", 34, "09889", "1283645645"),
    (3, "Leila", "Mills", "mills@leila.com", "woman", "San Diego", "55", "CA", 29, "098765", "9983632461"),
    (4, "Richard", "Desmond", "dismond@foo.com", "man", "Salt lake city", "90", "UT", 30, "457320", "90876987654"),
    (5, "Susan", "Smith", "susanmith@baz.com", "woman", "Louisville", "43", "KNT", 28, "445321", "224355488976");

INSERT INTO user (name, password, email) VALUES ("admin", "$2y$10$nuh1LEwFt7Q2/wz9/CmTJO91stTBS4cRjiJYBY3sVCARnllI.wzBC", "admin@assemblerschool.com");