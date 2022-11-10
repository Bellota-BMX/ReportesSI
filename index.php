<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
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
        <h5> INSPECCIONES DE SEGURIDAD Y AGRÍCOLAS SISTEMÁTICAS DE CTPAT/OEA DE 17 PUNTOS</h5>
        <!-- Inicio del formulario -->
        <form>
            <!-- Campos para la cabecera -->
            <div class="input-group mb-3">
                <input id="fecha" type="date" class="form-control" placeholder="Fecha" aria-label="Fecha">
                <input id="hEntrada" type="time" class="form-control" placeholder="Hora de entrada" aria-label="Hora de entrada">
                <input id="hSalida" type="time" class="form-control" placeholder="Hora de salida" aria-label="Hora de salida">
            </div>
            <div class="input-group mb-3">
                <input id="pOrigen" type="text" class="form-control" placeholder="Puerto de origen" aria-label="Puerto de origen">
                <input id="pProced" type="text" class="form-control" placeholder="Puerto de procedencia" aria-label="Puerto de procedencia">
                <input id="pDest" type="text" class="form-control" placeholder="Puerto de destino" aria-label="Puerto de destino">
            </div>
            <div class="input-group mb-3">
                <input id="tMerca" type="text" class="form-control" placeholder="Tipo de mercancia" aria-label="Tipo de mercancia">
                <input id="nEmpre" type="text" class="form-control" placeholder="Nombre de la empresa de transporte" aria-label="Nombre de la empresa de transporte">
            </div>

            <!-- Campos para los 52 puntos del checklist -->
            <div class="accordion">
                <!-- 1. Inspeccion de cabezotes y chasis -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <span class="badge text-bg-secondary">1</span> &nbsp; Inspeccion de cabezotes y chasis
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="input-group mb-3">
                                <select id="cumple1" class="form-select" aria-label="Default select example">
                                    <option selected>Cumple con la inspección</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N/A</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <input id="observ1" type="text" class="form-control" placeholder="Observaciones" aria-label="Onservaciones">
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <img id="blah" width="40%" />
                        </div>
                    </div>
                </div>
                <!-- 2. Compartimiento del motor s/n -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <span class="badge text-bg-secondary">2</span> &nbsp; Compartimiento del motor s/n
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="input-group mb-3">
                                <select id="cumple2" class="form-select" aria-label="Default select example">
                                    <option selected>Cumple con la inspección</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N/A</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <input id="observ2" type="text" class="form-control" placeholder="Observaciones" aria-label="Onservaciones">
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            </div>

                            <img id="blah" width="40%" />

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- DIV para el boton de guardado -->
    <div class="d-flex justify-content-center align-items-center" style="padding: 3rem;">
        <button type="button" id="guardar" class="btn btn-success" style="margin-right: 2%;"> Guardar cambios <i class="bi bi-patch-check"></i></button>
    </div>
    <!-- FIN DE DIV para el boton de guardado -->

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