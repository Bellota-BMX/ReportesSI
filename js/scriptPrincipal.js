$(document).ready(function () {

    //Limpiando todos los valores del formulario
    $('#form')[0].reset();

    //Declarando variables globales
    let fecha, hEntrada, hSalida, pOrigen, pProced, pDest, tMerca, nEmpre; //Variables de la cabecera
    let idCabeceraInsertada; //Identificador de la cabecera
    let cantidadDetalles = 3; //La cantidad de detalles a guardar + 1 

    //Carga de todos los elementos del items del acordeon
    $.ajax({
        url: "php/obtener17Puntos.php",
        method: "POST"
    }).done(function (res) {

        //Se convierte el JSON en un objeto de javascript
        var resultadoJSON = JSON.parse(res);
        //Se imprime el objeto en consola para pruebas
        console.log(resultadoJSON);
        // pre-construct un SET con los puntos que deben llevar imagen
        var tSet = new Set([1, 3]);

        //Se recorre cada resultado del JSON obtenido con AJAX
        $.each(resultadoJSON, function (i, item) {
            console.log(item.nombrePunto);
            console.log(item.numeroPunto);

            if (tSet.has(item.numeroPunto)) {
                //Si el SET tiene el punto en curso entonces se inserta el item del acordion con IMAGEN
                var accorItem = `
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse`+ item.numeroPunto + `" aria-expanded="false" aria-controls="collapse` + item.numeroPunto + `">
                            <span class="badge text-bg-secondary">`+ item.numeroPunto + `</span> &nbsp; ` + item.nombrePunto + `
                        </button>
                    </h2>
                    <div id="collapse`+ item.numeroPunto + `" class="accordion-collapse collapse" aria-labelledby="heading` + item.numeroPunto + `" data-bs-parent="#accordionPuntos">
                        <div class="accordion-body">
                            <div class="input-group mb-3">
                                <select id="cumple`+ item.numeroPunto + `" class="form-select" aria-label="Opciones de cumplimiento">
                                    <option selected>Cumple con la inspección</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N/A</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <input id="observ`+ item.numeroPunto + `" type="text" class="form-control" placeholder="Observaciones" aria-label="Onservaciones">
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <img id="blah" width="40%" />
                        </div>
                    </div>
                </div>`;

                $("#accordionPuntos").append(accorItem);
            } else {
                //Si el SET no tiene el punto en curso entonces se inserta sin IMAGEN 
                var accorItem = `
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse`+ item.numeroPunto + `" aria-expanded="false" aria-controls="collapse` + item.numeroPunto + `">
                            <span class="badge text-bg-secondary">`+ item.numeroPunto + `</span> &nbsp; ` + item.nombrePunto + `
                        </button>
                    </h2>
                    <div id="collapse`+ item.numeroPunto + `" class="accordion-collapse collapse" aria-labelledby="heading` + item.numeroPunto + `" data-bs-parent="#accordionPuntos">
                        <div class="accordion-body">
                            <div class="input-group mb-3">
                                <select id="cumple`+ item.numeroPunto + `" class="form-select" aria-label="Opciones de cumplimiento">
                                    <option selected>Cumple con la inspección</option>
                                    <option value="1">SI</option>
                                    <option value="2">NO</option>
                                    <option value="3">N/A</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <input id="observ`+ item.numeroPunto + `" type="text" class="form-control" placeholder="Observaciones" aria-label="Onservaciones">
                            </div>
                        </div>
                    </div>
                </div>`;

                $("#accordionPuntos").append(accorItem);
            }


        })
    });

    //Funcionamiento del formulario al ser enviado
    $('#form').on('submit', function (e) {
        e.preventDefault();

        //obteniendo el valor de los campos de la cabecera
        fecha = $('#fecha').val();
        hEntrada = $('#hEntrada').val();
        hSalida = $('#hSalida').val();
        pOrigen = $('#pOrigen').val();
        pProced = $('#pProced').val();
        pDest = $('#pDest').val();
        tMerca = $('#tMerca').val();
        nEmpre = $('#nEmpre').val();


        //arrDetalle.push({"fecha": fecha, "hEntrada": hEntrada, "hSalida": hSalida});
        //console.log(arrDetalle);

        //Metodo/funcion ajax para insertar el la cabecera
        $.ajax({
            url: "php/guardarCabecera.php",
            method: "POST",
            data: {
                param0: fecha,
                param1: hEntrada,
                param2: hSalida,
                param3: pOrigen,
                param4: pProced,
                param5: pDest,
                param6: tMerca,
                param7: nEmpre
            },
        }).done(function (res) {
            var resultado = res;
            if (resultado = 1) {
                //Obtencion del ID de la cabecera insertada en el mismo proceso
                idCabeceraInsertada = $.ajax({
                    type: 'POST',
                    url: "php/cantidadCabecera.php",
                    global: false,
                    async: false,
                    data: {
                        param0: fecha,
                        param1: hEntrada,
                        param2: hSalida,
                    },
                    success: function (res) {
                        console.log("Dentro del ajax " + res);
                        return res;
                    }
                }).responseText;

                console.log(idCabeceraInsertada);

                //Obteniendo los valores de los 52 detalles dentro de un ciclo
                for (i = 1; i < cantidadDetalles; i++) {
                    var cumple = $('#cumple' + i).val();
                    var observ = $('#observ' + i).val();
                    var idCatalogo = i;

                    console.log(cumple);
                    console.log(observ);
                    console.log(idCatalogo);
                    //Metodo AJAX para insertar el detalle en curso
                    $.ajax({
                        url: "php/guardarDetalle.php",
                        method: "POST",
                        data: {
                            param0: cumple,
                            param1: observ,
                            param2: idCatalogo,
                            param3: idCabeceraInsertada
                        },
                    }).done(function (res) {
                        if (res = 1) {
                            console.log("Detalle registrado");
                        } else {
                            console.log("Detalle no registrado");
                        }
                    })
                }
                alert("Cabecera añadido correctamente");
            } else {
                alert("EL REGISTRO NO PUDO SER AÑADIDO");
            }
        });
    });
})