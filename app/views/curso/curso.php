<?php use app\core\form\Form; ?>

<h1>Crear Curso</h1>

<?php $form = Form::begin('', 'post'); ?>

<?php echo $form->field($model, 'NOMBRE_CURSO'); ?>
<?php echo $form->field($model, 'FECHA_INICIO')->dateField(); ?>
<?php echo $form->field($model, 'FECHA_FIN')-> dateField(); ?>
<?php echo $form->field($model, 'ESTADO'); ?>
<?php echo $form->field($model, 'DESCRIPCION_CURSO'); ?>

&nbsp;<br><br> 

<button type="submit" class="btn btn-primary">Crear Curso</button>

<?php Form::end(); ?>
