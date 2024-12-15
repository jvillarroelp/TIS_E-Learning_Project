<div class="container-fluid">
    <div class="row">
        <!-- Columna izquierda: Esquema -->
        <div class="col-md-4 bg-light border-end vh-100 overflow-auto">
            <h5 class="mt-3">Esquema del Curso</h5>
            <ul class="list-group">
                <?php foreach ($esquema as $item): ?>
                    <!-- Módulo -->
                    <li class="list-group-item">
                        <strong>Módulo: <?= htmlspecialchars($item['modulo']->NOMBRE_MODULO) ?></strong>
                        <ul class="list-group mt-2">
                            <?php foreach ($item['lecciones'] as $leccion): ?>
                                <!-- Lección -->
                                <li class="list-group-item">
                                    Lección: <?= htmlspecialchars($leccion->NOMBRE_LECCION) ?>
                                    <ul class="list-group mt-2">
                                        <?php foreach ($leccion->contenidos as $contenido): ?>
                                            <!-- Contenido -->
                                            <li class="list-group-item">
                                                <?= htmlspecialchars($contenido->NOMBRE_CONTENIDO) ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Columna derecha: Contenido principal -->
        <div class="col-md-8 vh-100 overflow-auto">
            <div id="contenido-principal">
                <h5 class="mt-3">Evaluación</h5>
                <?php if ($evaluacion): ?>
                    <p>Detalles de la evaluación:</p>
                    <ul>
                        <li>Nombre: <?= htmlspecialchars($evaluacion->NOMBRE_EVALUACION) ?></li>
                        <li>Descripción: <?= htmlspecialchars($evaluacion->DESCRIPCION) ?></li>
                    </ul>
                <?php else: ?>
                    <p>No hay evaluación disponible para este curso.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
