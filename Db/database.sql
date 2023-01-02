CREATE TABLE usuario(
	ID int (11) not null,
	nombre varchar(40) null,
	apellido varchar(40) null,
	telefono varchar(10) null,
	email varchar(30) UNIQUE,
	contraseña varchar(50) null,
	CONSTRAINT pk_usuario
	PRIMARY KEY (ID)
)


CREATE TABLE producto(
	codigo int (11) not null AUTO_INCREMENT,
	ID int (11) not null,
	titulo varchar(50) null,
	descrip varchar(100) null,
	imagen varchar(200) null,
	cantidad decimal(10,0) null,
	fecha timestamp null,
	CONSTRAINT pk_producto
	PRIMARY KEY (codigo),
	CONSTRAINT fk_producto
	FOREIGN KEY (ID) REFERENCES usuario (ID)	
)

	
CREATE TABLE tipou(
	ID int (11) not null,
	tipo varchar(20) null,
	CONSTRAINT pk_usuario
	PRIMARY KEY (ID)
)

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `pass1` varchar(50) NOT NULL,
  `pass2` varchar(50) NOT NULL,
  `pass3` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;