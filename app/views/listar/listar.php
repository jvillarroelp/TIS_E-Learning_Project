<h1>Lista de Cursos</h1>
<a href="/curso" class="btn btn-success mt-3 mb-3">Crear</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre del Curso</th>
            <th>Acciones</th>
            <th>Modulo</th>
            <th>Eliminar</th> <!-- Agregar columna de eliminar -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cursos as $curso): ?>
            <tr>
                <td><?= htmlspecialchars($curso->COD_CURSO) ?></td>
                <td><?= htmlspecialchars($curso->NOMBRE_CURSO) ?></td>
                <td>
                    <a href="/evaluacion?COD_CURSO=<?= $curso->COD_CURSO ?>" class="btn btn-primary">
                        Crear Evaluación
                    </a>
                </td>
                <td>
                    <a href="/modulos/create?COD_CURSO=<?= $curso->COD_CURSO ?>" class="btn btn-primary">
                        Crear Módulo
                    </a>
                </td>
                <td>
                    <!-- Formulario para eliminar un curso -->
                    <form action="/curso/delete" method="post" style="display:inline;">
                        <input type="hidden" name="COD_CURSO" value="<?= htmlspecialchars($curso->COD_CURSO) ?>" />
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
