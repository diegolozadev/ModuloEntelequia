<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Administrador de Productos</title>
</head>
<body>

    <!-- Botón de regreso al inicio en la parte superior -->
    <div class="container mt-4">
        <a href="index.php?action=home" class="btn btn-secondary">← Volver al Inicio</a>
    </div>

    <div class="container mt-3">
        <h1 class="text-center mb-4">Sección para el Manejo de Productos</h1> 

        <div class="d-flex justify-content-center">
            <form method="post" enctype="multipart/form-data" class="w-50 p-4 border rounded shadow-sm">

                <div class="mb-3">
                    <label class="form-label">ID</label>
                    <input type="text" class="form-control" name="id" value="<?= isset($product['id']) ? $product['id'] : '' ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" value="<?= isset($product['name']) ? $product['name'] : '' ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea class="form-control" name="description"><?= isset($product['description']) ? $product['description'] : '' ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input type="text" class="form-control" name="price" value="<?= isset($product['price']) ? $product['price'] : '' ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Estado</label>
                    <select class="form-control" name="status">
                        <option value="publicado" <?= (isset($product['status']) && $product['status'] === 'publicado') ? 'selected' : '' ?>>Publicado</option>
                        <option value="pausado" <?= (isset($product['status']) && $product['status'] === 'pausado') ? 'selected' : '' ?>>Pausado</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Imagen</label>
                    <input type="file" class="form-control" name="image" accept="image/jpeg">
                    <?php if (isset($product['image'])): ?>
                        <div class="mt-2">
                            <img src="<?= $product['image'] ?>" alt="Imagen actual" class="img-thumbnail" width="100">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" formaction="index.php?action=add">Guardar Nuevo</button>
                    <button type="submit" class="btn btn-success" formaction="index.php?action=update">Actualizar</button>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <button type="submit" class="btn btn-danger" formaction="index.php?action=delete">Eliminar</button>
                    <button type="submit" class="btn btn-dark" formaction="index.php?action=getProductById">Buscar por ID</button>
                </div>

            </form>
        </div>
    </div>

</body>
</html>


