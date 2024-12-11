<?php $form = \app\core\form\Form::begin('', "post"); ?>

<!-- Campo para el nombre de la lección -->
<?php echo $form->field($model, 'NOMBRE_LECCION') ?>

<!-- Campo para el ID del módulo -->
<?php echo $form->field($model, 'ID_MODULO') ?>

<!-- Botón de enviar -->
<button type="submit" class="btn btn-primary">Guardar Lección</button>

<?php \app\core\form\Form::end(); ?>
