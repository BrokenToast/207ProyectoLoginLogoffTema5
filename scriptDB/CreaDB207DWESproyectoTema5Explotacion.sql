create table if not exists T02_Usuario(
	CodUsuario VARCHAR(8) PRIMARY KEY,
    Password VARCHAR(256) not null,
    DescUsuario VARCHAR(255) not null,
    FechaHoraUltimaConexion int not null,
    NumConexiones int not null,
    Perfil ENUM('usuario','administrador') default 'usuario' not null,
    ImagenUsuario MEDIUMBLOB
)engine=innodb;
