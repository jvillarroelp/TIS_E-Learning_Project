<h3 class="mt-5">Crear Permiso</h3>

<?php $form = \app\core\form\Form::begin('', "post"); ?>

      <?php echo $form->field($model, 'NOMBRE_PERMISO') ?>  


<button type="submit" class="btn btn-primary mt-3">Enviar</button>

<?php \app\core\form\Form::end(); ?>