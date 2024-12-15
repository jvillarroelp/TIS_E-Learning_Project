<section class="categories-section">
    <div class="container">
        <div class="categories__header text-center pt-5">
            <h1>CURSOS DISPONIBLES</h1>
            <p class="pt-3">
                Explora nuestras áreas de aprendizaje y encuentra la que mejor se adapte a tus intereses.
            </p>
        </div>

        <div class="row g-4">
            <?php if (!empty($cursos)) : ?>
                <?php foreach ($cursos as $curso) : ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($curso->NOMBRE_CURSO); ?></h5>
                                <p class="card-text">
                                    Estado: <?= htmlspecialchars($curso->ESTADO); ?><br>
                                    Fecha de inicio: <?= htmlspecialchars($curso->FECHA_INICIO); ?>
                                </p>
                                <a href="/realizas?COD_CURSO=<?= $curso->COD_CURSO ?>" class="btn btn-success">Ver más</a>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-center">No hay cursos disponibles en este momento.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
