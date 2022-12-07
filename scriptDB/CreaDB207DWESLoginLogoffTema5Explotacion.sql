use dbs9174075;
create table if not exists T02_Usuario(
	CodUsuario VARCHAR(10) PRIMARY KEY,
    Password VARCHAR(256) not null,
    DescUsuario VARCHAR(255) not null,
    FechaHoraUltimaConexion int not null,
    NumConexiones int not null,
    Perfil ENUM('usuario','administrador') default 'usuario' not null,
    ImagenUsuario MEDIUMBLOB
)engine=innodb;
create table if not exists T02_Departamento(
    T02_CodDepartamento character(3) PRIMARY KEY,
    T02_DescDepartamento character(255)not null,
    T02_FechaDeCreacionDepartamento int not null,
    T02_VolumenDeNegocio float not null,
    T02_FechaBajaDepartamento int
)engine=innodb;
