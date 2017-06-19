create table Usuario(id int not null Primary Key, email varchar(35) not null UNIQUE, password varchar(30) not null, tipo varchar(13) not null, nombre varchar(30) not null);
create table Sexo(id int not null Primary Key, sexo char(6) not null);
create table Etapa(id int not null Primary Key, nombre varchar(17) not null);
create table Color(id int not null Primary Key, color varchar(6) not null);
create table Categoria(id int not null Primary Key, nombre varchar(14) not null);
create table Imagen(id int not null Primary Key, url varchar(150) not null UNIQUE);
create table Proveedor(id int not null Primary Key, nombre varchar(70) not null UNIQUE, direccion varchar(250) not null, telefono varchar(15) not null, url_logo varchar(150) not null);

create table Producto(id int not null Primary Key, nombre varchar(50) not null, descripcion varchar(100) not null, id_sexo int not null, precio float not null, id_proveedor int not null,
FOREIGN KEY fk_producto_id_sexo(id_sexo) REFERENCES Sexo(id),
FOREIGN KEY fk_producto_id_proveedor(id_proveedor) REFERENCES Proveedor(id));

create table Producto_Imagen(id_producto int not null, id_imagen int not null, Primary Key(id_producto, id_imagen),
FOREIGN KEY fk_producto_imagen_id_producto(id_producto) REFERENCES Producto(id),
FOREIGN KEY fk_producto_imagen_id_imagen(id_imagen) REFERENCES Imagen(id));

create table Producto_Color(id_producto int not null, id_color int not null, Primary Key(id_producto, id_color),
FOREIGN KEY fk_producto_color_id_producto(id_producto) REFERENCES Producto(id),
FOREIGN KEY fk_producto_color_id_color(id_color) REFERENCES Color(id));

create table Producto_Etapa(id_producto int not null, id_etapa int not null, Primary Key(id_producto, id_etapa),
FOREIGN KEY fk_producto_etapa_id_producto(id_producto) REFERENCES Producto(id),
FOREIGN KEY fk_producto_etapa_id_etapa(id_etapa) REFERENCES Etapa(id));

create table Producto_Categoria(id_producto int not null, id_categoria int not null, Primary Key(id_producto, id_categoria),
FOREIGN KEY fk_producto_categoria_id_producto(id_producto) REFERENCES Producto(id),
FOREIGN KEY fk_producto_categoria_id_categoria(id_categoria) REFERENCES Categoria(id));


DELIMITER **
CREATE PROCEDURE sp_login(_email varchar(35), _password varchar(30))
BEGIN
	select id, email, tipo, nombre from Usuario where email = _email AND password = _password;
END **

DELIMITER **
CREATE PROCEDURE sp_usuario_insert(_email varchar(35), _password varchar(30), _tipo varchar(13), _nombre varchar(30))
BEGIN
	if not exists(select * from Usuario) Then
		insert into Usuario(id, email, password, tipo, nombre) values(1, _email, _password, _tipo, _nombre);
	elseif not exists(select * from Usuario where email = _email) Then
		select @id := count(*) from Usuario;
		insert into Usuario(id, email, password, tipo, nombre) values(@id+1, _email, _password, _tipo, _nombre);
    End If;
    select count(*) AS id from Usuario;
END **

DELIMITER **
CREATE PROCEDURE sp_imagen_insert(_url varchar(150))
BEGIN
	if not exists(select * from Imagen) Then
		insert into Imagen(id, url) values(1, _url);
	elseif not exists(select * from Imagen where url = _url) Then
		select @id := count(*) from Imagen;
		insert into Imagen(id, url) values(@id+1, _url);
    End If;
    select count(*) AS id from Imagen;
END **

DELIMITER **
CREATE PROCEDURE sp_provedor_insert(_nombre varchar(70), _direccion varchar(250), _telefono varchar(15), _url_logo varchar(150))
BEGIN
	if not exists(select * from Proveedor) Then
		insert into Proveedor(id, nombre, direccion, telefono, url_logo) values(1, _nombre, _direccion, _telefono, _url_logo);
	elseif not exists(select * from Proveedor where nombre = _nombre) Then
		select @id := count(*) from Proveedor;
		insert into Proveedor(id, nombre, direccion, telefono, url_logo) values(@id+1, _nombre, _direccion, _telefono, _url_logo);
    End If;
    select count(*) AS id from Proveedor;
END **


DELIMITER **
CREATE PROCEDURE sp_producto_insert(_nombre varchar(50), _descripcion varchar(100), _id_sexo int, _precio float, _id_proveedor int)
BEGIN
	if not exists(select * from Producto) Then
		insert into Producto(id, nombre, descripcion, id_sexo, precio, id_proveedor) values(1, _nombre, _descripcion, _id_sexo, _precio, _id_proveedor);
	else
		select @id := count(*) from Producto;
		insert into Producto(id, nombre, descripcion, id_sexo, precio, id_proveedor) values(@id+1, _nombre, _descripcion, _id_sexo, _precio, _id_proveedor);
    End If;
    select count(*) AS id from Producto;
END **

DELIMITER **
CREATE PROCEDURE sp_producto_imagen_insert(_id_producto int, _id_imagen int)
BEGIN
	insert into Producto_Imagen(id_producto, id_imagen) values(_id_producto, _id_imagen);
END **

