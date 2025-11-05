<?php 

function validate($nombre, $categoria, $precio, $cantidad) {
    $errores = [];
    if (empty($nombre)) {
        $errores['nombre'] = "El nombre del producto es obligatorio.";
    }
    if (empty($categoria)) {
        $errores['categoria'] = "La categoría es obligatoria.";
    }
    // Aunque el input HTML es 'decimal', PHP lo recibe como string.
    // Usamos empty() para verificar que se haya ingresado algo.
    if (empty($precio) || !is_numeric($precio) || $precio <= 0) {
        $errores['precio'] = "El precio debe ser un número positivo y es obligatorio.";
    }
    // Similar para la cantidad
    if (empty($cantidad) || !is_numeric($cantidad) || $cantidad < 0) {
        $errores['cantidad'] = "La cantidad debe ser un número entero no negativo y es obligatoria.";
    }

    return $errores;
}

?>