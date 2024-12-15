

<?php $form = \app\core\form\Form::begin('', "post"); ?>

<!-- Campo para el nombre de la evaluación -->
<?php echo $form->field($model, 'RESPUESTA') ?>
<?php echo $form->field($model, 'FECHA_RESPUESTA') ?>



<input type="hidden" name="ID_PREGUNTA" value="<?= $model->ID_PREGUNTA ?>">


<button type="submit" class="btn btn-primary">Guardar Evaluación</button>

<?php \app\core\form\Form::end(); ?>
