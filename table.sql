CREATE TABLE informix.clientes  ( 
	cli_id       	SERIAL NOT NULL,
	cli_nombre   	VARCHAR(75),
	cli_apellido 	VARCHAR(75),
	cli_nit      	VARCHAR(9),
	cli_telefono 	VARCHAR(8),
	cli_situacion	INTEGER,
	PRIMARY KEY(cli_id)
	ENABLED
)

SELECT * FROM CLIENTES
UPDATE CLIENTES
SET CLI_SITUACION = 1
