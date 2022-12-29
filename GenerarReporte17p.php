<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link rel="stylesheet" href="css/heading.css">
    <link rel="icon" href="assets/iconfullRed.ico">
    <title>Listado de reportes</title>
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
            <h3> Listado de reportes realizados</h3>
        </div>
        <!-- Inicio del contenido de la pagina -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha del reporte</th>
                    <th scope="col">Empresa de transporte</th>
                    <th scope="col">Puerto de origen</th>
                    <th scope="col">Puerto de destino</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody id="cuerpoTabla">
                <tr>
                    <th scope="row">N/A</th>
                    <td>2022-01-20</td>
                    <td>Transporte 4638</td>
                    <td>Puerto 3273</td>
                    <td>Destino 046</td>
                    <td><button disabled type="submit" id="guardar" class="btn btn-primary"> <i class="bi bi-file-earmark-pdf-fill"></i> Generar PDF</button></td>
                </tr>
                <tr>
                    <th scope="row">N/A</th>
                    <td>2022-01-20</td>
                    <td>Transporte 3648</td>
                    <td>Puerto 3437</td>
                    <td>Destino 003</td>
                    <td><button disabled type="submit" id="guardar" class="btn btn-primary"> <i class="bi bi-file-earmark-pdf-fill"></i> Generar PDF</button></td>

                </tr>
                <tr>
                    <th scope="row">N/A</th>
                    <td colspan="3">2022-01-20</td>
                    <td>Destino 738</td>
                    <td><button disabled type="submit" id="guardar" class="btn btn-primary"> <i class="bi bi-file-earmark-pdf-fill"></i> Generar PDF</button></td>
                </tr>
            </tbody>
        </table>

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
<script src="js/scriptListado17P.js"></script>

</html>