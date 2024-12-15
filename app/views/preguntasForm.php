<?php
/** @var $model app\models\Pregunta */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Pregunta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2e3267; /* Color de fondo oscuro */
            color: white; /* Texto en blanco */
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #ffffff; /* Fondo claro para el formulario */
            border-radius: 10px; /* Bordes redondeados */
            padding: 30px;
            margin-top: 50px;
        }

        .form-label {
            font-weight: bold;
            color: #2e3267; /* Color del texto de las etiquetas */
        }

        .form-control {
            border-radius: 5px;
            background-color: #f0f0f0; /* Fondo claro para los campos de texto */
            border: 1px solid #ccc;
            color: #333; /* Color de texto en los campos */
        }

        .form-control:focus {
            border-color: #2e3267; /* Borde de los campos cuando se seleccionan */
            box-shadow: 0 0 0 0.25rem rgba(46, 50, 103, 0.25);
        }

        button {
            background-color: #2e3267;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            width: 100%;
            margin-top: 20px;
        }

        button:hover {
            background-color: #4a4e8a;
        }

        h1 {
            text-align: center;
            color: white;
            margin-bottom: 30px;
        }

        .text-center {
            text-align: center;
        }

        .card-header {
            background-color: #2e3267;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card shadow">
        <div class="card-header text-white text-center">
            <h2>Crear Nueva Pregunta</h2>
        </div>
        <div class="card-body">
            <form action="/preguntas" method="POST">
                <div class="mb-3">
                    <label for="PREGUNTA" class="form-label">Pregunta:</label>
                    <textarea id="PREGUNTA" name="PREGUNTA" class="form-control" rows="4" required><?= $model->PREGUNTA ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="COMENTARIO" class="form-label">Comentario (opcional):</label>
                    <textarea id="COMENTARIO" name="COMENTARIO" class="form-control" rows="4"><?= $model->COMENTARIO ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="TIPO_PREGUNTA" class="form-label">Tipo de Pregunta:</label>
                    <input type="text" id="TIPO_PREGUNTA" name="TIPO_PREGUNTA" class="form-control" value="<?= $model->TIPO_PREGUNTA ?>" required>
                </div>

                <div class="mb-3">
                    <label for="RESPUESTA_CORRECTA" class="form-label">Respuesta Correcta:</label>
                    <input type="text" id="RESPUESTA_CORRECTA" name="RESPUESTA_CORRECTA" class="form-control" value="<?= $model->RESPUESTA_CORRECTA ?>" required>
                </div>

                <div class="mb-3">
                    <label for="ALTERNATIVA" class="form-label">Alternativa:</label>
                    <input type="text" id="ALTERNATIVA" name="ALTERNATIVA" class="form-control" value="<?= $model->ALTERNATIVA ?>" required>
                </div>

                <div class="mb-3">
                    <label for="FECHA_PREGUNTA" class="form-label">Fecha:</label>
                    <input type="date" id="FECHA_PREGUNTA" name="FECHA_PREGUNTA" class="form-control" value="<?= $model->FECHA_PREGUNTA ?>" required>
                </div>

                <div class="mb-3 text-center">
                    <button type="submit">Crear Pregunta</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
