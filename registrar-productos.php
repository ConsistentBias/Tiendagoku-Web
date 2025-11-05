<?php include 'plantillas/header.html';?>
<?php require 'conexion.php'; ?>
<?php require 'funcionValidate.php'; ?>

<link rel="stylesheet" href="registrar-productos.css">

<h2>Registrar un producto para la pagina:</h2>

<!-- Registrar los productos -->
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 2. Recuperar los datos del formulario
        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        
        $notificacion = '';

        $errores = validate($nombre, $categoria, $precio, $cantidad);

        if (empty($errores)) {
            $precio_float = (float)$precio;
            $cantidad_int = (int)$cantidad;

            $sqlQuery = "insert into productos (nombre, categoria, precio, cantidad) values (?, ?, ?, ?)";
            $sentence = $conexion->prepare($sqlQuery);

            $sentence->bindParam(1, $nombre, PDO::PARAM_STR);
            $sentence->bindParam(2, $categoria, PDO::PARAM_STR);
            $sentence->bindParam(3, $precio, PDO::PARAM_STR); 
            $sentence->bindParam(4, $cantidad, PDO::PARAM_INT);

            # Mandando query a la base de datos y mostrando mensaje
            if ($sentence->execute()){
                echo "<p class='notif'>Producto registrado: $nombre $categoria $precio<p>";
            } else {
                # Si no funciona
                echo "<p>No funciono la cosa</p>";
            }

            $sentence = null;
        } else {
            $notificacion = "<p class='notif warning'>⚠️ Por favor, corrige los errores en el formulario.</p>";
            echo $notificacion;
        }
    }
?>

<main>
    <h3>Formulario de registro</h3>
    <form action="registrar-productos.php" method="POST">
        <label>Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Escriba nombre del producto" required><br>
        
        <label>Categoria</label>
        <input type="text" id="categoria" name="categoria" placeholder="La categoria del producto" required><br>
        
        <label>Precio</label>
        <input type="decimal" id="precio" name="precio" placeholder="Su precio"><br>

        <label for="dwdwd">Cantidad</label>
        <input type="number" id="cantidad" name="cantidad" placeholder="Cuantos hay?"><br>

        <input type="submit" value="Registrar Producto">
    </form>

</main>



<?php include 'plantillas/footer.php' ?>