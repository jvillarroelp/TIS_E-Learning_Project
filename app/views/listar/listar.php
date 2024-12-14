<?php
// Suponiendo que $_SESSION['user_id'] tiene el ID del docente autenticado
$docenteID = $_SESSION['user_id'];  // Obtén el ID del docente desde la sesión
?>



<?php use app\core\form\Form; ?>

<h1>Lista de Cursos</h1>
<a href="/curso" class="btn btn-success mt-3 mb-3">Crear</a>


<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre del Curso</th>
            <th>Acciones</th>
            <th>Modulo</th>
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
                <td>
                <td>
                    <!-- Modificar este enlace para enviar el COD_CURSO -->
                    <a href="/modulos/create?COD_CURSO=<?= $curso->COD_CURSO ?>" class="btn btn-primary">
                        Crear Módulo
                    </a>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
