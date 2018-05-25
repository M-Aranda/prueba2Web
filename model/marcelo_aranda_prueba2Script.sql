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
cOp1 INT,
cOp2 INT,
cantVotos INT,
FOREIGN KEY (fk_pregunta) REFERENCES pregunta (id),
PRIMARY KEY(id)
);


CREATE TRIGGER crearEstadisticaParaPregunta AFTER INSERT ON pregunta
FOR EACH ROW
INSERT INTO estadistica VALUES (NULL,(SELECT MAX(id) FROM pregunta),0,0,0);





SELECT * FROM pregunta;
SELECT * FROM resultado;
SELECT * FROM estadistica;




DROP DATABASE marcelo_aranda_prueba2;
/*
Procedimiento que suma +1 a la cantidad de votos de op1 o 2 de cada pregunta dependiendo de cual se eligio (retorna mas de 2 resultados, no estoy seguro porque)

DELIMITER //
CREATE PROCEDURE actualizarEstadistica (fk_pre INT)
BEGIN
DECLARE op1Sele BOOLEAN;
DECLARE op2Sele BOOLEAN;

SET op1Sele=(SELECT op1Seleccionada FROM resultado WHERE fk_pregunta=fk_pre);
SET op1Sele=(SELECT op2Seleccionada FROM resultado WHERE fk_pregunta=fk_pre);

IF(op1Sele=TRUE) THEN
UPDATE estadistica SET cOp1=cOp1+1 WHERE fk_pregunta=fk_pre;
END IF;

IF(op2Sele=TRUE) THEN
UPDATE estadistica SET cOp2=cOp2+1 WHERE fk_pregunta=fk_pre;

END IF;


END//

DELIMITER ;
*/


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

SET fkPre=(SELECT fk_pregunta FROM resultado HAVING id=MAX(id));



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

