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
op1Seleccionada BOOLEAN,
op2Seleccionada BOOLEAN,
fk_pregunta INT,
FOREIGN KEY (fk_pregunta) REFERENCES pregunta (id),
PRIMARY KEY(id)
);

-- Hasta aca funciona todo barbaro


CREATE TABLE estadistica(
id INT AUTO_INCREMENT,
fk_pregunta INT,
porcOp1 FLOAT,
porcOp2 FLOAT,
cantVotos INT,
FOREIGN KEY (fk_pregunta) REFERENCES pregunta (id),
PRIMARY KEY(id)
);


-- El trigger que crea estadisticas funciona
CREATE TRIGGER crearEstadisticaParaPregunta AFTER INSERT ON pregunta
FOR EACH ROW
INSERT INTO estadistica VALUES (NULL,(SELECT MAX(id) FROM pregunta),0,0,0);


-- Esto no funciona
DELIMITER //
CREATE PROCEDURE actualizarEstadistica()

BEGIN

DECLARE cOp1 INT;
DECLARE cOp2 INT;
DECLARE fkPre INT;
DECLARE vEnTotal INT;
DECLARE pOp1 FLOAT;
DECLARE pOp2 FLOAT;

SET fkPre=(SELECT fk_pregunta FROM resultado WHERE id=MAX(id));



UPDATE estadistica SET cantVotos=cantVotos+1 WHERE fk_pregunta=fkPre;

SET vEnTotal=(SELECT cantVotos FROM estadistica WHERE fk_pregunta=fkPre);

SET cOp1=((SELECT COUNT(*) FROM resultado WHERE op1Seleccionada=1 AND fk_pregunta=(SELECT fk_pregunta FROM resultado WHERE id=MAX(id))));
SET cOp2=((SELECT COUNT(*) FROM resultado WHERE op2Seleccionada=1 AND fk_pregunta=(SELECT fk_pregunta FROM resultado WHERE id=MAX(id))));

SET pOp1=(cOp1*vEnTotal)/100;
SET pOp2=(cOp2*vEnTotal)/100;

UPDATE estadistica SET porcOp1=pOp1, porcOp2=pOp2 WHERE fk_pregunta=fkPre;



END//
DELIMITER ;



CALL actualizarEstadistica;








SELECT * FROM pregunta;
SELECT * FROM resultado;
SELECT * FROM estadistica;





DROP DATABASE marcelo_aranda_prueba2;

/*
DELIMITER //
CREATE TRIGGER actualizarEstadistica AFTER INSERT ON resultado
FOR EACH ROW
BEGIN

DECLARE cOp1 INT;
DECLARE cOp2 INT;
DECLARE fkPre INT;
DECLARE vEnTotal INT;
DECLARE pOp1 FLOAT;
DECLARE pOp2 FLOAT;

SET fkPre=(SELECT fk_pregunta FROM resultado WHERE id=MAX(id));



UPDATE estadistica SET cantVotos=cantVotos+1 WHERE fk_pregunta=fkPre;

SET vEnTotal=(SELECT cantVotos FROM estadistica WHERE fk_pregunta=fkPre);

SET cOp1=((SELECT COUNT(*) FROM resultado WHERE op1Seleccionada=1 AND fk_pregunta=(SELECT fk_pregunta FROM resultado WHERE id=MAX(id))));
SET cOp2=((SELECT COUNT(*) FROM resultado WHERE op2Seleccionada=1 AND fk_pregunta=(SELECT fk_pregunta FROM resultado WHERE id=MAX(id))));

SET pOp1=(cOp1*vEnTotal)/100;
SET pOp2=(cOp2*vEnTotal)/100;

UPDATE estadistica SET porcOp1=pOp1, porcOp2=pOp2 WHERE fk_pregunta=fkPre;



END//
DELIMITER ;

*/