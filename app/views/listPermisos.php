<h3>Lista de Permisos</h3>
<a href="/permisos" class="btn btn-success mt-3 mb-3">Crear permiso</a>

<?php if (count($permisos) > 0): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Permiso</th>
                <th>Nombre</th>
                <th>Permisos Asignados</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($permisos as $permiso): ?>
            <tr>
                <td><?= $permiso->ID_PERMISO ?></td>
                <td><?= $permiso->NOMBRE ?></td>

                <td>
                    <?php if (!empty($rol->permisos)): ?>
                        <?php foreach ($rol->permisos as $permiso): ?>
                            <?= $permiso['NOMBRE'] ?> 
                            <a href="/roles/eliminarPermiso?ID_ROL=<?= $rol->ID_ROL ?>&ID_PERMISO=<?= $permiso['ID_PERMISO'] ?>" class="btn btn-danger btn-sm">Eliminar</a><br>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No tiene permisos asignados.</p>
                    <?php endif; ?>
                </td>
                <td>
                    <form action="/roles/asignarPermiso" method="POST">
                        <input type="hidden" name="ID_ROL" value="<?= $rol->ID_ROL ?>">
                        <select name="ID_PERMISO">
                            <?php foreach ($permisos as $permiso): ?>
                                <option value="<?= $permiso->ID_PERMISO ?>"><?= $permiso->NOMBRE ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn btn-primary">Asignar Permiso</button>
                    </form>
                </td>






               
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
<?php else: ?>
    <p>No se encontraron permisos.</p>
<?php endif; ?>