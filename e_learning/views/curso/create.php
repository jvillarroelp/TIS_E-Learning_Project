<?php include('../components/header.php'); ?>

<div class="container mt-4">
    <form action="/modules/course.php" method="POST" enctype="multipart/form-data" class="form">
        <!-- Paso 1: Información del Curso -->
        <div class="step">
            <h3>Información del Curso</h3>
            <div class="mb-3">
                <label for="COD_CURSO" class="form-label">Código curso</label>
                <input type="text" name="COD_CURSO" id="COD_CURSO" class="form-control">
            </div>
            <div class="mb-3">
                <label for="NOMBRE_CURSO" class="form-label">Nombre</label>
                <input type="text" name="NOMBRE_CURSO" id="NOMBRE_CURSO" class="form-control">
            </div>
            <div class="mb-3">
                <label for="ESTADO" class="form-label">Estado</label>
                <select name="ESTADO" id="ESTADO" class="form-select">
                    <option value="vigente">Vigente</option>
                    <option value="terminado">Terminado</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="FECHA_INICIO" class="form-label">Fecha de inicio</label>
                <input type="date" name="FECHA_INICIO" id="FECHA_INICIO" class="form-control">
            </div>

            <!-- Campo Fecha de finalización -->
            <div class="mb-3">
                <label for="FECHA_FIN" class="form-label">Fecha de finalización</label>
                <input type="date" name="FECHA_FIN" id="FECHA_FIN" class="form-control">
            </div>

            <!-- Campo Descripción -->
            <div class="mb-3">
                <label for="DESCRIPCION_CURSO" class="form-label">Descripción</label>
                <textarea name="DESCRIPCION_CURSO" id="DESCRIPCION_CURSO" class="form-control" rows="4"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
