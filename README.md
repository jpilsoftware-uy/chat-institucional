# Chat Institucional

_Chat institucional es una aplicacion que permite la comunicacion entre profesores y alumnos mediante consultas asincronicas o un chat online_

## Pre-Requisitos 📋

_Antes de empezar, vas a necesitar las siguientes cosas:_

```
Instalar Docker
```
```
Instalar PHP
```

# crear tablas
create table usuario( cedula int(8) primary key not null, nombre varchar (20) not null, primerApellido varchar (20) not null, segundoApellido varchar (20), usuario varchar(255) not null, contrasenia varchar(255) not null, tipoDeUsuario varchar(13) not null, estado varchar(10) not null, email varchar(30) not null );

create table grupo (idGrupo varchar (10) primary key, tipoDeOrientacion varchar (60) , foreign key (tipoDeOrientacion) references orientaciones(tipoDeOrientacion) ON DELETE CASCADE );

create table chat (idChat int auto_increment primary key, cedulaCreador int(8), materia varchar(60), grupo varchar(10), estadoDelChat varchar (10),FOREIGN KEY (grupo) REFERENCES grupo (idGrupo) ON DELETE CASCADE );

create table participantesDeChat (id int auto_increment primary key, idChat int, cedulaParticipante int(8) ,materia varchar(60), grupo varchar(10),FOREIGN KEY (idChat) REFERENCES chat (idChat) ON DELETE CASCADE );

create table mensaje (idMensaje int auto_increment primary key, idChatMensaje int, cedulaCreadorMensaje int(8), mensajeEnviado varchar (500), usuarioCreadorMensaje varchar(20), fecha timestamp, FOREIGN KEY (idChatMensaje) REFERENCES chat (idChat) ON DELETE CASCADE);


create table consulta (idConsulta int primary key auto_increment not null, mensajeConsulta varchar (255) not null, mensajeRespuesta varchar (255) , cedulaProfesor int (8) not null, cedulaAlumno int (8) not null, estadoConsulta varchar (15) not null , usuarioAlumno varchar(255), usuarioProfesor varchar(255));

create table orientaciones(tipoDeOrientacion varchar (60) primary key,materia1 varchar (60) , materia2 varchar (60) , materia3 varchar (60), materia4 varchar (60) , materia5 varchar (60) , materia6 varchar (60) , materia7 varchar (60) , materia8 varchar (60) , materia9 varchar (60) , materia10 varchar (60) , materia11 varchar (60) , materia12 varchar (60) , materia13 varchar (60) );



create table grupoDeUsuario (id int auto_increment primary key,cedula int(8), nombre varchar (20), primerApellido varchar (20), idGrupoDeUsuario varchar(10), tipoDeUsuario varchar(13) , FOREIGN KEY (cedula) REFERENCES usuario(cedula) ON DELETE CASCADE, FOREIGN KEY (idGrupoDeUsuario) REFERENCES grupo (idGrupo) ON DELETE CASCADE);

create table materiaDeUsuario (id int auto_increment primary key,cedula int(8), nombre varchar (20), primerApellido varchar (20), idGrupoDeUsuario varchar(10), materia varchar (60), tipoDeUsuario varchar(13) , FOREIGN KEY (cedula) REFERENCES usuario(cedula) ON DELETE CASCADE ,FOREIGN KEY (idGrupoDeUsuario) REFERENCES grupo (idGrupo) ON DELETE CASCADE );

# Creacion de usuarios
insert into orientaciones values ("1er anio - Bachillerato De Informatica","Programacion I","Sistemas Operativos I","Logica para informatica","Metodos discretos","Lab. de Soporte de Equipos Informaticos","Geometria","Lab. de Tecnologias Electricas Aplicadas","Matematica","Ingles","Ciencias Sociales - Historia","Biologia CTS","Analisis y produccion de Textos","Quimica");

insert into orientaciones values ("2er anio - Bachillerato De Informatica","Programacion II","Sistemas Operativos II","Disenio Web","Sistemas de Bases de Datos I","Lab. de Redes de Área Local","Geometria","Electronica aplicada a la Informatica","Matematica","Ingles","Ciencias Sociales - Economia","Analisis y produccion de Textos","Fisica","");

insert into orientaciones values ("3er Anio - Enfasis en Desarrollo y Soporte","Programacion III","Sistemas Operativos III","Gestion de Proyecto","Analisis y diseño de Aplicaciones","Redes de Datos y Seguridad","Sistemas de Bases de Datos II","Formacion Empresarial","Matematica","Ingles","Ciencias Sociales - Sociologia","Filosofia","","");

insert into orientaciones values ("3er Anio - Enfasis en Desarrollo Web","Programacion Web","Sistemas Operativos III","Gestion de Proyectos Web","Analisis y diseño de Aplicaciones","Disenio Web","Sistemas de Bases de Datos II","Formacion Empresarial","Matematica","Ingles","Ciencias Sociales - Sociologia","Filosofia","","");
