<?php use app\core\form\Form; ?>

<h1>Lista de Cursos</h1>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre del Curso</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cursos as $curso): ?>
            <tr>
                <td><?= htmlspecialchars($curso->COD_CURSO) ?></td>
                <td><?= htmlspecialchars($curso->NOMBRE_CURSO) ?></td>
                <td>
                    <a href="/evaluacion?curso_id=<?= $curso->COD_CURSO ?>" class="btn btn-primary">
                        Crear Evaluación
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
