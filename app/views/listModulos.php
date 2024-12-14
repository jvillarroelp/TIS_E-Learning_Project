<h1>Lista de Módulos</h1>
<a href="/modulos" class="btn btn-success mt-3 mb-3">Creal Modulos</a>
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
                        <!-- Formulario para eliminar un rol -->
                        <form action="/deleteModulo" method="post" style="display:inline;">
                            <input type="hidden" name="ID_MODULO" value="<?= $modulo->ID_MODULO ?>" />
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a href="/modulos/edit/<?= $modulo->ID_MODULO ?>" class="btn btn-primary">Editar</a>
                    </td>

                    <td>
                        <!-- Modificar este enlace para enviar el COD_CURSO -->
                        <a href="/lecciones/create?ID_MODULO=<?= $modulo->ID_MODULO ?>" class="btn btn-primary">
                            Crear Leccion
                        </a>
                    </td>

                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>