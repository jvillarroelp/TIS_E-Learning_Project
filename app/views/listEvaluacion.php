<?php
/** @var $evaluaciones app\models\Evaluacion[] */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Evaluaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2e3267;
            color: white;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #2e3267;
            color: white;
        }

        .btn {
            background-color: #2e3267;
            color: white;
        }

        .btn:hover {
            background-color: #4a4e8a;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center text-white">Lista de Evaluaciones</h1>

    <?php if (empty($evaluaciones)): ?>
        <p class="text-center text-white">No hay evaluaciones disponibles.</p>
    <?php else: ?>
        <div class="row">
            <?php foreach ($evaluaciones as $evaluacion): ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><?= htmlspecialchars($evaluacion->NOMBRE_EVALUACION) ?></h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Descripción:</strong> <?= htmlspecialchars($evaluacion->DESCRIPCION_EVALUACION) ?></p>
                            <p class="card-text"><strong>Fecha de Diagnóstico:</strong> <?= $evaluacion->FECHA_DIAGNOSTICO ?></p>
                            <p class="card-text"><strong>Curso:</strong> <?= $evaluacion->COD_CURSO ?></p>
                            <p class="card-text"><strong>Usuario RUT:</strong> <?= $evaluacion->RUT_USUARIO ?></p>
                            <a href="#" class="btn">Ver más</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
