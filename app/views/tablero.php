<div class="container my-4">
    <h1 class="text-center mb-4">Mis Cursos Inscritos</h1>

    <?php if (empty($cursos)): ?>
        <div class="card text-center">
            <div class="card-body">
                <p class="card-text">No tienes cursos inscritos. <a href="/cursos" class="btn btn-primary">Ver cursos disponibles</a></p>
            </div>
        </div>
    <?php else: ?>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php foreach ($cursos as $curso): ?>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $curso->NOMBRE_CURSO ?></h5>
                            <p class="card-text"><?= $curso->FECHA_INICIO ?></p>
                            <p class="card-text"><?= $curso->FECHA_FIN ?></p>

                        </div>
                        <div class="card-footer text-end">
                        <a href="/esquema?COD_CURSO=<?= urlencode($curso->COD_CURSO) ?>">Ver </a>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

