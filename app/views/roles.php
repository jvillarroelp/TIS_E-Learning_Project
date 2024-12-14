<h3 class="mt-5">Crear Rol</h3>

<?php $form = \app\core\form\Form::begin('', "post"); ?>
<div class="row">
    <div class="col">
      <?php echo $form->field($model, 'NOMBRE_ROL') ?>  
    </div>
    <div class="col">

    </div>

</div>


<button type="submit" class="btn btn-primary mt-3">Enviar</button>

<?php \app\core\form\Form::end(); ?>