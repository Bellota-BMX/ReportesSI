/* ---------------------------------------------------- */
/*  Generated by Enterprise Architect Version 12.1 		*/
/*  Created On : 05-dic.-2022 12:37:21 p. m. 				*/
/*  DBMS       : MySql 						*/
/* ---------------------------------------------------- */

SET FOREIGN_KEY_CHECKS=0 
;

/* Drop Tables */

DROP TABLE IF EXISTS `cabeceraRevision17Puntos` CASCADE
;

DROP TABLE IF EXISTS `categoria17P` CASCADE
;

DROP TABLE IF EXISTS `detalleRevision17Puntos` CASCADE
;

DROP TABLE IF EXISTS `puntoEvaluar17P` CASCADE
;

/* Create Tables */

CREATE TABLE `cabeceraRevision17Puntos`
(
	`idCabecera` INTEGER NOT NULL AUTO_INCREMENT,
	`fecha` DATE NOT NULL,
	`hEntrada` TIME NOT NULL,
	`hSalida` TIME NOT NULL,
	`pOrigen` VARCHAR(50) NOT NULL,
	`pProcedencia` VARCHAR(50) NOT NULL,
	`pDestino` VARCHAR(50) NOT NULL,
	`tipoMercancia` VARCHAR(50) NOT NULL,
	`empresaTransporte` VARCHAR(150) NOT NULL,
	CONSTRAINT `PK_cabeceraRevision17Puntos` PRIMARY KEY (`idCabecera` ASC)
)

;

CREATE TABLE `categoria17P`
(
	`idCategoria` INTEGER NOT NULL,
	`nombreCategoria` VARCHAR(150) NOT NULL,
	CONSTRAINT `PK_categoria17P` PRIMARY KEY (`idCategoria` ASC)
)

;

CREATE TABLE `detalleRevision17Puntos`
(
	`idDetalle` INTEGER NOT NULL AUTO_INCREMENT,
	`idCatalogo` INTEGER NOT NULL,
	`idCabecera` INTEGER NOT NULL,
	`cumple` INT NOT NULL,
	`observaciones` VARCHAR(250) 	 NULL,
	`img` VARCHAR(100) 	 NULL,
	CONSTRAINT `PK_detalleRevision17Puntos` PRIMARY KEY (`idDetalle` ASC)
)

;

CREATE TABLE `puntoEvaluar17P`
(
	`idCatalogo` INTEGER NOT NULL AUTO_INCREMENT,
	`nombrePunto` VARCHAR(100) NOT NULL,
	`numeroPunto` INTEGER NOT NULL,
	`idCategoria` INTEGER 	 NULL,
	CONSTRAINT `PK_puntoEvaluar17P` PRIMARY KEY (`idCatalogo` ASC)
)
COMMENT='Tabla que contiene los puntos del checklist para el proceso de inspeccion de 17 puntos'

;

/* Create Primary Keys, Indexes, Uniques, Checks */

ALTER TABLE `detalleRevision17Puntos` 
 ADD INDEX `IXFK_detalleRevision17Puntos_cabeceraRevision17Puntos` (`idCabecera` ASC)
;

ALTER TABLE `detalleRevision17Puntos` 
 ADD INDEX `IXFK_detalleRevision17Puntos_puntoEvaluar17P` (`idCatalogo` ASC)
;

ALTER TABLE `puntoEvaluar17P` 
 ADD INDEX `IXFK_puntoEvaluar17P_categoria17P` (`idCategoria` ASC)
;

/* Create Foreign Key Constraints */

