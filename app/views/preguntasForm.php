

<?php $form = \app\core\form\Form::begin('', "post"); ?>

<!-- Campo para el nombre de la evaluación -->
<?php echo $form->field($model, 'PREGUNTA') ?>
<?php echo $form->field($model, 'COMENTARIO') ?>
<?php echo $form->field($model, 'TIPO_PREGUNTA') ?>
<?php echo $form->field($model, 'RESPUESTA_CORRECTA') ?>
<?php echo $form->field($model, 'ALTERNATIVA') ?>
<?php echo $form->field($model, 'FECHA_PREGUNTA') ?>


<input type="hidden" name="COD_EVALUACION" value="<?= $model->COD_EVALUACION ?>">


<button type="submit" class="btn btn-primary">Guardar Evaluación</button>

<?php \app\core\form\Form::end(); ?>
