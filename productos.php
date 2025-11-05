<?php include 'plantillas/header.html';?>
<?php require 'conexion.php'; ?>

<link rel="stylesheet" href="productos.css">

<h2 class="title">Explora nuestra selección de productos:</h2>

<!-- Conseguir los productos -->
<?php
    $sql = "SELECT * FROM productos";
    $stmt = $conexion->query($sql);
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main>
    <h3>Lista de productos</h3>
    <?php 
    if (count($productos) == 0) {
        echo '<p class="red">No hay productos disponibles<p>';
    } else { ?>
    
    <table class="tabla-productos">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $costoAcumulado = 0;
            foreach ($productos as $producto) : ?>
            <tr>
                <td><?php print $producto['nombre'] ?></td>
                <td><?php print $producto['categoria'] ?></td>
                <td class="col-precio">$<?php print number_format($producto['precio'], 2, '.', ','); ?></td>
                <td class="col-stock"><?php print $producto['cantidad'] ?></td>
            </tr>
            <?php 
            $costoAcumulado += $producto['cantidad'] * $producto['precio'];
            endforeach; ?>
        </tbody>
    </table>

    <?php 
    echo "<p>Costo final acumulado: $costoAcumulado</p>";

    } ?>
</main>



<?php include 'plantillas/footer.php' ?>