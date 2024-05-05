CREATE SCHEMA Plus45 CHARACTER SET Latin1 COLLATE latin1_spanish_ci;
USE Plus45;

CREATE TABLE Unidades(
	cod_unidad varchar(7) NOT NULL,
	nombre varchar(50),
	localizacion varchar(50),
	CONSTRAINT unidades_pk PRIMARY KEY (cod_unidad)
)
engine=innodb;

CREATE TABLE Empresas(
	cif varchar(9) NOT NULL,
	password varchar(60) NOT NULL,
	nombre varchar(50),
	tipo_sociedad varchar(25),
	CONSTRAINT empresas_pk PRIMARY KEY (cif)
)
engine=innodb;

CREATE TABLE Militares(
	dicodef varchar(7) NOT NULL,
	password varchar(60) NOT NULL,
	dni varchar(9) NOT NULL,
	tim varchar(12),
	cod_unidad varchar(7) NOT NULL,
	nombre varchar(50) NOT NULL,
	apellido1 varchar(50) NOT NULL,
	apellido2 varchar(50) NOT NULL,
	edad int NOT NULL,
	telefono int NOT NULL,
	direccion varchar(60),
	codigopostal int,
	email varchar(30) NOT NULL,
	nivel_estudios varchar(100),
	idiomas varchar(100),
	experiencia varchar(200),
	CONSTRAINT militares_pk PRIMARY KEY (dni),
	CONSTRAINT militares_fk FOREIGN KEY (cod_unidad) REFERENCES Unidades (cod_unidad)
	ON DELETE CASCADE ON UPDATE CASCADE
)
engine=innodb;

CREATE TABLE Puestos(
	cod_puesto varchar(4) NOT NULL,
	cif_empresa varchar(9) NOT NULL,
	dni_militar varchar(9), 
	ambito_profesional varchar(50) NOT NULL, 
	descripcion varchar(200),
	CONSTRAINT puestos_pk PRIMARY KEY (cod_puesto),
	CONSTRAINT puestos_fk_1 FOREIGN KEY (cif_empresa) REFERENCES Empresas (cif)
	ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT puestos_fk_2 FOREIGN KEY (dni_militar) REFERENCES Militares (dni)
	ON DELETE CASCADE ON UPDATE CASCADE
)
engine=innodb;

CREATE TABLE Solicitudes(
	cod_puesto varchar(4) NOT NULL,
	dni_militar varchar(9) NOT NULL,
	CONSTRAINT solicitudes_pk PRIMARY KEY (cod_puesto, dni_militar),
	CONSTRAINT solicitudes_fk_1 FOREIGN KEY (cod_puesto) REFERENCES Puestos (cod_puesto)
	ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT solicitudes_fk_2 FOREIGN KEY (dni_militar) REFERENCES Militares (dni)
	ON DELETE CASCADE ON UPDATE CASCADE
)
engine=innodb;

INSERT INTO Unidades (cod_unidad, nombre, localizacion) VALUES ('UCO-001','ACLOG', 'Calatayud, Zaragoza');
INSERT INTO Unidades (cod_unidad, nombre, localizacion) VALUES ('UCO-002','AGRUSAN 3', 'Zaragoza');
INSERT INTO Unidades (cod_unidad, nombre, localizacion) VALUES ('UCO-003','ARAGON 1', 'Zaragoza');
INSERT INTO Unidades (cod_unidad, nombre, localizacion) VALUES ('UCO-004','BHELMA III', 'Agoncillo, La Rioja');
INSERT INTO Unidades (cod_unidad, nombre, localizacion) VALUES ('UCO-005','BHELMA IV', 'Dos Hermanas, Sevilla');
INSERT INTO Unidades (cod_unidad, nombre, localizacion) VALUES ('UCO-006','CENAD San Gregorio', 'Zaragoza');
INSERT INTO Unidades (cod_unidad, nombre, localizacion) VALUES ('UCO-007','CGMAAA', 'Madrid');
INSERT INTO Unidades (cod_unidad, nombre, localizacion) VALUES ('UCO-008','RACTA 4', 'San Fernando, Cádiz');
INSERT INTO Unidades (cod_unidad, nombre, localizacion) VALUES ('UCO-009','RC ESPAÑA 11', 'Zaragoza');
INSERT INTO Unidades (cod_unidad, nombre, localizacion) VALUES ('UCO-010','REW 31', 'Madrid');
INSERT INTO Unidades (cod_unidad, nombre, localizacion) VALUES ('UCO-011','REW 32', 'Dos Hermanas, Sevilla');
INSERT INTO Unidades (cod_unidad, nombre, localizacion) VALUES ('UCO-012','RICZM AMÉRICA 66', 'Pamplona');
INSERT INTO Unidades (cod_unidad, nombre, localizacion) VALUES ('UCO-013','RING 1', 'Burgos');
INSERT INTO Unidades (cod_unidad, nombre, localizacion) VALUES ('UCO-014','RPEI 12', 'Monzalbarba, Zaragoza');
INSERT INTO Unidades (cod_unidad, nombre, localizacion) VALUES ('UCO-015','RT 21', 'Marines, Valencia');

INSERT INTO Militares (dicodef, password, dni, tim, cod_unidad, telefono, codigopostal, email) VALUES ('admin', '$2y$10$uoDm0Iby2iYkYU8RQrwQE.jI.VvolioTLZ5SOkuJ8268qc6ePaCK6', 'admin-DNI', 'admin-TIM', 'UCO-001', 876633175, 50300, 'rcabjai@et.mde.es');

