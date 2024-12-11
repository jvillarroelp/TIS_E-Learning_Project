<!-- app/views/roles-list.php -->

<h3 >Lista de Roles</h3>
<a href="/roles" class="btn btn-success mt-3 mb-3">Creal rol</a>

<?php if (count($roles) > 0): ?>
    <table class="table table-bordered ">
        <thead >
            <tr>
                <th>ID Rol</th>
                <th>Nombre</th>
                
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $role): ?>
                <tr>
                    <td><?= $role->ID_ROL ?></td>
                    <td><?= $role->NOMBRE ?></td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No se encontraron roles.</p>
<?php endif; ?>
