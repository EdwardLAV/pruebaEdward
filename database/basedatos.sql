--
-- PostgreSQL database dump
--

\restrict Qe0nkzwr0iskNjFNrNgd3utUJ9SuXXYTlWXmeaEgkq9FrZMPmGI0fHtH8iF5Cfd

-- Dumped from database version 18.1
-- Dumped by pg_dump version 18.1

-- Started on 2025-12-09 00:01:27

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 5029 (class 1262 OID 16388)
-- Name: pruebaEdward_db; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE "pruebaEdward_db" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Peru.utf8';


ALTER DATABASE "pruebaEdward_db" OWNER TO postgres;

\unrestrict Qe0nkzwr0iskNjFNrNgd3utUJ9SuXXYTlWXmeaEgkq9FrZMPmGI0fHtH8iF5Cfd
\connect "pruebaEdward_db"
\restrict Qe0nkzwr0iskNjFNrNgd3utUJ9SuXXYTlWXmeaEgkq9FrZMPmGI0fHtH8iF5Cfd

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 2 (class 3079 OID 16427)
-- Name: pgcrypto; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pgcrypto WITH SCHEMA public;


--
-- TOC entry 5030 (class 0 OID 0)
-- Dependencies: 2
-- Name: EXTENSION pgcrypto; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pgcrypto IS 'cryptographic functions';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 222 (class 1259 OID 16396)
-- Name: categorias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categorias (
    id integer NOT NULL,
    nombre character varying(100) NOT NULL,
    estado boolean DEFAULT true,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.categorias OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 16395)
-- Name: categorias_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categorias_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.categorias_id_seq OWNER TO postgres;

--
-- TOC entry 5031 (class 0 OID 0)
-- Dependencies: 221
-- Name: categorias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categorias_id_seq OWNED BY public.categorias.id;


--
-- TOC entry 220 (class 1259 OID 16389)
-- Name: migration; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migration (
    version character varying(180) NOT NULL,
    apply_time integer
);


ALTER TABLE public.migration OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 16408)
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuarios (
    id integer NOT NULL,
    nombre character varying(100) NOT NULL,
    apellido character varying(100) NOT NULL,
    edad integer NOT NULL,
    correo character varying(150) NOT NULL,
    contrasena character varying(255) NOT NULL,
    estado boolean DEFAULT true,
    created_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 16407)
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.usuarios_id_seq OWNER TO postgres;

--
-- TOC entry 5032 (class 0 OID 0)
-- Dependencies: 223
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;


--
-- TOC entry 4856 (class 2604 OID 16399)
-- Name: categorias id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorias ALTER COLUMN id SET DEFAULT nextval('public.categorias_id_seq'::regclass);


--
-- TOC entry 4860 (class 2604 OID 16411)
-- Name: usuarios id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);


--
-- TOC entry 5021 (class 0 OID 16396)
-- Dependencies: 222
-- Data for Name: categorias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categorias (id, nombre, estado, created_at, updated_at) FROM stdin;
1	Tecnología	t	2025-12-08 00:59:22	2025-12-08 00:59:22
2	Electrónica	t	2025-12-08 19:58:41	2025-12-08 19:58:41
6	Arte	t	2025-12-08 21:29:36	2025-12-08 21:29:36
8	Electrónica Digital	t	2025-12-08 22:51:29	2025-12-08 22:56:16
\.


--
-- TOC entry 5019 (class 0 OID 16389)
-- Dependencies: 220
-- Data for Name: migration; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migration (version, apply_time) FROM stdin;
m000000_000000_base	1765152133
m251208_001851_create_table_categorias	1765153682
m251208_002347_create_table_usuarios	1765153682
\.


--
-- TOC entry 5023 (class 0 OID 16408)
-- Dependencies: 224
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuarios (id, nombre, apellido, edad, correo, contrasena, estado, created_at, updated_at) FROM stdin;
9	Edward	Luis	22	edwardlav@gmail.com	8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92	t	2025-12-08 22:50:47	2025-12-08 22:53:40
12	asdas	sada	5	asdasda@gmail.com	7c9e7c1494b2684ab7c19d6aff737e460fa9e98d5a234da1310c97ddf5691834	t	2025-12-09 03:47:01	2025-12-09 03:47:01
13	asdaa	assadas	11	hola@gmail.com	e865f1ce33afd78b0c734312ba0958801ea8daf12cecaa6efad7086adeb46189	t	2025-12-09 04:06:12	2025-12-09 04:06:12
8	test_ejemplo	test2	28	hola@test.com	481273f7514b9c99bed0b4f3671c06230bf9f3a535fae6fda5042710f6c24600	t	2025-12-08 22:45:17	2025-12-09 04:11:26
15	asasdsad	asdsadas	6	sasdsaa@gmail.com	b460b1982188f11d175f60ed670027e1afdd16558919fe47023ecd38329e0b7f	t	2025-12-09 04:25:06	2025-12-09 04:25:06
\.


--
-- TOC entry 5033 (class 0 OID 0)
-- Dependencies: 221
-- Name: categorias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categorias_id_seq', 12, true);


--
-- TOC entry 5034 (class 0 OID 0)
-- Dependencies: 223
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuarios_id_seq', 15, true);


--
-- TOC entry 4867 (class 2606 OID 16406)
-- Name: categorias categorias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (id);


--
-- TOC entry 4865 (class 2606 OID 16394)
-- Name: migration migration_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migration
    ADD CONSTRAINT migration_pkey PRIMARY KEY (version);


--
-- TOC entry 4869 (class 2606 OID 16426)
-- Name: usuarios usuarios_correo_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_correo_key UNIQUE (correo);


--
-- TOC entry 4871 (class 2606 OID 16424)
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


-- Completed on 2025-12-09 00:01:28

--
-- PostgreSQL database dump complete
--

\unrestrict Qe0nkzwr0iskNjFNrNgd3utUJ9SuXXYTlWXmeaEgkq9FrZMPmGI0fHtH8iF5Cfd

