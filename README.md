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

## 📂 Estructura del Proyecto

```plaintext
ModuloEntelequia/
├── config/
│   └── database.php
├── controllers/
│   └── productController.php
├── models/
│   └── productModel.php
├── views/
│   ├── viewAdministrator.php
│   └── viewClient.php
├── images/              # Aquí se suben las imágenes de los productos
├── sql/
│   └── entelequia.sql    # Script de la base de datos
├── index.php
├── README.md


