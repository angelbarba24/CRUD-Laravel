# 🚗 Gestión de Coches - Proyecto Laravel 12

Este es un sistema CRUD (Crear, Leer, Actualizar, Borrar) de vehículos desarrollado con **Laravel 12**. Incluye autenticación segura de usuarios (Breeze), protección de rutas y una interfaz moderna con TailwindCSS.

## 📋 Características Principales

* **Gestión de Vehículos:** Alta, baja, modificación y listado de coches.
* **Seguridad:** Sistema completo de Login y Registro.
* **Privacidad:** Solo los usuarios registrados pueden acceder a la gestión de coches.
* **Interfaz:** Diseño responsive utilizando TailwindCSS y Alpine.js.
* **Feedback:** Mensajes de validación y confirmación de borrado.

---

## 🚀 Instalación y Puesta en Marcha

Sigue estos pasos para desplegar el proyecto en tu entorno local.

### 1. Requisitos Previos

* PHP 8.2 o superior
* Composer
* Node.js & NPM
* Servidor de Base de Datos (MySQL/MariaDB)

### 2. Instalación de Dependencias

Ejecuta los siguientes comandos en la terminal dentro de la carpeta del proyecto:

```bash
# Instalar dependencias de Backend (Laravel)
composer install

# Instalar dependencias de Frontend (Estilos)
npm install
```

### 3. Configuración del Entorno (.env)

Duplica el archivo de ejemplo:

```bash
cp .env.example .env
```

Genera la clave de aplicación:

```bash
php artisan key:generate
```

Edita el archivo `.env` y configura tu base de datos:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_datos
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Base de Datos

Ejecuta las migraciones para crear las tablas (`users`, `cars`, `sessions`, etc.):

```bash
php artisan migrate
```

---

## 🏃‍♂️ Cómo Ejecutar la Aplicación

Para que el proyecto funcione correctamente, necesitas mantener **dos terminales abiertas**:

**Terminal 1 (Servidor Web):**

```bash
php artisan serve
```

**Terminal 2 (Compilador de Assets/Estilos):**

```bash
npm run dev
```

Accede a la web en: [http://127.0.0.1:8000/cars](http://127.0.0.1:8000/cars)

---

## 🛠 Guía de Usuario (Datos de Prueba)

### Crear Usuario Administrador

Puedes registrarte desde la web o crear un usuario rápidamente usando la consola Tinker:

```bash
php artisan tinker
```

Copia y pega este script:

```php
\App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@test.com',
    'password' => bcrypt('12345678'),
    'email_verified_at' => now()
]);
exit;
```

**Usuario:** [admin@test.com](mailto:angel@test.com)
**Contraseña:** 12345678

---

## 📂 Notas para Desarrolladores

### Estructura de Rutas y Vistas

El proyecto sigue una convención estricta para evitar conflictos entre carpetas y URLs:

| Elemento          | Nombre   | Convención      | Ejemplo                                  |
| ----------------- | -------- | --------------- | ---------------------------------------- |
| Rutas (URL)       | Plural   | `cars`          | `route('cars.index')`                    |
| Vistas (Carpetas) | Singular | `car`           | `view('car.index')`                      |
| Controlador       | Singular | `CarController` | `app/Http/Controllers/CarController.php` |

---

## 🧯 Solución de Problemas Comunes

### 1. Error `View [cars.index] not found`

**Causa:** El controlador intenta cargar la vista usando plural (`cars.`) en lugar de singular (`car.`).

**Solución:** Cambiar a:

```php
return view('car.index', ...);
```

---

### 2. Error 500 al registrarse / loguearse

**Causa:** Base de datos desactualizada o falta de permisos en sesiones.

**Solución:**

```bash
php artisan migrate:fresh
php artisan cache:clear
```

---

### 3. El botón "Log Out" no funciona

**Causa:** Falta cargar Alpine.js.

**Solución:** Asegurar que este script está en el `<head>`:

```html
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
```
