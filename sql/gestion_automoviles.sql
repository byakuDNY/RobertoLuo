CREATE DATABASE gestion_automoviles;

USE gestion_automoviles;

-- Tabla de tipos de automóviles
CREATE TABLE tipos_automoviles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

-- Tabla de marcas de automóviles
CREATE TABLE marcas_automoviles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

-- Tabla de modelos de automóviles
CREATE TABLE modelos_automoviles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    marca_id INT,
    tipo_id INT,
    FOREIGN KEY (marca_id) REFERENCES marcas_automoviles(id),
    FOREIGN KEY (tipo_id) REFERENCES tipos_automoviles(id)
);

-- Tabla de propietarios
CREATE TABLE propietarios (
    id VARCHAR(11) PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100),
    telefono INT NOT NULL,
);

-- Tabla de automóviles
CREATE TABLE automoviles (
    placa VARCHAR(10) PRIMARY KEY,
    marca_id INT,
    modelo_id INT,
    tipo_id INT,
    anio YEAR NOT NULL,
    color VARCHAR(20),
    numero_motor VARCHAR(50) NOT NULL UNIQUE,
    numero_chasis VARCHAR(50) NOT NULL UNIQUE,
    propietarios_id VARCHAR(11),
    FOREIGN KEY (marca_id) REFERENCES marcas_automoviles(id),
    FOREIGN KEY (modelo_id) REFERENCES modelos_automoviles(id),
    FOREIGN KEY (tipo_id) REFERENCES tipos_automoviles(id)
    FOREIGN KEY (propietarios_id) REFERENCES propietarios(id)
);

-- Insertar datos de ejemplo (marcas de automóviles)
INSERT INTO marcas_automoviles (nombre) VALUES 
('Toyota'),
('Honda'),
('Ford'),
('Chevrolet'),
('BMW');

-- Insertar datos de ejemplo (tipos de automóviles)
INSERT INTO tipos_automoviles (nombre) VALUES 
('Sedán'),
('SUV'),
('Camioneta'),
('Motocicleta'),
('Camión');

-- Insertar datos de ejemplo (modelos de automóviles)
INSERT INTO modelos_automoviles (nombre, marca_id, tipo_id) VALUES 
('Corolla', 1, 1),
('RAV4', 1, 2),
('Civic', 2, 1),
('CR-V', 2, 2),
('F-150', 3, 3),
('Silverado', 4, 3),
('X5', 5, 2),
('R1200', 5, 4);
