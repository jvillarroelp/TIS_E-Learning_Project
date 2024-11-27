<!-- /views/login_view.php -->
<?php include('components/header.php'); ?>
<div class="container mt-5">
        <h2 class="text-center mb-4">Iniciar Sesión</h2>

        <?php
        // Muestra mensaje de error si existe
        if (isset($_GET['error'])) {
            echo '<div class="alert alert-danger" role="alert">Credenciales incorrectas. Intenta nuevamente.</div>';
        }
        ?>

        <!-- Formulario de inicio de sesión con clases de Bootstrap -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="../modules/login.php" method="POST" class="p-4 border rounded shadow-sm bg-light">
                    <div class="mb-3">
                        <label for="rut_usuario" class="form-label">RUT:</label>
                        <input type="text" class="form-control" name="rut_usuario" required>
                    </div>

                    <div class="mb-3">
                        <label for="contrasenia" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" name="contrasenia" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
