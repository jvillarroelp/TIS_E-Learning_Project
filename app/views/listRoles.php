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
            </tr>
        </thead>
        <tbody>
        <?php foreach ($roles as $rol): ?>
            <tr>
                <td><?= $rol->ID_ROL ?></td>
                <td><?= $rol->NOMBRE ?></td>
                <td>
                    <!-- Formulario para eliminar un permiso -->
                    <form action="/deleteRol" method="post" style="display:inline;">
                    <input type="hidden" name="ID_ROL" value="<?= $rol->ID_ROL ?>"/>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No se encontraron roles.</p>
<?php endif; ?>
