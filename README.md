# chat-institucional

# crear tablas

create table chat (idChat int auto_increment primary key, 
ciCreador int(8),
materia varchar(30),
grupo varchar(6),
estadoDelChat varchar (10)
);

create table usuario(
cedula int(8) primary key not null,
nombre varchar (20) not null,
primerApellido  varchar (20) not null, 
segundoApellido varchar (20), 
usuario varchar(255) not null, 
contrasenia varchar(255) not null, 
tipoDeUsuario varchar(13) not null, 
estado varchar(10) not null
);

create table consulta (idConsulta int primary key auto_increment not null,
mensajeConsulta varchar (255) not null,
mensajeRespuesta varchar (255) , 
cedulaProfesor int (8) not null, 
cedulaAlumno int (8) not null, 
estadoConsulta varchar (15) not null
);

create table mensaje (idMensaje int auto_increment primary key, 
idChatMensaje int,
ciCreadorMensaje int(8),
mensajeEnviado varchar (500),
usuarioCreadorMensaje varchar(20),
fecha timestamp,
FOREIGN KEY (idChatMensaje) REFERENCES chat (idChat)
);

create table orientaciones(tipoDeOrientacion varchar (60) primary key,materia1 varchar (60)  , materia2 varchar (60)  , materia3 varchar (60), materia4 varchar (60) , materia5 varchar (60) , materia6 varchar (60) , materia7 varchar (60) , materia8 varchar (60) , materia9 varchar (60) , materia10 varchar (60) , materia11 varchar (60) , materia12 varchar (60) , materia13 varchar (60) );

create table grupo (idGrupo varchar (10) primary key,  tipoDeOrientacion varchar (20) , foreign key (tipoDeOrientacion) references orientaciones(tipoDeOrientacion) );

create table grupoQueCursaAlumno (id int primary key auto_increment , cedula int(8), nombre varchar (20), primerApellido varchar (20),  idGrupoDeAlumno varchar(10), FOREIGN KEY (cedula) REFERENCES usuario(cedula),  FOREIGN KEY (idGrupoDeAlumno) REFERENCES grupo (idGrupo) ); 

create table grupoQueDictaProfesor (id int primary key auto_increment ,cedula int(8), nombre varchar (20), primerApellido varchar (20),  idGrupoDeProfesor varchar(10), FOREIGN KEY (cedula) REFERENCES usuario(cedula),  FOREIGN KEY (idGrupoDeProfesor) REFERENCES grupo (idGrupo) );






# Crear Usuarios

INSERT INTO usuario (cedula, nombre, primerApellido, segundoApellido, usuario, contrasenia, tipoDeUsuario, estado) VALUES (11111111, 'admin', 'admin', 'admin', 'admin', '$2y$10$3jAdYrk4ZMDlRRU1XUa8nucyWfMGBbdM64QhGqvu6khubKUgdu2Pq',
'Administrador', 'aprobado');

INSERT INTO usuario (cedula, nombre, primerApellido, segundoApellido, usuario, contrasenia, tipoDeUsuario, estado) VALUES (52399205, 'Pedro', 'Oyarzun', 'Fagundez', 'pedrooyarzun', '$2y$10$h2ZWXH.Av9OtEVO7FNpVVepR2hk2eOshFGDgJVnPvSLxvo6p1OpSC',
'Profesor', 'aprobado');

INSERT INTO usuario (cedula, nombre, primerApellido, segundoApellido, usuario, contrasenia, tipoDeUsuario, estado) VALUES (36792178, 'Ivan', 'Braida', 'Sanchez', 'ivanbraida', '$2y$10$w7z0eMrQuG3ryAHe349ZAeox314orLDfEesL8yz790VdzSJFDgDPe',
'Alumno', 'aprobado');

# Crear Orientaciones
insert into orientaciones values ("1er anio - Bachillerato De Informatica","Programacion I","Sistemas Operativos I","Logica para informatica","Metodos discretos","Lab. de Soporte de Equipos Informaticos","Geometria","Lab. de Tecnologias Electricas Aplicadas","Matematica","Ingles","Ciencias Sociales - Historia","Biologia CTS","Analisis y produccion de Textos","Quimica");

insert into orientaciones values ("2er anio - Bachillerato De Informatica","Programacion II","Sistemas Operativos II","Disenio Web","Sistemas de Bases de Datos I","Lab. de Redes de Área Local","Geometria","Electronica aplicada a la Informatica","Matematica","Ingles","Ciencias Sociales - Economia","Analisis y produccion de Textos","Fisica","");

insert into orientaciones values ("3er Anio - Enfasis en Desarrollo y Soporte","Programacion III","Sistemas Operativos III","Gestion de Proyecto","Analisis y diseño de Aplicaciones","Redes de Datos y Seguridad","Sistemas de Bases de Datos II","Formacion Empresarial","Matematica","Ingles","Ciencias Sociales - Sociologia","Filosofia","","");

insert into orientaciones values ("3er Anio - Enfasis en Desarrollo Web","Programacion Web","Sistemas Operativos III","Gestion de Proyectos Web","Analisis y diseño de Aplicaciones","Disenio Web","Sistemas de Bases de Datos II","Formacion Empresarial","Matematica","Ingles","Ciencias Sociales - Sociologia","Filosofia","","");
