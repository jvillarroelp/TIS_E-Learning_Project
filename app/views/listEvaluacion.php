<h3>Lista de Evaluaciones</h3>
<a href="/evaluacion/create" class="btn btn-success mt-3 mb-3">Crear Evaluación</a>

<?php if (count($evaluaciones) > 0): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código de Evaluación</th>
                <th>Nombre de Evaluación</th>
                <th>Fecha de Realización</th>
                <th>Acciones</th>        
            </tr>
        </thead>
        <tbody>
        <?php foreach ($evaluaciones as $evaluacion): ?>
            <tr>
                <td><?= $evaluacion->COD_EVALUACION ?></td>
                <td><?= $evaluacion->NOMBRE_EVALUACION ?></td>
                <td><?= $evaluacion->FECHA_DIAGNOSTICO ?></td>
                <td>
                    <a href="/preguntas?COD_EVALUACION=<?= $evaluacion->COD_EVALUACION ?>" class="btn btn-primary">
                        Crear Preguntas Evaluación
                    </a>
                    
                    <!-- Formulario para eliminar la evaluación -->
                    <form action="/evaluacion/delete" method="post" style="display:inline;">
                        <input type="hidden" name="COD_EVALUACION" value="<?= htmlspecialchars($evaluacion->COD_EVALUACION) ?>" />
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>

                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No se encontraron evaluaciones.</p>
<?php endif; ?>
