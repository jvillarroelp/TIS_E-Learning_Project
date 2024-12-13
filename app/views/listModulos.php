<h1>Lista de Módulos</h1>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre del Módulo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($modulos)): ?>
            <tr>
                <td colspan="3">No hay módulos disponibles.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($modulos as $modulo): ?>
                <tr>
                    <td><?= htmlspecialchars($modulo->ID_MODULO) ?></td>
                    <td><?= htmlspecialchars($modulo->NOMBRE_MODULO) ?></td>
                    <td>
                        <a href="/modulos/edit/<?= $modulo->ID_MODULO ?>" class="btn btn-primary">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
