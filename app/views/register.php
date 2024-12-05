

<?php $form = \app\core\form\Form::begin('', "post"); ?>

<?php echo $form->field($model, 'rut') ?>
<?php echo $form->field($model, 'nombre') ?>
<?php echo $form->field($model, 'apellido') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'region') ?>
<?php echo $form->field($model, 'comuna') ?>
<?php echo $form->field($model, 'password')->passwordField() ?>
<?php echo $form->field($model, 'confirmPassword')->passwordField() ?>

<button type="submit" class="btn btn-primary w-100">Enviar</button>

<?php \app\core\form\Form::end(); ?>
