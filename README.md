<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400">
  </a>
</p>

<p align="center">
  <a href="https://travis-ci.org/laravel/framework">
    <img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

---

# Sistema de Gestión del Área del Diaconado Permanente

Este proyecto es una aplicación web diseñada para gestionar la información del Área del Diaconado Permanente de la iglesia, incluyendo detalles sobre los diáconos, sus roles y la administración de parroquias.

## Características

- Gestión de diáconos y roles pastorales.
- Administración de parroquias y eventos.
- Módulos para consulta y generación de reportes.
- Relación de roles muchos a muchos para flexibilidad en la asignación de funciones.

---

## Manual de Instalación

### Introducción

Este manual tiene como objetivo guiar paso a paso la instalación del sistema en un entorno local dentro de la red de la iglesia. A continuación, se describen los requisitos previos y las instrucciones de instalación.

### Requisitos Previos

- **Servidor Web**: Apache, Nginx u otro servidor web compatible.
- **Base de Datos**: MySQL o MariaDB.
- **PHP**: Versión 8.0.30.
- **Navegador Web**: Chrome, Firefox, Edge, etc.

### Paso 1: Obtención del Sistema

1. **Recibir el Sistema**: Asegúrese de tener los archivos del sistema.
2. **Descomprimir los Archivos**: Extraiga el archivo .zip o .tar.gz en una ubicación adecuada.

### Paso 2: Configuración del Servidor Web

1. **Instalar Servidor Web**:
   - En **Windows**: Instale XAMPP (incluye Apache).
   - En **Linux**: Ejecute `sudo apt-get install apache2`.
   - En **macOS**: Use `brew install httpd`.

2. **Configurar el Servidor Web**:
   - Copie los archivos del sistema a la carpeta raíz del servidor web (ej. `C:\xampp\htdocs\` en XAMPP).
   - Configure `httpd.conf` o el archivo de configuración del servidor para apuntar al directorio donde se copió el sistema.

### Paso 3: Instalación de la Base de Datos

1. **Instalar MySQL/MariaDB**:
   - En **Windows**: Incluido en XAMPP.
   - En **Linux**: Ejecute `sudo apt-get install mysql-server`.
   - En **macOS**: Ejecute `brew install mysql`.

2. **Ejecutar el Script SQL**:
   - Importe el archivo `iglesia.sql` ubicado en la carpeta "Base de Datos".

### Paso 4: Configuración del Sistema

1. **Configurar el Archivo de Conexión a la Base de Datos**:
   - La base de datos se encuentra en la carpeta "Base de datos reespaldo"
   - Abra el archivo `.env` y ajuste las credenciales de la base de datos.

### Paso 5: Instalación de Dependencias

1. **Instalar Dependencias PHP**:
   - En la terminal, diríjase al directorio del proyecto y ejecute:
     ```bash
     composer install
     ```

### Paso 6: Iniciar el Sistema

1. **Iniciar el Servidor Web**:
   - En **Windows**: Use el panel de control de XAMPP para encender Apache y MySQL.
   - En **Linux/macOS**: Asegúrese de que Apache/Nginx y MySQL estén en ejecución.

2. **Acceder al Sistema**:
   - Abra un navegador web y diríjase a `http://localhost/` o la URL configurada.

---

