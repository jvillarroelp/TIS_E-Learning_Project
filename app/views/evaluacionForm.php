

<?php $form = \app\core\form\Form::begin('', "post"); ?>

<!-- Campo para el nombre de la evaluación -->
<?php echo $form->field($model, 'NOMBRE_EVALUACION') ?>
<?php echo $form->field($model, 'COD_EVALUACION') ?>
<?php echo $form->field($model, 'FECHA_DIAGNOSTICO') ?>
<?php echo $form->field($model, 'DESCRIPCION_EVALUACION') ?>

<input type="hidden" name="COD_CURSO" value="<?= $model->COD_CURSO ?>">


<button type="submit" class="btn btn-primary">Guardar Evaluación</button>

<?php \app\core\form\Form::end(); ?>
