
<h3 class="mt-5">Crear Módulo</h3>

<?php $form = \app\core\form\Form::begin('', "post"); ?>

<div class="row">
    <div class="col">
        <?= $form->field($model, 'NOMBRE_MODULO') ?>  <!-- Campo para el nombre del módulo -->
    </div>
</div>

<!-- Campo oculto para el COD_CURSO, para que se envíe con el formulario -->
<input type="hidden" name="COD_CURSO" value="<?= $model->COD_CURSO ?>">

<button type="submit" class="btn btn-primary mt-3">Enviar</button>

<?php \app\core\form\Form::end(); ?>
