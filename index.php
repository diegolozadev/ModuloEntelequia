<?php
require_once 'controllers/productController.php';

$controller = new ProductController();

$action = isset($_GET['action']) ? $_GET['action'] : 'home';

switch ($action) {
    case 'home':
        $controller->showProducts();
        break;
    case 'admin':
        $controller->showAdmin();
        break;
    case 'add':
        $controller->addProduct();
        break;
    case 'update':
        $controller->updateProduct();
        break;
    case 'delete':
        $controller->deleteProduct();
        break;
    case 'getProductById':
        $controller->getProductById();
        break;
    default:
        $controller->showProducts();
        break;
}
?>
