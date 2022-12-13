<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link rel="stylesheet" href="css/heading.css">
    <link rel="icon" href="assets/iconfullRed.ico">
    <title>Reporte 17 puntos</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Barra de navegacion con bootstrap -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/logo.png" alt="Logotipo bellota" height="36">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Enlace </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menú despegable
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Accion 1 </a></li>
                            <li><a class="dropdown-item" href="#">Accion 2 </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Otra opcion dividida </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Barra de navegacion con bootstrap -->

    <div class="d-flex flex-column" style="padding: 5rem;">
        <div class="one" style="padding: 10px">
            <h3> INSPECCIONES DE SEGURIDAD Y AGRÍCOLAS SISTEMÁTICAS DE CTPAT/OEA DE 17 PUNTOS</h3>
        </div>
        <!-- Inicio del formulario -->
        <form id="form" enctype="multipart/form-data">
            <!-- Campos para la cabecera -->
            <div class="row g-3">
                <div class="col-md">
                    <div class="form-floating mb-3">
                        <input id="fecha" type="date" class="form-control" placeholder="Fecha" aria-label="Fecha">
                        <label>Fecha actual</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating mb-3">
                        <input id="hEntrada" type="time" class="form-control" placeholder="Hora de entrada" aria-label="Hora de entrada">
                        <label>Hora de entrada</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating mb-3">
                        <input id="hSalida" type="time" class="form-control" placeholder="Hora de salida" aria-label="Hora de salida">
                        <label>Hora de salida</label>
                    </div>
                </div>
            </div>


            <div class="row g-3">
                <div class="col-md">
                    <div class="form-floating mb-3">
                        <input id="pOrigen" type="text" class="form-control" placeholder="Puerto de origen" aria-label="Puerto de origen">
                        <label>Puerto de origen</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating mb-3">
                        <input id="pProced" type="text" class="form-control" placeholder="Puerto de procedencia" aria-label="Puerto de procedencia">
                        <label>Puerto de procedencia</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating mb-3">
                        <input id="pDest" type="text" class="form-control" placeholder="Puerto de destino" aria-label="Puerto de destino">
                        <label>Puerto de destino</label>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-box2-fill"></i></span>
                <div class="form-floating">
                    <input id="tMerca" type="text" class="form-control" placeholder="Tipo de mercancia" aria-label="Tipo de mercancia">
                    <label>Tipo de mercancia</label>
                </div>
                <span class="input-group-text"><i class="bi bi-buildings-fill"></i></span>
                <div class="form-floating ">
                    <input id="nEmpre" type="text" class="form-control" placeholder="Nombre de la empresa de transporte" aria-label="Nombre de la empresa de transporte" required>
                    <label>Nombre de la empresa de transporte</label>
                </div>
            </div>

            <!-- Campos para los 52 puntos del checklist -->
            <div class="accordion">
                <!-- Se insertan los items con AJAX y JQUERY -->
                <!-- Se crean acordiones para las categorias, en los cuales se van a insertar acordiones adicionales por cada punto encontrado -->
                <div class="accordion" id="accordionCategorias">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Observaciones del vehiculo
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionCategorias">
                            <div class="accordion-body">
                                <div id="accordionPuntos1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Contenedor - Aspectos generales
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionCategorias">
                            <div class="accordion-body">
                                <div id="accordionPuntos2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Contenedor - Piso
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionCategorias">
                            <div class="accordion-body">
                                <div id="accordionPuntos3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Contenedor - Techo
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionCategorias">
                            <div class="accordion-body">
                                <div id="accordionPuntos4"></div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Contenedor - Costados
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionCategorias">
                            <div class="accordion-body">
                                <div id="accordionPuntos5"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DIV para el boton de guardado -->
            <div class="d-flex justify-content-center align-items-center" style="padding: 3rem;">
                <button type="submit" id="guardar" class="btn btn-success" style="margin-right: 2%;"> Guardar cambios <i class="bi bi-patch-check"></i></button>
            </div>
            <!-- FIN DE DIV para el boton de guardado -->
        </form>
    </div>

    <!-- Footer de la pagina con bootstrap -->
    <footer class="mt-auto bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-1">
            <!-- Section: Imagen -->
            <section class="mb-1">
                <img src="assets/iconfull.png" width="50rm">
            </section>
            <!-- Section:  Texto -->
            <!-- <section class="mb-4">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
                    repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
                    eum harum corrupti dicta, aliquam sequi voluptate quas.
                </p>
            </section> -->
            <!-- Section: Text -->
        </div>
        <!-- Grid container -->
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            Departamento de sistemas - <a class="text-white" href="https://www.bellota.com/es-mx">Bellota México</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- FIN DE Footer de la pagina con bootstrap -->
</body>

<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/scriptPrincipal.js"></script>

</html>