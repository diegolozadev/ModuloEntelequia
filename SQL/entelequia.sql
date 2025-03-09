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

-- Insertar algunos datos de ejemplo
INSERT INTO productos (name, description, price, status, image) VALUES
('Producto 1', 'Descripción del producto 1', 29.99, 'publicado', 'images/producto1.jpg'),
('Producto 2', 'Descripción del producto 2', 19.99, 'pausado', 'images/producto2.jpg');
