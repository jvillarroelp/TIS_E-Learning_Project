<h3>Lista de Contenidos</h3>

<?php if (count($contenidos) > 0): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Contenido</th>
                <th>Descripción</th>
                <th>Lección</th>
                <th>Acciones</th>        
            </tr>
        </thead>
        <tbody>
        <?php foreach ($contenidos as $contenido): ?>
            <tr>
                <td><?= $contenido->TITULO_CONTENIDO ?></td>
                <td><?= $contenido->SUB_TITULO ?></td>
                <td><?= $contenido->CREACION_CONTENIDO ?></td>
                <td>
                    <!-- Aquí puedes agregar botones para editar o eliminar el contenido -->
                    <a href="/contenidos/edit?ID_CONTENIDO=<?= $contenido->ID_CONTENIDO ?>" class="btn btn-primary">Editar</a>
                    <form action="/deleteContenido" method="post" style="display:inline;">
                            <input type="hidden" name="ID_CONTENIDO" value="<?= htmlspecialchars($contenido->ID_CONTENIDO) ?>" />
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No se encontraron contenidos.</p>
<?php endif; ?>
