-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS entelequia;

-- Usar la base de datos recién creada
USE entelequia;

-- Crear la tabla productos
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2),
    status ENUM('publicado', 'pausado') DEFAULT 'publicado',
    image VARCHAR(255)
);