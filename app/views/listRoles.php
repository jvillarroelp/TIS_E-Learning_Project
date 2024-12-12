<!-- app/views/roles-list.php -->

<h3 >Lista de Roles</h3>
<a href="/roles" class="btn btn-success mt-3 mb-3">Creal rol</a>

<?php if (count($roles) > 0): ?>
    <table class="table table-bordered ">
        <thead >
            <tr>
                <th>ID Rol</th>
                <th>Nombre</th>
                <th>Acciones</th>        
                <th>Asignar pemriso</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($roles as $rol): ?>
            <tr>
                <td><?= $rol->ID_ROL ?></td>
                <td><?= $rol->NOMBRE ?></td>
                <td>
                    <!-- Formulario para eliminar un rol -->
                    <form action="/deleteRol" method="post" style="display:inline;">
                    <input type="hidden" name="ID_ROL" value="<?= $rol->ID_ROL ?>"/>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>

                <td>
                    <!-- Formulario para asignar un permiso a este rol -->
                    <form action="/rolPermiso/assignPermission" method="POST">
                        <!-- Selecciona un permiso -->
                        <select name="ID_PERMISO">
                            <?php foreach ($permisos as $permiso): ?>
                                <option value="<?= $permiso->ID_PERMISO ?>"><?= $permiso->NOMBRE ?></option>
                            <?php endforeach; ?>
                        </select>
                        <!-- Pasar el ID del rol -->
                        <input type="hidden" name="ID_ROL" value="<?= $rol->ID_ROL ?>">
                        <button type="submit">Asignar Permiso</button>
                    </form>
                </td>


                
               



            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No se encontraron roles.</p>
<?php endif; ?>
