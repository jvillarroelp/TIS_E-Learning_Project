

<?php $form = \app\core\form\Form::begin('', "post"); ?>

<?php echo $form->field($model, 'RUT_USUARIO') ?>
<?php echo $form->field($model, 'NOMBRE') ?>
<?php echo $form->field($model, 'CORREO') ?>
<?php echo $form->field($model, 'REGION') ?>
<?php echo $form->field($model, 'COMUNA') ?>
<?php echo $form->field($model, 'CONTRASENIA')->passwordField() ?>
<?php echo $form->field($model, 'confirmPassword')->passwordField() ?>

<button type="submit" class="btn btn-primary w-100">Enviar</button>

<?php \app\core\form\Form::end(); ?>
