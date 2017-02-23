--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: carrito; Type: TABLE; Schema: public; Owner: tienda; Tablespace: 
--

CREATE TABLE carrito (
    id integer NOT NULL,
    id_product integer,
    id_user integer
);


ALTER TABLE carrito OWNER TO tienda;

--
-- Name: carrito_id_seq; Type: SEQUENCE; Schema: public; Owner: tienda
--

CREATE SEQUENCE carrito_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE carrito_id_seq OWNER TO tienda;

--
-- Name: carrito_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tienda
--

ALTER SEQUENCE carrito_id_seq OWNED BY carrito.id;


--
-- Name: descripcion_producto; Type: TABLE; Schema: public; Owner: tienda; Tablespace: 
--

CREATE TABLE descripcion_producto (
    id integer NOT NULL,
    code character varying(25) NOT NULL,
    name character varying(30) NOT NULL,
    description text NOT NULL,
    price double precision NOT NULL
);


ALTER TABLE descripcion_producto OWNER TO tienda;

--
-- Name: descripcion_producto_id_seq; Type: SEQUENCE; Schema: public; Owner: tienda
--

CREATE SEQUENCE descripcion_producto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE descripcion_producto_id_seq OWNER TO tienda;

--
-- Name: descripcion_producto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tienda
--

ALTER SEQUENCE descripcion_producto_id_seq OWNED BY descripcion_producto.id;


--
-- Name: products; Type: TABLE; Schema: public; Owner: tienda; Tablespace: 
--

CREATE TABLE products (
    id integer NOT NULL,
    producto integer NOT NULL
);


ALTER TABLE products OWNER TO tienda;

--
-- Name: venta_producto; Type: TABLE; Schema: public; Owner: tienda; Tablespace: 
--

CREATE TABLE venta_producto (
    id integer NOT NULL,
    id_product integer,
    id_venta integer
);


ALTER TABLE venta_producto OWNER TO tienda;

--
-- Name: inventario; Type: VIEW; Schema: public; Owner: tienda
--

CREATE VIEW inventario AS
 SELECT d.id,
    d.name,
    d.description,
    d.price,
    existencia.total
   FROM (( SELECT d_1.id,
            count(d_1.id) AS total
           FROM products p,
            descripcion_producto d_1
          WHERE (((p.producto = d_1.id) AND (NOT (p.id IN ( SELECT venta_producto.id_product
                   FROM venta_producto)))) AND (d_1.id = 2))
          GROUP BY d_1.id) existencia
     JOIN descripcion_producto d ON ((d.id = existencia.id)));


ALTER TABLE inventario OWNER TO tienda;

--
-- Name: products_id_seq; Type: SEQUENCE; Schema: public; Owner: tienda
--

CREATE SEQUENCE products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE products_id_seq OWNER TO tienda;

--
-- Name: products_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tienda
--

ALTER SEQUENCE products_id_seq OWNED BY products.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: tienda; Tablespace: 
--

CREATE TABLE users (
    id integer NOT NULL,
    name character varying(20) NOT NULL,
    apaterno character varying(20) NOT NULL,
    amaterno character varying(20) NOT NULL,
    num_tarjeta character varying(20),
    email character varying(30) NOT NULL,
    pass text NOT NULL,
    salt character varying(15),
    admin boolean DEFAULT false NOT NULL,
    username text NOT NULL
);


ALTER TABLE users OWNER TO tienda;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: tienda
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO tienda;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tienda
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: venta_producto_id_seq; Type: SEQUENCE; Schema: public; Owner: tienda
--

CREATE SEQUENCE venta_producto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE venta_producto_id_seq OWNER TO tienda;

--
-- Name: venta_producto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tienda
--

ALTER SEQUENCE venta_producto_id_seq OWNED BY venta_producto.id;


--
-- Name: ventas; Type: TABLE; Schema: public; Owner: tienda; Tablespace: 
--

CREATE TABLE ventas (
    id integer NOT NULL,
    id_user integer,
    date_time timestamp without time zone DEFAULT now()
);


ALTER TABLE ventas OWNER TO tienda;

--
-- Name: ventas_id_seq; Type: SEQUENCE; Schema: public; Owner: tienda
--

CREATE SEQUENCE ventas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ventas_id_seq OWNER TO tienda;

--
-- Name: ventas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tienda
--

ALTER SEQUENCE ventas_id_seq OWNED BY ventas.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY carrito ALTER COLUMN id SET DEFAULT nextval('carrito_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY descripcion_producto ALTER COLUMN id SET DEFAULT nextval('descripcion_producto_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY products ALTER COLUMN id SET DEFAULT nextval('products_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY venta_producto ALTER COLUMN id SET DEFAULT nextval('venta_producto_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY ventas ALTER COLUMN id SET DEFAULT nextval('ventas_id_seq'::regclass);


--
-- Name: carrito_pkey; Type: CONSTRAINT; Schema: public; Owner: tienda; Tablespace: 
--

ALTER TABLE ONLY carrito
    ADD CONSTRAINT carrito_pkey PRIMARY KEY (id);


--
-- Name: descripcion_producto_pkey; Type: CONSTRAINT; Schema: public; Owner: tienda; Tablespace: 
--

ALTER TABLE ONLY descripcion_producto
    ADD CONSTRAINT descripcion_producto_pkey PRIMARY KEY (id);


--
-- Name: products_pkey; Type: CONSTRAINT; Schema: public; Owner: tienda; Tablespace: 
--

ALTER TABLE ONLY products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: tienda; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: venta_producto_pkey; Type: CONSTRAINT; Schema: public; Owner: tienda; Tablespace: 
--

ALTER TABLE ONLY venta_producto
    ADD CONSTRAINT venta_producto_pkey PRIMARY KEY (id);


--
-- Name: ventas_pkey; Type: CONSTRAINT; Schema: public; Owner: tienda; Tablespace: 
--

ALTER TABLE ONLY ventas
    ADD CONSTRAINT ventas_pkey PRIMARY KEY (id);


--
-- Name: carrito_id_product_fkey; Type: FK CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY carrito
    ADD CONSTRAINT carrito_id_product_fkey FOREIGN KEY (id_product) REFERENCES products(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: carrito_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY carrito
    ADD CONSTRAINT carrito_id_user_fkey FOREIGN KEY (id_user) REFERENCES users(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: products_producto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY products
    ADD CONSTRAINT products_producto_fkey FOREIGN KEY (producto) REFERENCES descripcion_producto(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: venta_producto_id_product_fkey; Type: FK CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY venta_producto
    ADD CONSTRAINT venta_producto_id_product_fkey FOREIGN KEY (id_product) REFERENCES products(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: venta_producto_id_venta_fkey; Type: FK CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY venta_producto
    ADD CONSTRAINT venta_producto_id_venta_fkey FOREIGN KEY (id_venta) REFERENCES ventas(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: ventas_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: tienda
--

ALTER TABLE ONLY ventas
    ADD CONSTRAINT ventas_id_user_fkey FOREIGN KEY (id_user) REFERENCES users(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

