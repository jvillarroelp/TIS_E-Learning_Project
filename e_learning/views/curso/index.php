<!-- Planilla HTML como boceto para trabajar con extensión Live Preview y luego añadirlo al archivo .PHP -->

<?php include('../components/header.php'); ?>
  
    <div class="contenedor">
        <div class="ps-5">
            <h4 class="mt-4">Curso</h4>
            <div class="buscador d-flex flex-wrap justify-content-between align-items-center mb-4">
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <form class="d-flex">
                            <input class="form-control me-2 col-md-8" type="search" placeholder="Buscar"
                                aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>
                </nav>
                <nav class="pe-4">
                    <button class="btn btn-info ms-3" type="submit"><i class="uil uil-window-grid"></i></button>
                    <button class="btn btn-info" type="submit"><i class="uil uil-list-ul"></i></button>
                </nav>

            </div>
            <div class="pb-3">
                <a href="create.php" class="btn btn-success">Crear Curso</a>
              
            </div>


        </div>
        <div class="lista-cursos ps-5 pe-5">
            <!-- Columna de Clientes -->
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Codigo curso</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha de finalización</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>101</td>
                            <td>Gestión de Inventarios</td>
                            <td>Activo</td>
                            <td>01/12/2024</td>
                            <td>01/02/2025</td>
                            <td>Curso enfocado en optimizar el control y gestión de inventarios en pequeñas y medianas
                                empresas, utilizando software especializado y técnicas de logística.</td>
                            <td>
                                <a href="" class="btn btn-warning">Editar</a>
                                <form action="" method="">
                                    <button type="submit"
                                        onclick="return confirm('¿Estas seguro de borrar este registro?')"
                                        class="btn btn-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>102</td>
                            <td>Marketing Digital para PyMEs</td>
                            <td>Activo</td>
                            <td>10/12/2024</td>
                            <td>10/01/2025</td>
                            <td>Aprende a crear campañas de marketing digital efectivas para pequeñas y medianas
                                empresas, incluyendo SEO, SEM y redes sociales.</td>
                            <td>
                                <a href="" class="btn btn-warning">Editar</a>
                                <form action="" method="">
                                    <button type="submit"
                                        onclick="return confirm('¿Estas seguro de borrar este registro?')"
                                        class="btn btn-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>103</td>
                            <td>Finanzas para Emprendedores</td>
                            <td>Inactivo</td>
                            <td>15/11/2024</td>
                            <td>15/12/2024</td>
                            <td>Curso diseñado para enseñar a emprendedores y pequeñas empresas a gestionar sus
                                finanzas, entender estados financieros y optimizar su flujo de caja.</td>
                            <td>
                                <a href="" class="btn btn-warning">Editar</a>
                                <form action="" method="">
                                    <button type="submit"
                                        onclick="return confirm('¿Estas seguro de borrar este registro?')"
                                        class="btn btn-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>105</td>
                            <td>Atención al Cliente para Empresas</td>
                            <td>Activo</td>
                            <td>01/02/2025</td>
                            <td>01/04/2025</td>
                            <td>Curso que enseña las mejores prácticas en atención al cliente, con un enfoque en mejorar
                                la experiencia de los consumidores en pequeñas y medianas empresas.</td>
                            <td>
                                <a href="" class="btn btn-warning">Editar</a>
                                <form action="" method="">
                                    <button type="submit"
                                        onclick="return confirm('¿Estas seguro de borrar este registro?')"
                                        class="btn btn-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>106</td>
                            <td>Transformación Digital en PyMEs</td>
                            <td>Activo</td>
                            <td>20/12/2024</td>
                            <td>20/02/2025</td>
                            <td>Curso enfocado en la adopción de nuevas tecnologías para mejorar procesos, productividad
                                y competitividad de las pequeñas y medianas empresas.</td>
                            <td>
                                <a href="/../../curso/create.html" class="btn btn-warning">Editar</a>
                                <form action="" method="">
                                    <button type="submit"
                                        onclick="return confirm('¿Estas seguro de borrar este registro?')"
                                        class="btn btn-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

          