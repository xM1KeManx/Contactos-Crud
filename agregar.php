<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Contacto</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Agregar nuevo contacto</h1>
    <form action="agregar.php" method="post">
        <label>Nombre: <input type="text" name="nombre" required></label><br><br>
        <label>Teléfono: <input type="text" name="telefono" required></label><br><br>
        <label>Email: <input type="email" name="email" required></label><br><br>
        <input type="submit" value="Guardar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $archivo = "data/contactos.json";
        $contactos = json_decode(file_get_contents($archivo), true);

        $nuevo = [
            "id" => end($contactos)["id"] + 1,
            "nombre" => $_POST["nombre"],
            "telefono" => $_POST["telefono"],
            "email" => $_POST["email"]
        ];

        $contactos[] = $nuevo;
        file_put_contents($archivo, json_encode($contactos, JSON_PRETTY_PRINT));
        echo "<p>Contacto guardado exitosamente.</p>";
    }
    ?>
</body>
</html>
