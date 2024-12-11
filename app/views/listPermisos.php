<h3>Lista de Permisos</h3>
<a href="/permisos" class="btn btn-success mt-3 mb-3">Crear permiso</a>

<?php if (count($permisos) > 0): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Permiso</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($permisos as $permiso): ?>
                <tr>
                    <td><?= $permiso->ID_PERMISO ?></td>
                    <td><?= $permiso->NOMBRE ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No se encontraron permisos.</p>
<?php endif; ?>