ALTER TABLE `detalleRevision17Puntos` 
 ADD CONSTRAINT `FK_detalleRevision17Puntos_cabeceraRevision17Puntos`
	FOREIGN KEY (`idCabecera`) REFERENCES `cabeceraRevision17Puntos` (`idCabecera`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `detalleRevision17Puntos` 
 ADD CONSTRAINT `FK_detalleRevision17Puntos_puntoEvaluar17P`
	FOREIGN KEY (`idCatalogo`) REFERENCES `puntoEvaluar17P` (`idCatalogo`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `puntoEvaluar17P` 
 ADD CONSTRAINT `FK_puntoEvaluar17P_categoria17P`
	FOREIGN KEY (`idCategoria`) REFERENCES `categoria17P` (`idCategoria`) ON DELETE Restrict ON UPDATE Restrict
;

SET FOREIGN_KEY_CHECKS=1 
;

INSERT INTO `categoria17P` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'Observaciones del vehiculo'),
(2, 'Contenedor - Aspectos generales'),
(3, 'Contenedor - Piso'),
(4, 'Contenedor - Techo'),
(5, 'Contenedor - Costados');

INSERT INTO `puntoEvaluar17P` (`idCatalogo`, `nombrePunto`, `numeroPunto`, `idCategoria`) VALUES
(1 ,'Inspeccion de cabezotes y chasis',1, 1),
(2 ,'Compartimiento del motor s/n',2, 1),
(3 ,'Defensa delantera s/n',3, 1),
(4 ,'Llantas delantera izquierda s/n',4, 1),
(5 ,'Cabina lado del conductor s/n',5, 1),
(6 ,'Tanques de aire y compartimiento de batería s/n',6, 1),
(7 ,'Cuello de ganso o área de enganche del trailer s/n',7, 1),
(8 ,'Cajuelas de herramientas o baúl s/n',8, 1),
(9 ,'Tanques de combustible s/n',9, 1),
(10 ,'Estructura del chasis y Cajuelas s/n',10, 1),
(11 ,'Ejes y sistema de transmisión s/n.',11, 1),
(12 ,'Llantas s/n',12, 1),
(13 ,'Defensa trasera s/n',13, 1),
(14 ,'Cabina y camarote lado del ayudante s/n',14, 1),
(15 ,'Llantas delanteras derechas s/n',15, 1),
(16 ,'Longitud interna (alto, ancho, largo) y volumen difieren con estándar',16, 2),
(17 ,'Las características físicas de calidad del contenedor, difieren a las acordadas (Físicas, temperatura, etc.)',17, 2),
(18 ,'Los empaques muestran signos de forcejeo y-o manipulación indebida',18, 2),
(19 ,'Adhesivo o PARCHES nuevo en uniones de las láminas) (interna y externamente',19, 2),
(20 ,'Marcas o quemaduras recientes de soldadura',20, 2),
(21 ,'Pintura nueva en partes o parches',21, 2),
(22 ,'Ondulaciones internas y externas desiguales en tamaño, altura y cantidad',22, 2),
(23 ,'Postes, vigas y batiportes con sonido metálico como si tuvieran algo dentro',23, 2),
(24 ,' Superior e inferior interno con tapas.',24, 2),
(25 ,'Las barras de las puertas con cortes o sonido metálico como si tuvieran algo adentro',25, 2),
(26 ,'Remaches y tuercas de seguros de manijas muestran manipulación condición sub. Estándar',26, 2),
(27 ,'Áreas aledañas a remaches o bisagras con muestra de golpes, pintura nueva o forcejeo',27, 2),
(28 ,'Olores a pintura, soldadura, madera quemada, pegante, materiales de relleno, grasa, u otro inusual',28, 2),
(29 ,'Lamina inferior de protección de entrada diferente al estándar del contenedor ',29, 3),
(30 ,'Esta desnivelado con respecto al techo',30, 3),
(31 ,'Por encima del nivel de las barandillas laterales y-o batiportes delantero y trasero',31, 3),
(32 ,'Reparaciones nuevas no reportadas o sub. estándar',32, 3),
(33 ,'Piso exterior (por debajo) con barandillas laterales y-o vigas diferentes a formas de I, L, T,C Muestran cambios o diferencias, con sonido metálico disparejo',33, 3),
(34 ,'Olores a pintura, soldadura, madera quemada, pegante, materiales de relleno, grasa, u otro inusual',34, 3),
(35 ,'No se observan los soportes (vigas y barandillas laterales superiores) del contenedor',35, 4),
(36 ,'Orificios de ventilación no están desde 50 hasta 60 cm. de la viga esquinera y a 5 cm. de la barandilla lateral superior',36, 4),
(37 ,'Techo desnivelado, con referencia al piso ( a todo lo largo y ancho del contenedor)',37, 4),
(38 ,'Marcas o quemaduras recientes de soldadura,',38, 4),
(39 ,'Pintura nueva en partes o parches en el techo',39, 4),
(40 ,'Dentro de los dados de agarre del piso y el techo hay elementos sospechosos',40, 4),
(41 ,'Adhesivo o pegante nuevo en uniones de laminas, que no corresponden a reparaciones estándar',41, 5),
(42 ,'Marcas o quemaduras recientes de soldadura, que no corresponden a reparaciones estándar',42, 5),
(43 ,'Pintura nueva en partes o parches, que no corresponden a reparaciones estándar',43, 5),
(44 ,'Sonido metálico en ondulaciones y laminas disparejo (como si tuvieran algo dentro',44, 5),
(45 ,'Las ondulaciones internas difieren de las externas en cantidad',45, 5),
(46 ,'La medida física del grosor de las paredes difiere con el estándar',46, 5),
(47 ,' SELLOS y DISPOSITIVOS ADICIONALES DE SEGURIDAD ( LLENOS)',47, 5),
(48 ,'Las áreas alrededor del sello muestran golpes, pintura nueva, grasa, o apariencia diferente en la pintura',48, 5),
(49 ,'En el sello, los números y el área de marcado muestran signos de manipulación y-o cambio en su forma usual',49, 5),
(50 ,'No se puede leer o probar el sello con el dispositivo suministrado por el proveedor',50, 5),
(51 ,'Alguno de los sellos muestra intento o violación (puertas y otras áreas del contenedor)',51, 5),
(52 ,'En la areas inspeccionadas se obsevan plagas agicolas o roedores (animales, estiercol de animal, semillas, vegetales)',52, 5);




