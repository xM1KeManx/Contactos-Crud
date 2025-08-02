<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Contacto</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Editar contacto</h1>

    <?php
    $archivo = "data/contactos.json";
    $contactos = json_decode(file_get_contents($archivo), true);

    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
        $id = (int)$_GET["id"];
        $contacto = null;

        foreach ($contactos as $c) {
            if ($c["id"] === $id) {
                $contacto = $c;
                break;
            }
        }

        if ($contacto): ?>
            <form method="post">
                <input type="hidden" name="id" value="<?= $contacto['id'] ?>">
                <label>Nombre: <input type="text" name="nombre" value="<?= $contacto['nombre'] ?>" required></label><br><br>
                <label>Teléfono: <input type="text" name="telefono" value="<?= $contacto['telefono'] ?>" required></label><br><br>
                <label>Email: <input type="email" name="email" value="<?= $contacto['email'] ?>" required></label><br><br>
                <input type="submit" value="Guardar cambios">
            </form>
        <?php else:
            echo "<p>Contacto no encontrado</p>";
        endif;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id = (int)$_POST["id"];
        foreach ($contactos as &$c) {
            if ($c["id"] === $id) {
                $c["nombre"] = $_POST["nombre"];
                $c["telefono"] = $_POST["telefono"];
                $c["email"] = $_POST["email"];
                break;
            }
        }
        file_put_contents($archivo, json_encode($contactos, JSON_PRETTY_PRINT));
        echo "<p>Contacto actualizado.</p>";
    }
    ?>
</body>
</html>
