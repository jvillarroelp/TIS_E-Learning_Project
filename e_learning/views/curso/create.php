<?php include('../components/header.php'); ?>

    
    <div class="contenedor">
        <div class="ps-5">

            <div class="container mt-4">
                <div class="titulo pt-3 pb-3">
                    Creación de curso
                </div>
                <form action="" method="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Codigo curso</label>
                        <input type="text" name="titulo" id="titulo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Nombre</label>
                        <input type="text" name="titulo" id="titulo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="vigente">Vigente</option>
                            <option value="terminado">Terminado</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="correo" class="form-label">Fecha de inicio</label>
                        <input type="date" name="correo" id="correo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Fecha de finzalizacion</label>
                        <input type="date" name="correo" id="correo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="4"></textarea>
                    </div>


                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>

        </div>
    </div>
