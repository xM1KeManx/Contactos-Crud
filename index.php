<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Contactos</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Contactos</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Email</th>
        </tr>
        <?php
        $contactos = json_decode(file_get_contents("data/contactos.json"), true);
        foreach ($contactos as $c) {
            echo "<tr>
                    <td>{$c['nombre']}</td>
                    <td>{$c['telefono']}</td>
                    <td>{$c['email']}</td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
