
<h3 class="mt-5">Crear Módulo</h3>

<?php $form = \app\core\form\Form::begin('', "post"); ?>

<div class="row">
    <div class="col">
        <?= $form->field($model, 'NOMBRE_LECCION') ?>  <!-- Campo para el nombre del módulo -->
    </div>
</div>

<input type="hidden" name="ID_MODULO" value="<?= $model->ID_MODULO ?>">

<button type="submit" class="btn btn-primary mt-3">Enviar</button>

<?php \app\core\form\Form::end(); ?>
