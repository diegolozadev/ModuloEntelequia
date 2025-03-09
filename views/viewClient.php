<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Listado de Productos</title>
</head>
<body>
    <!-- Título -->
    <div class="d-flex justify-content-center mt-3">
        <h1>Listado de Productos</h1>
    </div>

    <div class="d-flex justify-content-center mt-3">
        <a href="index.php?action=admin" class="btn btn-secondary">Administrar</a>
    </div>

    <!-- Contenedor de Cards -->
    <div class="container mt-4">
        <div class="row justify-content-center">

            <?php if (!empty($products)) : ?>
                <?php foreach ($products as $product) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm" style="width: 18rem;">
                            <!-- Imagen del producto -->
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>" style="height: 350px; object-fit: cover;">

                            <div class="card-body">
                                <!-- Nombre del producto -->
                                <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>

                                <!-- Descripción -->
                                <p class="card-text"><?php echo htmlspecialchars($product['description']); ?></p>
                            </div>

                            <ul class="list-group list-group-flush">
                                <!-- Precio -->
                                <li class="list-group-item">Precio: $<?php echo htmlspecialchars($product['price']); ?></li>

                                <!-- Estado -->
                                <li class="list-group-item">Estado: <?php echo htmlspecialchars($product['status']); ?></li>
                            </ul>

                            <div class="card-body text-center">
                                <a href="#" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-12 text-center">
                    <p>No hay productos disponibles en este momento.</p>
                </div>
            <?php endif; ?>

        </div>
    </div>

</body>
</html>