DELIMITER **
CREATE PROCEDURE sp_producto_color_insert(_id_producto int, _id_color int)
BEGIN
	insert into Producto_Color(id_producto, id_color) values(_id_producto, _id_color);
END **

DELIMITER **
CREATE PROCEDURE sp_color_insert(_color varchar(6))
BEGIN
	select @id := count(*) from Color;
	insert into Color(id, color) values(@id+1, _color);
END **

DELIMITER **
CREATE PROCEDURE sp_producto_etapa_insert(_id_producto int, _id_etapa int)
BEGIN
	insert into Producto_Etapa(id_producto, id_etapa) values(_id_producto, _id_etapa);
END **

DELIMITER **
CREATE PROCEDURE sp_producto_categoria_insert(_id_producto int, _id_categoria int)
BEGIN
	insert into Producto_Categoria(id_producto, id_categoria) values(_id_producto, _id_categoria);
END **

#call sp_getProducts('".$sexo."', '".$etapa."', '".$pasatiempo."', '".$color."')
DELIMITER **
CREATE PROCEDURE sp_getProducts(_id_sexo int, _id_etapa int, _id_categoria int, _id_color int)
BEGIN
	select p.id, p.nombre, p.descripcion, p.precio, s.sexo, e.nombre as etapa, c.nombre as categoria,
		cl.color as color, i.url
    from Producto as p INNER JOIN Sexo as s INNER JOIN Etapa as e INNER JOIN Producto_Etapa as pe
		INNER JOIN Categoria as c INNER JOIN Producto_Categoria as pc INNER JOIN Color as cl 
        INNER JOIN Producto_Color as pcl INNER JOIN Producto_Imagen as pi INNER JOIN Imagen as i
    ON p.id_sexo = _id_sexo AND s.id = _id_sexo AND e.id = _id_etapa AND pe.id_etapa = _id_etapa AND
		c.id = _id_categoria AND pc.id_categoria = _id_categoria AND cl.id = _id_color AND 
        pcl.id_color = _id_color AND p.id = pi.id_producto AND i.id = pi.id_imagen;
END **
#Producto_Imagen(id_producto int not null, id_imagen)
call sp_getProducts(1, 1, 4, 8);
drop procedure sp_getProducts;

/*Tests*/
call sp_usuario_insert('nela@gmail.com', 'nela', 'administrador', 'Marianella Boza');
call sp_usuario_insert('adriansb3105@gmail.com', 'adrian', 'administrador', 'Adrian Serrano');
call sp_login('adriansb3105@gmail.com', 'adrian');

call sp_imagen_insert('https://res.cloudinary.com/adriansb3105/image/upload/v1497816194/hjyd1lqo2nbiqnownpzg.jpg');
call sp_imagen_insert('https://res.cloudinary.com/adriansb3105/image/upload/v1497816197/pyeotgwktml2zl3akfao.jpg');
call sp_imagen_insert('https://res.cloudinary.com/adriansb3105/image/upload/v1497816256/yetqaxfcd9xzlvejlvna.jpg');
call sp_imagen_insert('https://res.cloudinary.com/adriansb3105/image/upload/v1497816259/zbotn6p8mi6ku9veqthj.jpg');
call sp_imagen_insert('https://res.cloudinary.com/adriansb3105/image/upload/v1497816260/y7fwrx7us28cf6pbgt23.jpg');
call sp_imagen_insert('https://res.cloudinary.com/adriansb3105/image/upload/v1497816261/jtyuli1n3cqojmre6ycs.jpg');
call sp_imagen_insert('https://res.cloudinary.com/adriansb3105/image/upload/v1497816262/og19hpuke6bbpfuespgd.jpg');
call sp_imagen_insert('https://res.cloudinary.com/adriansb3105/image/upload/v1497816262/zdditw3etdmzujrbo5je.jpg');

call sp_provedor_insert('Abastecedor Doña Paca', '250 metros oeste de la gran puerta roja', '25986524', 'https://res.cloudinary.com/adriansb3105/image/upload/v1497824120/rgjryxp1u1g1qzym3xhq.png');
call sp_provedor_insert('Grupo Rey', '300 oeste y 150 sur de Muñoz y Nanne', '24563521', 'https://res.cloudinary.com/adriansb3105/image/upload/v1497824121/qytqxdu9odphswqtjroq.png');

call sp_producto_insert('Reloj casual de cuero', 'Excelente para hombres extrovertidos', 1, 3000, 2);

call sp_producto_imagen_insert(1, 1);

call sp_producto_color_insert(1, 1);
call sp_producto_color_insert(1, 8);

call sp_color_insert('marron');

call sp_producto_etapa_insert(1, 1);
call sp_producto_etapa_insert(1, 2);
call sp_producto_etapa_insert(1, 3);
call sp_producto_etapa_insert(1, 4);

call sp_producto_categoria_insert(1, 4);
#select p.nombre, c.nombre from Producto as p INNER JOIN Categoria as c INNER JOIN Producto_Categoria as pc ON p.id = pc.id_producto AND c.id = pc.id_categoria;

select * from Producto;
select * from Sexo;
select * from Proveedor;
select * from Imagen;
select * from Color;
select * from Etapa;
select * from Categoria;
select * from Producto_Imagen;
select * from Producto_Color;
select * from Producto_Etapa;
select * from Producto_Categoria;