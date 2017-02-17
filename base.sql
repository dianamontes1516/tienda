--begin;
create database tienda;
\c tienda
create table if not exists usuarios(
       id serial primary key
       , nombre text
       , apellidoM text
       , apellidoP text
       , tarjeta text
       , pass text
       , salt text
);

create table if not exists productos(
       id serial primary key
       , nombre text
       , descripcion text
       , costo float
       -- , existencia int CHECK(existencia >=0)
);

create table if not exists carrito(
       id serial primary key
       , usuario_id  int references usuarios(id)
       , producto_id  int references productos(id)       
);

create table if not exists ventas(
       id serial primary key
       , usuario_id  int references usuarios(id)
       , producto_id  int references productos(id)
);

--rollback;

