<<<<<<< HEAD

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
==============================================================================


# Sistema Sorteo de Casos

## Descripción

El **Sistema Sorteo de Casos** es una plataforma automatizada para la asignación de casos de estudio a los estudiantes, garantizando criterios personalizados según cada carrera y área de especialización. Además, gestiona los jurados, el registro de notas y las notificaciones a los estudiantes a través de **correo electrónico** y  **WhatsApp** .

Este sistema está diseñado para su uso en facultades como:

* **Ciencias y Tecnología**
* **Ciencias Empresariales**
* **Ciencias Jurídicas, Sociales y Humanísticas**

Asegura que los estudiantes no reciban casos repetidos dentro de su área de especialización, optimizando la asignación y gestión de casos de estudio.

## Funcionalidades Principales

* **Asignación Automática de Casos:**
  * Distribución equitativa de los casos según la carrera y área de especialización.
  * Prevención de asignaciones repetidas dentro de la misma especialización.
* **Gestión de Jurados y Notas:**
  * Registro de jurados asignados a cada caso.
  * Administración y almacenamiento de calificaciones de los estudiantes.
* **Generación de Informes:**
  * Reportes detallados por carrera.
  * Resultados de las defensas.
* **Notificaciones Automáticas:**
  * Envío de notificaciones a los estudiantes por **correo electrónico** y  **WhatsApp** .
* **Roles de Usuario:**
  * Solo los administradores tienen acceso a todas las funcionalidades para un mejor control.
* **Sorteo Personalizado por Carrera:**
  * Definición de áreas específicas para cada carrera (Ejemplo: Bases de Datos, Redes e IA en Ingeniería de Sistemas, y otras áreas en Derecho y Ciencias Empresariales).

## Requisitos del Sistema

### Interfaz Administrativa

* Gestión de asignaciones de casos de estudio.
* Generación de informes.
* Registro de resultados de defensa.

### Configuración por Carrera

* Definición de áreas de especialización específicas para cada carrera y facultad.
* Aplicación de reglas personalizadas para el sorteo de casos.

### Seguridad de Datos

* Solo el **administrador** puede modificar asignaciones y generar informes.
* Protección de la información de estudiantes y jurados.

## Tecnologías Utilizadas

* **Framework:** Laravel 11 para la gestión de la lógica del sorteo y el backend.
* **Base de Datos:** MySQL para el almacenamiento de información estructurada.
* **Frontend:** HTML, CSS y JavaScript para la interfaz de usuario.
* **Backend:** Laravel 11 proporciona las funcionalidades necesarias para manejar la lógica de negocio.
* **Notificaciones:** Integración con WhatsApp y correo electrónico.

## Instalación y Configuración

### 1. Clonar el repositorio

```sh
git clone git@github.com:SalvatierraJ/SistemaSorteoDeCasos.git
cd SistemaSorteoDeCasos
```

### 2. Instalar dependencias

```sh
composer install
npm install
```

### 3. Configurar la base de datos

Modificar el archivo **.env** con los datos de la base de datos:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sorteo_casos
DB_USERNAME=root
DB_PASSWORD=
```

Ejecutar las migraciones:

```sh
php artisan migrate
```

### 4. Iniciar el servidor

```sh
php artisan serve
```

La aplicación estará disponible en: **[http://127.0.0.1:8000](http://127.0.0.1:8000/)**

## Contribución

Si deseas contribuir al proyecto, crea un **fork** y abre un **pull request** con tus mejoras.

## Licencia

Este proyecto está bajo la  **licencia MIT** .
