CREATE DATABASE db_escuela;

USE db_escuela;

CREATE TABLE tbl_alumnos(
    AlumnoID INT NOT NULL AUTO_INCREMENT,
    Nombre VARCHAR(50) NOT NULL,
    Apellido VARCHAR(50) NOT NULL,
    Genero INT(1) NOT NULL,
    FechaNacimiento DATE,
    Telefono VARCHAR(9),
    FechaRegistro DATE,
    Estado BOOLEAN,
    PRIMARY KEY(AlumnoID)
);

CREATE TABLE tbl_asignaturas(
    AsignaturaID INT NOT NULL AUTO_INCREMENT,
    Asignatura VARCHAR(25) NOT NULL,
    UV INT NOT NULL,
    PRIMARY KEY(AsignaturaID)
);

CREATE TABLE tbl_profesores(
    ProfesorID INT NOT NULL AUTO_INCREMENT,
    Nombre VARCHAR(50) NOT NULL,
    Apellido VARCHAR(50) NOT NULL,
    Dui VARCHAR(10) NOT NULL,
    Telefono VARCHAR(9) NOT NULL,
    Estado BOOLEAN,
    PRIMARY KEY(ProfesorID)
);

CREATE TABLE tbl_aulas(
    AulaID INT NOT NULL AUTO_INCREMENT,
    Aula VARCHAR(25) NOT NULL,
    Capacidad INT(3),
    PRIMARY KEY(AulaID)
);

CREATE TABLE tbl_horarios(
    HorarioID INT NOT NULL AUTO_INCREMENT,
    Dia INT(1),
    Hora_inicio TIME,
    Hora_fin TIME,
    PRIMARY KEY(HorarioID)
    
);

CREATE TABLE tbl_aulas_asignaturas(
     RelacionID INT NOT NULL PRIMARY KEY,
     AulaID INT,
     AsignaturaID INT,
     HorarioID INT,
     INDEX(AulaID),
     CONSTRAINT FK_AULA FOREIGN KEY(AulaID) REFERENCES tbl_aulas(AulaID),
     INDEX(AsignaturaID),
     CONSTRAINT FK_ASIGNATURA  FOREIGN KEY(AsignaturaID) REFERENCES tbl_asignaturas(AsignaturaID),
     INDEX(HorarioID),
     CONSTRAINT FK_HORARIO  FOREIGN KEY(HorarioID) REFERENCES tbl_horarios(HorarioID)
);




