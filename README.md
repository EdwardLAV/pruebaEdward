# PruebaEdward — Sistema Web + API REST con Yii2

Aplicación completa desarrollada con **Yii2**, que incluye:

- Frontend web con login, dashboard y módulos de *Usuarios* y *Categorías*.
- Backend API RESTful protegida con **JWT**, para consumo desde Postman u otras aplicaciones.
- CRUD completo para Usuarios y Categorías (crear, ver, actualizar, eliminar).
- Conexión a base de datos PostgreSQL.

---

## 🚀 Tecnologías utilizadas

- PHP 8.x  
- Framework **Yii2**
- PostgreSQL 
- Composer  
- Bootstrap 5 (para el diseño del frontend)
- Autenticación vía **JWT** para la API

---

# 📁 Estructura del proyecto

```
controllers/         → Controladores web (frontend)
controllers/api/     → Controladores REST (JSON + JWT)
models/              → Modelos ActiveRecord conectados a la BD
views/               → Vistas frontend (login, dashboard, CRUD)
config/              → Configuraciones del sistema (db, params, etc.)
web/                 → Carpeta pública del proyecto (index.php)
```

---

# ⚙️ Instalación del proyecto

### 1️⃣ Clonar el repositorio

```bash
git clone https://github.com/EdwardLAV/pruebaEdward.git
cd pruebaEdward
```

### 2️⃣ Instalar dependencias

```bash
composer install
```

### 3️⃣ Configurar la base de datos

Edita:

```
config/db.php
```

y coloca tus credenciales:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=TU_BD',
    'username' => 'TU_USUARIO',
    'password' => 'TU_PASSWORD',
    'charset' => 'utf8',
];
```

### 4️⃣ Configurar el secreto JWT

Archivo:

```
config/params.php
```

Asegúrate de colocar:

```php
'jwtSecret' => 'clave-super-secreta',
```

### 5️⃣ Importar la base de datos

Importa el archivo SQL que se incluye para crear las tablas:

- `usuarios`
- `categorias`

### 6️⃣ Levantar el servidor

```bash
php yii serve --port=8080
```

Aplicación disponible en:

```
http://localhost:8080/
```

---

# 🔑 Acceso al Sistema Web

1. Ir al login:

```
/site/login
```

2. Usar un usuario válido de tu base de datos:

| correo | contraseña |
|--------|------------|
| admin@admin.com | 123456 |

*(Ejemplo)*

---

# 🌐 API REST — Uso desde Postman

## 🔐 1. Login
**POST**  
```
/api/login
```

Body (JSON):

```json
{
  "correo": "admin@admin.com",
  "contrasena": "123456"
}
```

Respuesta:

```json
{
  "token": "JWT_GENERADO",
  "usuario": { ... }
}
```

# 📄 Entrega del Proyecto

Este repositorio contiene:

✔️ Frontend (carpeta **views/** y controladores web)  
✔️ Backend API REST (carpeta **controllers/api/**)  
✔️ Código fuente completo  
✔️ Configuración para conexión a base de datos  
✔️ Archivos composer.json y composer.lock  

# 🧑‍💻 Autor

**Edward Luis Acosta Valdez**  
Proyecto — 2025

