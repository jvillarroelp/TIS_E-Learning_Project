<h3>Crear Rol</h3>

<?php $form = \app\core\form\Form::begin('', "post"); ?>

<?php echo $form->field($model, 'NOMBRE') ?>

<button type="submit" class="btn btn-primary w-100">Enviar</button>

<?php \app\core\form\Form::end(); ?>