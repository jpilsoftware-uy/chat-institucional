no olvidar de usar .gitignore ignorando las siguientes cosas:

mysql
configuracion.php

agrego creacion de tablas Alumno, Profesor y Administrador:

create table Alumno(
idAlumno int primary key auto_increment,
usuarioAlumno varchar (20),
contraseniaAlumno varchar (255),
nombreAlumno varchar (20),
primerApellidoAlumno varchar (20),
segundoApellidoAlumno varchar (20),
cedulaAlumno int (8),
grupoAlumno varchar (5),
tipoDeUsuario varchar (13),
estadoAlumno varchar (9)
);

create table Docente(
idDocente int primary key auto_increment,
usuarioDocente varchar (20),
contraseniaDocente varchar (255),
nombreDocente varchar (20),
primerApellidoDocente varchar (20),
segundoApellidoDocente varchar (20),
cedulaDocente int (8),
grupoDocente varchar (5),
materiaDocente varchar (5),
tipoDeUsuario varchar (13),
estadoDocente varchar (9)
);

create table Administrador(
idAdministrador int primary key auto_increment,
usuarioAdministrador varchar (20),
contraseniaAdministrador varchar (255),
nombreAdministrador varchar (20),
primerApellidoAdministrador varchar (20),
segundoApellidoAdministrador varchar (20),
cedulaAdministrador int (8)
);

create table consulta (
idConsulta int primary key auto_increment,
mensajeConsulta varchar(255),
mensajeRespuesta varchar(255),
idAlumno int(8),
idDocente int(8),
estadoConsulta varchar(15),
usuarioDocente varchar(20),
usuarioAlumno varchar(20)
);

