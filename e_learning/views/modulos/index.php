<?php include('../components/header.php'); ?>

<div class="contenedor">
    <div class="ps-5">
        <h4 class="mt-4">Modulos</h4>
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
            <nav class="pe-5">
                <button class="btn btn-info ms-3" type="submit"><i class="uil uil-window-grid"></i></button>
                <button class="btn btn-info" type="submit"><i class="uil uil-list-ul"></i></button>
            </nav>

        </div>
        <div class="pb-3">
            <a href="create.php" class="btn btn-success">Crear Modulo</a>

        </div>


    </div>
    <div class="lista-cursos ps-5 pe-5">
        <!-- Columna de Clientes -->
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Acciones</th>


                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>101</td>
                        <td>Gestión de Inventarios</td>


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