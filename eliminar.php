<?php
$archivo = "data/contactos.json";
$contactos = json_decode(file_get_contents($archivo), true);

if (isset($_GET["id"])) {
    $id = (int)$_GET["id"];
    $nuevos = [];

    foreach ($contactos as $c) {
        if ($c["id"] !== $id) {
            $nuevos[] = $c;
        }
    }

    file_put_contents($archivo, json_encode($nuevos, JSON_PRETTY_PRINT));
    echo "Contacto eliminado.<br>";
}

echo '<a href="index.php">Volver a la lista</a>';
?>
