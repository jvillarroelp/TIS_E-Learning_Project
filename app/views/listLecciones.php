<h1>Lista de Módulos</h1>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre de la leccion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($lecciones)): ?>
            <tr>
                <td colspan="3">No hay módulos disponibles.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($lecciones as $leccion): ?>
                <tr>
                    <td><?= htmlspecialchars($leccion->ID_LECCION) ?></td>
                    <td><?= htmlspecialchars($leccion->NOMBRE_LECCION) ?></td>

                    <td>
                        <!-- Formulario para eliminar un rol -->
                        <form action="/deleteLeccion" method="post" style="display:inline;">
                            <input type="hidden" name="ID_LECCION" value="<?= htmlspecialchars($leccion->ID_LECCION) ?>" />
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>

                    <td>
                        <!-- Modificar este enlace para enviar el COD_CURSO -->
                        <a href="/contenidos/create?ID_LECCION=<?= $leccion->ID_LECCION ?>" class="btn btn-primary">
                            Crear Contenido
                        </a>
                    </td>
                    <td>
                    <a href="/recursos/create?ID_LECCION=<?= $leccion->ID_LECCION ?>" class="btn btn-primary">
    Crear Recursos
</a>

                    </td>





                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>