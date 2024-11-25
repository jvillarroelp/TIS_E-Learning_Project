<?php include('../components/header.php'); ?>
<div class="contenedor" style="min-height: 100vh; position: relative;">
    <div class="row g-0">
        <!-- Columna principal (col-md-8) -->
        <div class="col-md-8">
            <!-- Título de Mi aprendizaje -->
            <div class="section d-flex align-items-center ps-5 mt-5">
                <i class="uil uil-book-open me-2" style="font-size: 2rem;"></i>
                <h4 class="mb-0">Titulo Curso</h4>
            </div>

            <!-- Contenido en progreso -->
            <div class="ps-5 pe-5">
                <p class="mt-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias labore placeat hic temporibus minus atque obcaecati tempore ullam odio quaerat. Voluptatem cum vel rerum quos dolorum laboriosam accusamus, odio alias officia corrupti expedita rem repellendus animi unde fugit. Quas ea vero adipisci expedita corporis dolor necessitatibus eaque veritatis fugit dolore ut, sapiente esse cumque quis sunt ipsam eius aliquam dolorem itaque nobis fuga distinctio. Voluptatum commodi fugiat natus consectetur amet.</p>
                <div class="titulo pb-4 pt-5">
                   <h3>Descripcion general</h3>   
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae facere deserunt laborum qui? Repudiandae similique ducimus adipisci modi ipsa? Doloribus laboriosam ipsum autem explicabo eligendi dolor saepe hic eius. Soluta, ad. Nobis cumque animi dolorum? Repellat labore, placeat quisquam atque dolorum dicta numquam odit dolorem velit blanditiis, excepturi repudiandae aspernatur omnis. Temporibus aliquid inventore nemo totam amet. Nobis cupiditate fuga ipsa, possimus, architecto praesentium deleniti saepe recusandae atque rem ea. Repudiandae molestias dolore ab qui eos? Maxime velit quo numquam perferendis! Et, saepe minima! Quod voluptatum commodi fuga ipsa eaque porro reiciendis, officiis laudantium dignissimos aliquam culpa excepturi perferendis! Porro!</p>
            </div>

            <div class="accordion p-5" id="accordionExample">
                <!-- Primer item del acordeón -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Accordion Item #1
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul>
                                <li>Introduccion</li>
                                <li>Desarrollo</li>
                                <li>Intermedio</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Accordion Item #2
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul>
                                <li>Introduccion</li>
                                <li>Desarrollo</li>
                                <li>Intermedio</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Accordion Item #3
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul>
                                <li>Introduccion</li>
                                <li>Desarrollo</li>
                                <li>Intermedio</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-4" style="background-color: #f0f0f0; min-height: 100%; position: absolute; right: 0; top: 0;">
            <section class="cuerpo p-4 pt-5">
                <div class="cotenedor pt-5">
                    <div class="align-items-center">
                        <div>
                            <img src="../../images/img4.jpg" alt="..." width="100%" height="100%">
                        </div>

                        <!-- Ícono de calendario debajo de la imagen -->


                        <!-- Fila de 4 íconos debajo del calendario -->
                        <ul class="pt-5">
                            <li>
                                <i class="uil uil-calender"></i>
                                <p>Fecha de inicio: 24-11-2024</p>
                            </li>
                            <li>
                                <i class="uil uil-calender"></i>
                                <p>Fecha de finalizacion: 24-11-2024</p>
                            </li>
                            <li>
                                <i class="uil uil-caret-right"></i>
                                <p>Estado: Vigente</p>
                            </li>


                        </ul>
                    </div>
                </div>
            </section>
        </div>

    </div>
</div>