<?php include('../components/header.php'); ?>

<div class="contenedor" style="min-height: 100vh; position: relative;">
    <div class="row g-0">
        <!-- Columna principal (col-md-8) -->
        <div class="col-md-8">
            <!-- Título de Mi aprendizaje -->
            <div class="section d-flex align-items-center ps-5 mt-5">
                <i class="uil uil-book-open me-2" style="font-size: 2rem;"></i>
                <h4 class="mb-0">Mi aprendizaje</h4>
            </div>

            <!-- Contenido en progreso -->
            <div class="ps-5">
                <h4 class="mt-4">En progreso</h4>
                <div class="buscador d-flex flex-wrap justify-content-between align-items-center mb-4">
                    <nav class="navbar navbar-light bg-light">
                        <div class="container-fluid">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Buscar</button>
                            </form>
                        </div>
                    </nav>
                    <nav class="pe-4">
                        <button class="btn btn-info ms-3" type="submit"><i class="uil uil-window-grid"></i></button>
                        <button class="btn btn-info" type="submit"><i class="uil uil-list-ul"></i></button>
                    </nav>
                </div>


                <div class="row row-cols-1 row-cols-md-3 g-4 pe-4">
                    <div class="col">
                        <div class="card">
                            <img src="../../images/img4.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="../../images/img4.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="../../images/img4.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="../../images/img4.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logros (col-md-4) -->
        <div class="col-md-4" style="background-color: #f0f0f0; min-height: 100%; position: absolute; right: 0; top: 0;">
            <section class="cuerpo p-4 pt-5 ">
                <h3>LOGROS</h3>
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <img src="../../images/img4.jpg" alt="..." width="60px" height="60px">
                    </div>
                    <div class="flex-grow-1 ms-3 pe-3">
                        <p>This is some content from a media component.</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>