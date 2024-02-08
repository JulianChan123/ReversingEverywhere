<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World</title>
</head>
<body>
    <h2>Hello World</h2>
    <p>Bienvenido, has iniciado sesión con éxito.</p>

    <h3>Archivos en la carpeta "files":</h3>
    <ul>
        <?php
        // Ruta de la carpeta
        $ruta = 'files/';

        // Abrir un gestor de directorio para la ruta especificada
        if ($gestor = opendir($ruta)) {
            // Recorrer el gestor de directorio
            while (false !== ($archivo = readdir($gestor))) {
                // Excluir los directorios . y ..
                if ($archivo != "." && $archivo != "..") {
                    echo "<li>$archivo</li>";
                }
            }
            // Cerrar el gestor de directorio
            closedir($gestor);
        } else {
            echo "No se pudo abrir la carpeta 'files'.";
        }
        ?>
    </ul>
</body>
</html>
