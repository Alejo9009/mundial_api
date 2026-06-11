<div align="center">

# 🏆 FIFA WORLD CUP 2026 API

### API RESTful para la gestión del Mundial de Fútbol 2026

[![PHP Version](https://img.shields.io/badge/PHP-7.4+-blue.svg)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-5.7+-orange.svg)](https://mysql.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![API Status](https://img.shields.io/badge/API-Active-success.svg)](https://mundialapi2026.rf.gd)

![Banner API Mundial](https://placehold.co/1200x400/1a1a2e/7fff6a?text=FIFA+World+Cup+2026+API)

</div>

---

## 📋 Descripción

API RESTful desarrollada en **PHP puro** y **MySQL** para gestionar toda la información del Mundial de Fútbol 2026. Permite administrar participantes, convocados, grupos, partidos, estadísticas y más.

### ✨ Características principales

- 🎯 **API RESTful** con endpoints intuitivos
- 📊 **Gestión completa** de participantes, grupos y partidos
- 🏆 **Estadísticas en tiempo real** (goleadores, asistentes, campeones)
- 🖥️ **Panel de administración** integrado
- 📱 **Responsive design** para móviles y tablets
- 🔒 **CORS habilitado** para consumo desde cualquier frontend

---

## 🚀 Demo en vivo

| Servicio | URL |
|----------|-----|
| 🌐 **API Principal** | [https://mundialapi2026.rf.gd](https://mundialapi2026.rf.gd) |
| 📋 **Explorador de datos** | [https://mundialapi2026.rf.gd/selections.php](https://mundialapi2026.rf.gd/selections.php) |

---

## 📊 Endpoints disponibles

| Recurso | Métodos | Descripción |
|---------|---------|-------------|
| `/api/participantes.php` | GET, POST, PUT, DELETE | Gestión de selecciones |
| `/api/convocados.php` | GET, POST, DELETE | Gestión de jugadores |
| `/api/grupos.php` | GET, POST, PUT, DELETE | Gestión de grupos |
| `/api/partidos.php` | GET, POST, PUT, DELETE | Gestión de partidos |
| `/api/estadios.php` | GET, POST, DELETE | Gestión de estadios |
| `/api/campeones.php` | GET, POST, DELETE | Historial de campeones |
| `/api/goleadores.php` | GET, POST, DELETE | Máximos goleadores |
| `/api/asistentes.php` | GET, POST, DELETE | Máximos asistentes |

---

## 🔧 Instalación local

### Requisitos previos

- PHP 7.4 o superior
- MySQL 5.7 o superior
- Servidor web (Apache/Nginx)
- XAMPP / WAMP / MAMP (recomendado)

### Pasos de instalación

```bash
# 1. Clonar el repositorio
git clone https://github.com/tu-usuario/mundial-api.git
cd mundial-api

# 2. Configurar la base de datos
# Importar el archivo database.sql en phpMyAdmin

# 3. Configurar conexión
# Editar config/database.php con tus credenciales

# 4. Iniciar el servidor
# En XAMPP: mover a htdocs y acceder a http://localhost/mundial-api
