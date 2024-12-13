
<h3 class="mt-5">Crear Contenido</h3>

<?php $form = \app\core\form\Form::begin('', "post"); ?>


        <?= $form->field($model, 'TITULO_CONTENIDO') ?>  <!-- Campo para el nombre del módulo -->
    
        <?= $form->field($model, 'SUB_TITULO') ?>  <!-- Campo para el nombre del módulo -->
    
        <?= $form->field($model, 'CUERPO_CONTENIDO') ?>  <!-- Campo para el nombre del módulo -->
    
        <?= $form->field($model, 'CREACION_CONTENIDO') ?>  <!-- Campo para el nombre del módulo -->
  

<!-- Campo oculto para el COD_CURSO, para que se envíe con el formulario -->
<input type="hidden" name="ID_LECCION" value="<?= $model->ID_LECCION ?>">

<button type="submit" class="btn btn-primary mt-3">Enviar</button>

<?php \app\core\form\Form::end(); ?>
