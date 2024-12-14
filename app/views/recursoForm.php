<h3 class="mt-5">Crear Recursos</h3>

<?php $form = \app\core\form\Form::begin('', "post"); ?>

<?= $form->field($model, 'COD_RECURSO') ?>
<?= $form->field($model, 'NOMBRE_RECURSO') ?> 
<?= $form->field($model, 'TIPO_RECURSO') ?>
<?= $form->field($model, 'DESCRIPCION_RECURSO') ?>


<!-- Campo oculto para el COD_CURSO, para que se envíe con el formulario -->
<input type="hidden" name="ID_LECCION" value="<?= $model->ID_LECCION ?>">
<button type="submit" class="btn btn-primary mt-3">Enviar</button>

<?php \app\core\form\Form::end(); ?>