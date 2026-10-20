<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Vista de Productos</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        .form-container { margin-bottom: 20px; }
    </style>
</head>
<body>

    <div class="form-container">
        <h3>Agregar Producto</h3>
        <!-- Formulario para agregar productos -->
        <form action="index.php?accion=insertar" method="POST">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>
            <label>Precio:</label>
            <input type="number" step="0.01" name="precio" required>
            <button type="submit">Guardar</button>
        </form>
    </div>

    <h3>Lista de Productos</h3>
    <!-- Mostrar todos los productos en una tabla HTML -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $prod): ?>
            <tr>
                <td><?php echo $prod['id']; ?></td>
                <td>
                    <!-- Formulario integrado para editar directo en la tabla -->
                    <form action="index.php?accion=editar" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $prod['id']; ?>">
                        <input type="text" name="nombre" value="<?php echo htmlspecialchars($prod['nombre']); ?>" required>
                </td>
                <td>
                        <input type="number" step="0.01" name="precio" value="<?php echo htmlspecialchars($prod['precio']); ?>" required>
                </td>
                <td>
                        <!-- Botón de editar -->
                        <button type="submit">Actualizar</button>
                    </form>
                    <!-- Botón de eliminar -->
                    <a href="index.php?accion=eliminar&id=<?php echo $prod['id']; ?>">
                        <button type="button">Eliminar</button>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>