<?php include('../components/header.php'); ?>

<div class="container mt-4">
    <!-- Formulario paso a paso -->
    <form id="courseForm" method="POST" enctype="multipart/form-data">
        <!-- Paso 1: Crear curso -->
        <div id="step1" class="step">
            <h3>Información del Curso</h3>
            <div class="mb-3">
                <label for="codigo_curso" class="form-label">Código curso</label>
                <input type="text" name="codigo_curso" id="codigo_curso" class="form-control">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control">
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-select">
                    <option value="vigente">Vigente</option>
                    <option value="terminado">Terminado</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
            </div>

            <!-- Campo Fecha de finalización -->
            <div class="mb-3">
                <label for="fecha_fin" class="form-label">Fecha de finalización</label>
                <input type="date" name="fecha_fin" id="fecha_fin" class="form-control">
            </div>

            <!-- Campo Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="4"></textarea>
            </div>
            <button type="button" class="btn btn-primary" onclick="nextStep(2)">Siguiente</button>
        </div>

        <!-- Paso 2: Crear módulos -->
        <div id="step2" class="step" style="display:none;">
            <h3>Módulos del Curso</h3>
            <div class="mb-3">
                <label for="modulo" class="form-label">Módulo 1</label>
                <input type="text" name="modulo[]" class="form-control">
            </div>
            <div class="mb-3">
                <button type="button" class="btn btn-success" onclick="addModule()">Agregar Módulo</button>
            </div>
            <button type="button" class="btn btn-secondary" onclick="prevStep(1)">Anterior</button>
            <button type="button" class="btn btn-primary" onclick="nextStep(3)">Siguiente</button>
        </div>

        <!-- Paso 3: Crear lecciones -->
        <div id="step3" class="step" style="display:none;">
            <h3>Lecciones del Curso</h3>
            <div class="mb-3">
                <label for="leccion" class="form-label">Lección 1</label>
                <input type="text" name="leccion[]" class="form-control">
            </div>
            <div class="mb-3">
                <button type="button" class="btn btn-success" onclick="addLesson()">Agregar Lección</button>
            </div>
            <button type="button" class="btn btn-secondary" onclick="prevStep(2)">Anterior</button>
            <button type="button" class="btn btn-primary" onclick="nextStep(4)">Siguiente</button>
        </div>

        <!-- Paso 4: Añadir contenido de la lección -->
        <div id="step4" class="step" style="display:none;">
            <h3>Contenido de la Lección</h3>
            <div class="mb-3">
                <label for="titulo_contenido" class="form-label">Título del Contenido</label>
                <input type="text" name="titulo_contenido" id="titulo_contenido" class="form-control">
            </div>

            <!-- Subtítulo -->
            <div class="mb-3">
                <label for="sub_titulo" class="form-label">Subtítulo</label>
                <input type="text" name="sub_titulo" id="sub_titulo" class="form-control">
            </div>

            <!-- Cuerpo del Contenido -->
            <div class="mb-3">
                <label for="cuerpo_contenido" class="form-label">Cuerpo del Contenido</label>
                <textarea name="cuerpo_contenido" id="cuerpo_contenido" class="form-control" rows="4"></textarea>
            </div>

            <!-- Botón para agregar contenido dinámicamente (si se desea agregar más contenido) -->
            <div class="mb-3">
                <button type="button" class="btn btn-success" onclick="addContent()">Agregar Más Contenido</button>
            </div>

            
            <button type="button" class="btn btn-secondary" onclick="prevStep(3)">Anterior</button>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
</div>

<script>
    // Función para avanzar entre pasos
    function nextStep(step) {
        // Ocultar el paso actual
        document.getElementById('step' + (step - 1)).style.display = 'none';
        // Mostrar el siguiente paso
        document.getElementById('step' + step).style.display = 'block';
    }

    // Función para retroceder entre pasos
    function prevStep(step) {
        // Ocultar el paso actual
        document.getElementById('step' + (step + 1)).style.display = 'none';
        // Mostrar el paso anterior
        document.getElementById('step' + step).style.display = 'block';
    }

    // Función para agregar más módulos dinámicamente
    function addModule() {
        const moduleField = document.createElement('div');
        moduleField.classList.add('mb-3');
        moduleField.innerHTML = '<label for="modulo" class="form-label">Módulo</label><input type="text" name="modulo[]" class="form-control">';
        document.querySelector('#step2 .mb-3').appendChild(moduleField);
    }

    // Función para agregar más lecciones dinámicamente
    function addLesson() {
        const lessonField = document.createElement('div');
        lessonField.classList.add('mb-3');
        lessonField.innerHTML = '<label for="leccion" class="form-label">Lección</label><input type="text" name="leccion[]" class="form-control">';
        document.querySelector('#step3 .mb-3').appendChild(lessonField);
    }

   function addContent() {
        const contentField = document.createElement('div');
        contentField.classList.add('mb-3');
        contentField.innerHTML = `
            <div class="mb-3">
                <label for="titulo_contenido" class="form-label">Título del Contenido</label>
                <input type="text" name="titulo_contenido[]" class="form-control">
            </div>
            <div class="mb-3">
                <label for="sub_titulo" class="form-label">Subtítulo</label>
                <input type="text" name="sub_titulo[]" class="form-control">
            </div>
            <div class="mb-3">
                <label for="cuerpo_contenido" class="form-label">Cuerpo del Contenido</label>
                <textarea name="cuerpo_contenido[]" class="form-control" rows="4"></textarea>
            </div>
        `;
        document.querySelector('#step4').appendChild(contentField);
    }
</script>