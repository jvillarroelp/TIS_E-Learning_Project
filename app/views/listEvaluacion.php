<!-- app/views/roles-list.php -->

<h3 >Lista de Roles</h3>
<a href="#" class="btn btn-success mt-3 mb-3">Creal rol</a>

<?php if (count($evaluaciones) > 0): ?>
    <table class="table table-bordered ">
        <thead >
            <tr>
                <th>Codigo de evaluación</th>
                <th>Nombre de evaluacion</th>
                <th>Fecha de realizamiento</th>
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
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No se encontraron roles.</p>
<?php endif; ?>
