<h3>Lista de Permisos</h3>
<a href="/permisos" class="btn btn-success mt-3 mb-3">Crear permiso</a>

<?php if (count($permisos) > 0): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Permiso</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($permisos as $permiso): ?>
            <tr>
                <td><?= $permiso->ID_PERMISO ?></td>
                <td><?= $permiso->NOMBRE ?></td>
                <td>
                    <!-- Formulario para eliminar un permiso -->
                    <form action="/deletePermiso" method="post" style="display:inline;">
                        <input type="hidden" name="ID_PERMISO" value="<?= $permiso->ID_PERMISO ?>" />
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
<?php else: ?>
    <p>No se encontraron permisos.</p>
<?php endif; ?>