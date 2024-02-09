<?php
session_start();

// Manejo de la carga de archivos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['archivo'])) {
    $file = $_FILES['archivo'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];

    // Ruta de destino del archivo
    $uploadPath = 'files/' . $fileName;

    // Mover el archivo a la carpeta de destino si no hay errores
    if ($fileError === UPLOAD_ERR_OK) {
        if (move_uploaded_file($fileTmpName, $uploadPath)) {
            echo 'El archivo se subió correctamente.';
        } else {
            echo 'Error al subir el archivo.';
        }
    } else {
        echo 'Error al subir el archivo.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Files</title>
</head>
<body>
    <h2>Upload Files</h2>

    <!-- Formulario de carga de archivos -->
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="archivo" required>
        <button type="submit">Subir archivo</button>
    </form>
</body>
</html>
