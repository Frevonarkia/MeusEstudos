CREATE DATABASE IF NOT EXISTS biblioteca

USE biblioteca;

CREATE TABLE IF NOT EXISTS livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    GENERO VARCHAR(50) NULL,
    ano_publicacao INT NULL,
    quantidade INT NULL,

);

-- Insire livros como exemplo.
INSERT INTO livros (titulo, autor, genero, ano_publicacao, quantidade) VALUES
('O Senhor dos Anéis', 'J.R.R. Tolkien', 'Fantasia', 1954, 10),
('1984', 'George Orwell', 'Distopia', 1949, 5),
('O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 'Infantil', 1943, 8),
('A Revolução dos Bichos', 'George Orwell', 'Satira', 1945, 7),
('O Código Da Vinci', 'Dan Brown', 'Suspense', 2003, 12);