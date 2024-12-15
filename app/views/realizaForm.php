<div class="contenedor" style="min-height: 100vh; position: relative;">
    <div class="row g-0">
        <!-- Columna principal -->
        <div class="col-md-8 p-4">
            <!-- Título del curso -->
            <section class="d-flex align-items-center mb-4">
                <i class="uil uil-book-open me-2" style="font-size: 2rem;"></i>
                <h4 class="mb-0"><?= htmlspecialchars($curso->NOMBRE_CURSO) ?></h4>
            </section>
            <!-- Formulario de inscripción -->
            <form action="/realiza/inscribirseCurso?COD_CURSO=<?= $curso->COD_CURSO ?>" method="POST">
                <button type="submit" class="btn btn-primary">Inscribirse</button>
            </form>

            <!-- Contenido principal -->
            <section>
                <div class="titulo pb-3">
                    <h5>Descripción general</h5>
                </div>
                <p>
                    <?= htmlspecialchars($curso->DESCRIPCION_CURSO) ?>
                </p>
            </section>

            <!-- Acordeón -->
            <section>
                <div class="accordion" id="accordionExample">
                    <?php foreach ($modulos as $modulo): ?>
                        <!-- Item del módulo -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?= $modulo->ID_MODULO ?>">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $modulo->ID_MODULO ?>" aria-expanded="false" aria-controls="collapse<?= $modulo->ID_MODULO ?>">
                                    Módulo: <?= htmlspecialchars($modulo->NOMBRE_MODULO) ?>
                                </button>
                            </h2>
                            <div id="collapse<?= $modulo->ID_MODULO ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $modulo->ID_MODULO ?>" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul>
                                        <!-- Mostrar las lecciones del módulo actual -->
                                        <?php 
                                        $leccionesModulo = array_filter($lecciones, fn($leccion) => $leccion->ID_MODULO == $modulo->ID_MODULO);
                                        if (!empty($leccionesModulo)): 
                                        ?>
                                            <?php foreach ($leccionesModulo as $leccion): ?>
                                                <li><?= htmlspecialchars($leccion->NOMBRE_LECCION) ?></li>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <li>No hay lecciones disponibles para este módulo.</li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>

        <!-- Columna lateral -->
        <div class="col-md-4 bg-light p-4">
            <section class="text-center">
                <div>
                    <img src="../../images/img4.jpg" alt="..." class="img-fluid mb-4 rounded">
                </div>
                <ul class="list-unstyled">
                    <li class="mb-3 d-flex align-items-center">
                        <i class="uil uil-calender me-2"></i>
                        <p class="mb-0">Fecha de inicio: <?= htmlspecialchars($curso->FECHA_INICIO) ?></p>
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <i class="uil uil-calender me-2"></i>
                        <p class="mb-0">Fecha de finalización: <?= htmlspecialchars($curso->FECHA_FIN) ?></p>
                    </li>
                    <li class="d-flex align-items-center">
                        <i class="uil uil-caret-right me-2"></i>
                        <p class="mb-0">Estado: <?= htmlspecialchars($curso->ESTADO) ?></p>
                    </li>
                </ul>
            </section>
        </div>
    </div>
</div>
