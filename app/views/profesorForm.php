<h1>Registrar Profesor</h1>

<?php $form = \app\core\form\Form::begin('', "post"); ?>

<?php echo $form->field($model, 'ESPECIALIDAD') ?>


<button type="submit" class="btn btn-primary w-100">Registrar</button>

<?php \app\core\form\Form::end(); ?>
