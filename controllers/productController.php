<?php
require_once 'models/productModel.php';

class ProductController {

    private $model;

    public function __construct() {
        $this->model = new ProductModel();
    }

    // Mostrar productos publicados al cliente
    public function showProducts() {
        $products = $this->model->getProducts();
        require 'views/viewClient.php';
    }

    // Mostrar el panel de administrador
    public function showAdmin() {
        require 'views/viewAdministrator.php';
    }

    // Agregar un nuevo producto
    public function addProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $status = $_POST['status'];

            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

                $uploadDir = 'images/';
                $imageName = time() . '_' . basename($_FILES['image']['name']);
                $uploadFile = $uploadDir . $imageName;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {

                    $success = $this->model->insertProduct($name, $description, $price, $status, $uploadFile);

                    if ($success) {
                        echo "<script>alert('Producto agregado correctamente'); window.location.href = 'index.php?action=home';</script>";
                    } else {
                        echo "<script>alert('Error al agregar el producto en la base de datos'); window.history.back();</script>";
                    }

                } else {
                    echo "<script>alert('Error al subir la imagen'); window.history.back();</script>";
                }

            } else {
                echo "<script>alert('No se seleccionó ninguna imagen o hubo un error en la carga'); window.history.back();</script>";
            }

        } else {
            $this->showAdmin();
        }
    }

    // Actualizar un producto existente
    public function updateProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $status = $_POST['status'];

            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

                $uploadDir = 'images/';
                $imageName = time() . '_' . basename($_FILES['image']['name']);
                $uploadFile = $uploadDir . $imageName;

                if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                    echo "<script>alert('Error al subir la nueva imagen'); window.history.back();</script>";
                    return;
                }

            } else {
                // Si no subió una imagen nueva, obtener la actual
                $product = $this->model->getProductById($id);
                $uploadFile = $product['image'];
            }

            $success = $this->model->updateProduct($id, $name, $description, $price, $status, $uploadFile);

            if ($success) {
                echo "<script>alert('Producto actualizado correctamente'); window.location.href = 'index.php?action=home';</script>";
            } else {
                echo "<script>alert('Error al actualizar el producto'); window.history.back();</script>";
            }

        } else {
            $this->showAdmin();
        }
    }

    // Eliminar un producto
    public function deleteProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            $success = $this->model->deleteProduct($id);

            if ($success) {
                echo "<script>alert('Producto eliminado correctamente'); window.location.href = 'index.php?action=home';</script>";
            } else {
                echo "<script>alert('Error al eliminar el producto'); window.history.back();</script>";
            }
        } else {
            $this->showAdmin();
        }
    }

    // Buscar un producto por ID para editarlo
    public function getProductById() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            $product = $this->model->getProductById($id);

            if ($product) {
                require 'views/viewAdministrator.php';
            } else {
                echo "<script>alert('Producto no encontrado'); window.history.back();</script>";
            }
        } else {
            $this->showAdmin();
        }
    }
}
?>

