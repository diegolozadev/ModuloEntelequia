<?php
require_once 'config/database.php';

class ProductModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection(); // Guarda el objeto mysqli en $this->db
    }

    // Obtener todos los productos PUBLICADOS (clientes)
    public function getProducts() {
        $query = "SELECT * FROM productos WHERE status = 'publicado'";
        $result = $this->db->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    // Obtener un producto por ID (administrador)
    public function getProductById($id) {
        $stmt = $this->db->prepare("SELECT * FROM productos WHERE id = ?");

        if (!$stmt) {
            die("Error en la preparación: " . $this->db->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $product = $result->fetch_assoc();

        $stmt->close();

        return $product;
    }

    // Insertar un producto nuevo
    public function insertProduct($name, $description, $price, $status, $image) {
        $stmt = $this->db->prepare("INSERT INTO productos (name, description, price, status, image) VALUES (?, ?, ?, ?, ?)");

        if (!$stmt) {
            die("Error en la preparación: " . $this->db->error);
        }

        $stmt->bind_param("ssdss", $name, $description, $price, $status, $image);

        $success = $stmt->execute();
        $stmt->close();

        return $success;
    }

    // Actualizar un producto existente
    public function updateProduct($id, $name, $description, $price, $status, $image) {
        $stmt = $this->db->prepare("UPDATE productos SET name = ?, description = ?, price = ?, status = ?, image = ? WHERE id = ?");

        if (!$stmt) {
            die("Error en la preparación: " . $this->db->error);
        }

        $stmt->bind_param("ssdssi", $name, $description, $price, $status, $image, $id);

        $success = $stmt->execute();
        $stmt->close();

        return $success;
    }

    // Eliminar un producto por ID
    public function deleteProduct($id) {
        $stmt = $this->db->prepare("DELETE FROM productos WHERE id = ?");

        if (!$stmt) {
            die("Error en la preparación: " . $this->db->error);
        }

        $stmt->bind_param("i", $id);

        $success = $stmt->execute();
        $stmt->close();

        return $success;
    }

}
?>




