<?php use app\core\form\Form; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header text-white text-center" style="background-color: #2e3267;">
                    <h2>Registro</h2>
                </div>
                <div class="card-body">
                    <?php $form = Form::begin('', "post"); ?>

                    <div class="mb-3">
                        <?php echo $form->field($model, 'RUT_USUARIO'); ?>
                    </div>
                    <div class="mb-3">
                        <?php echo $form->field($model, 'NOMBRE'); ?>
                    </div>
                    <div class="mb-3">
                        <?php echo $form->field($model, 'CORREO'); ?>
                    </div>
                    <div class="mb-3">
                        <?php echo $form->field($model, 'REGION'); ?>
                    </div>
                    <div class="mb-3">
                        <?php echo $form->field($model, 'COMUNA'); ?>
                    </div>
                    <div class="mb-3">
                        <?php echo $form->field($model, 'CONTRASENIA')->passwordField(); ?>
                    </div>
                    <div class="mb-3">
                        <?php echo $form->field($model, 'confirmPassword')->passwordField(); ?>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn text-white" style="background-color: #2e3267;">Enviar</button>
                    </div>

                    <?php Form::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
