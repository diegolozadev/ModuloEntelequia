# MóduloEntelequia

Este proyecto es un **módulo de administración y visualización de productos** desarrollado en **PHP** con **MySQL** y **Bootstrap**.

## 🚀 Características

- Mostrar productos disponibles (solo los publicados).
- **Panel de administrador**:
  - Agregar productos con imagen.
  - Buscar productos por ID.
  - Actualizar datos de un producto (incluyendo el estado: publicado/pausado).
  - Eliminar productos.
  - Subida de imágenes.
  - Control de estado (publicado/pausado).

### ✅ Requisitos
  XAMPP / LAMP / WAMP (Servidor PHP + MySQL).
  PHP >= 7.4.
  MySQL >= 5.7.
  Navegador Web.

### 🚀 Instalación
  Para instalar y ejecutar ModuloEntelequia , sigue estos pasos:

# Clonar el repositorio :
  git clone https://github.com/diegolozadev/ModuloEntelequia.git

# Configurar la base de datos :
  Abra el archivo sql/entelequia.sqly ejecute el script SQL en su base de datos MySQL.

# Configure la conexión a la base de datos :
 Abra el archivo config/database.php y ajuste los parámetros de conexión según su configuración de base de datos.

# Acceder a la aplicación :
Coloca el proyecto en la carpeta de tu servidor web (por ejemplo, htdocsen XAMPP) y accede a través de tu navegador.

## 📝 Descripción de Archivos
  *config/database.php:* Contiene la configuración de la base de datos.
  *controllers/productController.php:* Controlador para gestionar los productos.
  *models/productModel.php:* Modelo para interactuar con la base de datos.
  *views/viewAdministrator.php:* Vista para los administradores.
  *views/viewClient.php:* Vista para los clientes.
  *images/:* Carpeta para almacenar las imágenes de los productos.
  *index.php:* Página principal de la aplicación.


