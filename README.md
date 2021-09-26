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
