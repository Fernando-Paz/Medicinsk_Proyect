DROP DATABASE IF EXISTS MedicinskF;
CREATE DATABASE MedicinskF;
use MedicinskF;

CREATE TABLE Persona (
   CURP VARCHAR(25) PRIMARY KEY NOT NULL,
   NOMBRES VARCHAR(100) NOT NULL,
   APELLIDOS VARCHAR(100) NOT NULL,
   EMAIL VARCHAR(100) NOT NULL);
   
CREATE TABLE Usuario (
	ID_USR INT(4) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    CURP VARCHAR(25) NOT NULL,
    PASS VARCHAR(30) NOT NULL,
    NIVEL INT(1) NOT NULL,
    
    FOREIGN KEY (CURP)
	REFERENCES Persona (CURP)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
    
CREATE TABLE Administrador (
	ID_ADMIN INT(1) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    CURP VARCHAR(25) NOT NULL,
    
    FOREIGN KEY (CURP)
    REFERENCES Usuario (CURP)
    ON DELETE CASCADE
    ON UPDATE CASCADE);

CREATE TABLE Medico (
	ID_MEDICO INT(3) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    CURP VARCHAR(25) NOT NULL,
    CEDULA VARCHAR(50) NOT NULL,
    ESPECALIDAD VARCHAR(50) NOT NULL,
    HORA_I INT(4) NOT NULL,
    HORA_F INT(4) NOT NULL,
    HORA_C INT(4) NOT NULL,
    
	FOREIGN KEY (CURP)
    REFERENCES Usuario (CURP)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
    
CREATE TABLE PrePaciente (
	IP_PPACIENTE INT(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    CURP VARCHAR(25) NOT NULL,
    TELEFONO INT(10) NOT NULL,
    DIRECCION VARCHAR(50) NOT NULL,
    
    FOREIGN KEY (CURP)
    REFERENCES Persona (CURP)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
    
CREATE TABLE Paciente (
	IP_PACIENTE INT(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    CURP VARCHAR(25) NOT NULL,
    TELEFONO INT(10) NOT NULL,
    DIRECCION VARCHAR(50) NOT NULL,
    
    FOREIGN KEY (CURP)
    REFERENCES Usuario (CURP)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
    
CREATE TABLE Expediente (
	ID_EXPED INT(100) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    CURP_MED VARCHAR(25) NOT NULL,
    CURP_PAT VARCHAR(25) NOT NULL,
    FECHA DATE NOT NULL, 
    ARCHIVO MEDIUMBLOB NOT NULL,
    
    FOREIGN KEY (CURP_MED)
    REFERENCES Medico (CURP)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    
	FOREIGN KEY (CURP_PAT)
    REFERENCES Paciente (CURP)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
    
CREATE TABLE Citas (
	ID_CITA INT(100) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    CURP_MED VARCHAR(25) NOT NULL,
    CURP_PAT VARCHAR(25) NOT NULL,
    FECHA_S DATE NOT NULL,
    FECHA_C VARCHAR(50) NOT NULL,
    HORA INT(4) NOT NULL,
    
	FOREIGN KEY (CURP_MED)
    REFERENCES Medico (CURP)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    
	FOREIGN KEY (CURP_PAT)
    REFERENCES Paciente (CURP)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
    
CREATE TABLE HistorialC (
	ID_HC INT(100) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    ID_C INT(100) NOT NULL,
    CURP_MED VARCHAR(25) NOT NULL,
    CURP_PAT VARCHAR(25) NOT NULL,
    FECHA_S DATE NOT NULL,
    FECHA_C VARCHAR(50) NOT NULL,
    HORA INT(4) NOT NULL,
    ESTADO INT(1) NOT NULL);

-- PROCEDIMIENTOS USUARIO
DELIMITER //
CREATE PROCEDURE new_padmin (curpx varchar(25), nombrex varchar(100), apellidox varchar(100), emailx varchar(100))
BEGIN
	insert into Persona values(curpx, nombrex, apellidox, emailx);
	insert into Usuario values(null, curpx, 'x', 1);
    insert into Administrador values(null, curpx);
    
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE elim_per(curpx varchar(25))
BEGIN
	delete from Persona where CURP=curpx;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE datos_admin(curpx varchar(25))
BEGIN
	select PASS from Usuario where CURP=curpx;
END //
DELIMITER ;


-- PROCEDIMIENTOS MEDICO
DELIMITER //
CREATE PROCEDURE new_med (curpx varchar(25), nombrex varchar(100), apellidox varchar(100), emailx varchar(100), cedx varchar(50), espex varchar(50), hix int(4), hfx int(4), hcx int(4))
BEGIN
	insert into Persona values(curpx, nombrex, apellidox, emailx);
    insert into Usuario values(null, curpx, 'x', 2);
    insert into Medico values(null, curpx, cedx, espex, hix, hfx, hcx);
END //
DELIMITER ;

-- PROCEDIMIENTOS PACIENTE
DELIMITER //
CREATE PROCEDURE new_paci(curpx varchar(25), nombrex varchar(100), apellidox varchar(100), emailx varchar(100), telx int(10), direcx varchar(50))
BEGIN
	insert into Persona values(curpx, nombrex, apellidox, emailx);
    insert into PrePaciente values(null, curpx, telx, direcx);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE paci_alt(curpx varchar(25))
BEGIN
	insert into Usuario values(null, curpx, 'x', 3);  

	SET @VAR1 = (SELECT TELEFONO from PrePaciente where CURP = curpx);
	SET @VAR2 = (SELECT DIRECCION from PrePaciente where CURP = curpx);  
    
	insert into Paciente values(null, curpx, @VAR1, @VAR2);
    delete from PrePaciente where CURP=curpx;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE mod_usr(curpx varchar(25), pasx varchar(30))
BEGIN
	UPDATE Usuario SET PASS=pasx WHERE CURP=curpx;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE paci_epe(curpx varchar(25))
BEGIN
	delete from PrePaciente where CURP=curpx;
END //
DELIMITER ;


-- PROCEDIMIENTOS EXPEDIENTES
DELIMITER //
CREATE PROCEDURE sub_exp(curpm varchar(25), curpp varchar(25), fechax date, archivox MEDIUMBLOB)
BEGIN
	insert into Expediente values(null, curpm, curpp, fechax, archivox);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE con_exp(curpx varchar(25))
BEGIN
	select * from Expediente where CURP_PAT=curpx;
END //
DELIMITER ;


-- PROCEDIMIENTOS CITAS
DELIMITER //
CREATE PROCEDURE do_cit(curpm varchar(25), curpp varchar(25), fechax varchar(50), hora int(4))
BEGIN
	insert into Citas values(null, curpm, curpp, NOW(), fechax, hora);
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE ht_cit(idc int(100), edox int(1))
BEGIN
	SET @VAR1 = (SELECT ID_CITA from Citas where ID_CITA = idc);
	SET @VAR2 = (SELECT CURP_MED from Citas where ID_CITA = idc); 
	SET @VAR3 = (SELECT CURP_PAT from Citas where ID_CITA = idc);
	SET @VAR4 = (SELECT FECHA_S from Citas where ID_CITA = idc);
	SET @VAR5 = (SELECT FECHA_C from Citas where ID_CITA = idc);
	SET @VAR6 = (SELECT HORA from Citas where ID_CITA = idc);
    
    
	insert into HistorialC values(null, @VAR1, @VAR2, @VAR3, @VAR4, @VAR5, @VAR6, edox);
    delete from Citas where ID_CITA=idc;
END //
DELIMITER ;


CALL new_padmin('PAGF990399HMCZMR00', 'Fer', 'Paz', 'fdpg290399@gmail.com');
CALL mod_usr('PAGF990399HMCZMR00','123');

CALL new_med('LOAN990304MDFPGD00','Nadia','Aguilar','nbla.escom@gmail.com','1234567890','dermatología',7000,1500,1200);
CALL mod_usr('LOAN990304MDFPGD00', '456');

CALL new_paci('LOAE990304HDFPGD00', 'Enrique', 'Lopez', 'henry.escom@gmail.com', 554935904, 'San Pedro de los Pinos, Col. Benito Juarez');
CALL paci_alt('LOAE990304HDFPGD00');
CALL mod_usr('LOAE990304HDFPGD00', '789');

call do_cit('LOAN990304MDFPGD00', 'LOAE990304HDFPGD00', '17-06-2020', '1200');

select * from Persona;
select * from Paciente;
select * from Usuario;
select * from PrePaciente;
select * from Medico;
select * from Administrador;
select * from Citas; 
select * from Expediente;