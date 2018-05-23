CREATE DATABASE marcelo_aranda_prueba2;

USE marcelo_aranda_prueba2;



CREATE TABLE pregunta(
id INT AUTO_INCREMENT,
opcion_1 VARCHAR (50),
opcion_2 VARCHAR (50),
PRIMARY KEY(id)
);


CREATE TABLE resultado(
id INT AUTO_INCREMENT,
cantVotos_opcion_1 INT,
cantVotos_opcion_2 INT,
fk_pregunta INT,
FOREIGN KEY (fk_pregunta) REFERENCES pregunta (id),
PRIMARY KEY(id)
);

-- no hace falta poner la cantidad de votos de cada resultado, porque eso es igual a la suma de la cant de votos de ambas opciones (puede ser un select nomas)

SELECT * FROM pregunta;




DROP DATABASE marcelo_aranda_prueba2;