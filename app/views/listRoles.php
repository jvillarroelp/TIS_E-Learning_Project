<!-- app/views/roles-list.php -->

<h3>Lista de Roles</h3>

<?php if (count($roles) > 0): ?>
    <table class="table">
        <thead>
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
