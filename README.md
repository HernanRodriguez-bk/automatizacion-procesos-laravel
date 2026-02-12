# 🚀 Sistema de Automatización de Procesos

Aplicación web desarrollada en Laravel para automatizar la carga y gestión de datos desde archivos CSV.

## 📌 Descripción

Este sistema permite:

- Subir archivos CSV
- Procesar automáticamente los datos
- Evitar duplicados
- Gestionar registros
- Visualizar métricas en un dashboard
- Exportar reportes
- Controlar acceso por roles (admin / usuario)

El objetivo del proyecto es simular un entorno real de automatización de procesos empresariales.

---

## 🛠️ Tecnologías utilizadas

- PHP 8
- Laravel
- MySQL
- Bootstrap
- Chart.js
- Git

---

## 🔐 Funcionalidades principales

- Autenticación de usuarios
- Sistema de roles
- Dashboard con métricas y gráficos
- Carga masiva desde CSV
- Validaciones avanzadas
- Exportación de reportes
- UI profesional con layout común

---

## 📊 Dashboard

Incluye:

- Total de registros
- Registros activos
- Registros pendientes
- Gráfico dinámico por estado
- Últimos registros cargados

---

## ⚙️ Instalación

1. Clonar el repositorio

- https://github.com/HernanRodriguez-bk/automatizacion-procesos-laravel.git


2. Instalar dependencias

- composer install
- npm install


3. Configurar archivo `.env`

- cp.env.example.env


4. Generar clave

- php artisan key:generate


5. Migrar base de datos

- php artisan migrate


6. Levantar servidor

- php artisan serve 

---


---

## 👤 Roles

- Admin → Puede cargar archivos CSV
- Usuario → Solo visualización y exportación

---

## 📈 Objetivo profesional

Proyecto desarrollado como práctica avanzada de desarrollo full stack con enfoque en automatización empresarial.
