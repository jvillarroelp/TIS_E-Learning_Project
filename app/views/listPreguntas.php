<h3 >Lista de Preguntas</h3>
<a href="#" class="btn btn-success mt-3 mb-3">Creal rol</a>

<?php if (count($preguntas) > 0): ?>
    <table class="table table-bordered ">
        <thead >
            <tr>
                <th>ID Preguntas</th>
                <th>Pregunta</th>
                <th>Tipo </th>
                <th>Acciones</th>        
            </tr>
        </thead>
        <tbody>
        <?php foreach ($preguntas as $pregunta): ?>
            <tr>
                <td><?= $pregunta->ID_PREGUNTA ?></td>
                <td><?= $pregunta->PREGUNTA ?></td>
                <td><?= $pregunta->TIPO_PREGUNTA ?></td>
                <td>
                    <a href="/respuestas?ID_PREGUNTA=<?= $pregunta->ID_PREGUNTA?>" class="btn btn-primary">
                        Crear Respuesta
                    </a>
                </td>


            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No se encontraron roles.</p>
<?php endif; ?>
