<h1>Mis Cursos Inscritos</h1>

<?php if (empty($cursos)): ?>
    <p>No tienes cursos inscritos. <a href="/cursos">Ver cursos disponibles</a></p>
<?php else: ?>
    <?php foreach ($cursos as $curso): ?>
        <div class="curso-item">
            <h3><?= $curso->NOMBRE_CURSO ?></h3>
            <p><?= $curso->DESCRIPCION_CURSO ?></p>
            <a href="/curso/<?= $curso->COD_CURSO ?>" class="btn-ver-mas">Ver más</a>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
