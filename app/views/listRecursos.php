<h1>Lista de Recursos</h1>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre del recurso</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($recursos)): ?>
            <tr>
                <td colspan="3">No hay recursos disponibles.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($recursos as $recurso): ?>
                <tr>
                    <td><?= htmlspecialchars($recurso->COD_RECURSO) ?></td>
                    <td><?= htmlspecialchars($recurso->NOMBRE_RECURSO) ?></td>

                    <td>
                        <!-- Formulario para eliminar un rol -->
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="ID_RECURSO" value="<?= htmlspecialchars($recurso->ID_RECURSO) ?>" />
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>