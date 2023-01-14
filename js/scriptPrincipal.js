$(document).ready(function () {

    //Limpiando todos los valores del formulario al cargar la pagina
    $('#form')[0].reset();

    //Declarando variables globales
    let fecha, hEntrada, hSalida, pOrigen, pProced, pDest, tMerca, nEmpre; //Variables de la cabecera
    let idCabeceraInsertada; //Identificador de la cabecera
    let cantidadDetalles = 53; //La cantidad de detalles a guardar + 1 
    let tSet = new Set([1, 3]); // pre-construct un SET con los puntos que deben llevar imagen
    let tSetPuntosActivos = new Set(); //Set para añadir los puntos que esten activos o añadidos en BD

    //Validar tamaño de archivo cada que cambien los imput de file
    $(document).on('change', 'input[type=file]', function (event) {
        //Se recupera el tamaño del archivo en bytes
        console.log(this.files[0].size);
        //Se convierte la cantidad de bytes a megabyte
        var numb = $(this)[0].files[0].size / 1024 / 1024;
        //Se comvierte el numero a dos decimales
        numb = numb.toFixed(2);
        //La fotografia tiene que ser menor a 2 MB
        if (numb < 2) {
            console.log("Imagen correcta");
            //Se obtiene el id del input que desencadeno el evento
            var id = event.target.id;
            // Se crea un nuevo FormData (Solo se puede hacer el guardado del archivo si va en un formData)
            var formData = new FormData();
            //Se obtiene el archivo actual y se guarda en una variable
            var files = $('#' + id)[0].files[0];
            //Se añade la variable del archivo al formData
            formData.append('file', files);
            //Se carga al servidor con ayuda de AJAX
            $.ajax({
                url: 'php/upload.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response == 1) {
                        console.log(response);
                        console.log("Archivo subido");
                        console.log($('#' + id)[0].files[0]);
                    } else {
                        console.log("NO subido");
                    }
                }
            })
        } else {
            alert('El archivo es muy pesado, intente nuevamente');
            this.value = '';
        }
    });

    //Carga de todos los elementos del items del acordeon
    $.ajax({
        url: "php/obtener17Puntos.php",
        method: "POST"
    }).done(function (res) {

        //Se convierte el JSON en un objeto de javascript
        var resultadoJSON = JSON.parse(res);
        //Se imprime el objeto en consola para pruebas
        console.log(resultadoJSON);

        //Se recorre cada resultado del JSON obtenido con AJAX
        $.each(resultadoJSON, function (i, item) {
            console.log(item.nombrePunto);
            console.log(item.numeroPunto);
            tSetPuntosActivos.add(item.numeroPunto);
            console.log(tSetPuntosActivos);

            //Asignando la categoria del punto en una variable
            var categoria = item.idCategoria;

            if (tSet.has(item.numeroPunto)) {
                //Si el SET tiene el punto en curso entonces se inserta el item del acordion con IMAGEN
                var accorItem = `
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading`+ item.numeroPunto + `">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse`+ item.numeroPunto + `" aria-expanded="false" aria-controls="collapse` + item.numeroPunto + `">
                            <span class="badge text-bg-secondary">`+ item.numeroPunto + `</span> &nbsp; ` + item.nombrePunto + `
                        </button>
                    </h2>
                    <div id="collapse`+ item.numeroPunto + `" class="accordion-collapse collapse" aria-labelledby="heading` + categoria + `" data-bs-parent="#accordionPuntos` + categoria + `">
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
                                <input accept="image/jpg,image/png,image/jpeg,image/gif"  type="file" name="myfile`+ item.numeroPunto + `" id="myfile` + item.numeroPunto + `" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <img id="blah" width="40%" />
                        </div>
                    </div>
                </div>`;

                switch (categoria) {
                    case 1:
                        $("#accordionPuntos1").append(accorItem);
                        break;
                    case 2:
                        $("#accordionPuntos2").append(accorItem);
                        break;
                    case 3:
                        $("#accordionPuntos3").append(accorItem);
                        break;
                    case 4:
                        $("#accordionPuntos4").append(accorItem);
                        break;
                    case 5:
                        $("#accordionPuntos5").append(accorItem);
                        break;
                }

                //$("#accordionPuntos").append(accorItem);
            } else {
                //Si el SET no tiene el punto en curso entonces se inserta sin IMAGEN 
                var accorItem = `
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading`+ item.numeroPunto + `">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse`+ item.numeroPunto + `" aria-expanded="false" aria-controls="collapse` + item.numeroPunto + `">
                            <span class="badge text-bg-secondary">`+ item.numeroPunto + `</span> &nbsp; ` + item.nombrePunto + `
                        </button>
                    </h2>
                    <div id="collapse`+ item.numeroPunto + `" class="accordion-collapse collapse" aria-labelledby="heading` + categoria + `" data-bs-parent="#accordionPuntos` + categoria + `">
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

                switch (categoria) {
                    case 1:
                        $("#accordionPuntos1").append(accorItem);
                        break;
                    case 2:
                        $("#accordionPuntos2").append(accorItem);
                        break;
                    case 3:
                        $("#accordionPuntos3").append(accorItem);
                        break;
                    case 4:
                        $("#accordionPuntos4").append(accorItem);
                        break;
                    case 5:
                        $("#accordionPuntos5").append(accorItem);
                        break;
                }

                //$("#accordionPuntos").append(accorItem);
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
            //Solo si se inserta la cabecera se busca su id con AJAX
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

                //Por cada punto activo guardado en el set, se va a añadir un detalle. De ese modo deja de ser necesario el for de 52 posiciones por si se añaden mas puntos o por si restan puntos
                tSetPuntosActivos.forEach(function (i) {
                    //console.log("valor del each "+ i);
                    //Se valida si el deatalle tiene una imagen para insertar o si no la tiene y es solo texto
                    if (tSet.has(i)) {

                        //El bloque de codigo se ha movido al punto donde se validan las imagenes para guardar las imagenes desde que se seleccionan
                        /*
                        // Se crea un nuevo FormData (Solo se puede hacer el guardado del archivo si va en un formData)
                        var fd = new FormData();
                        //Se obtiene el archivo actual y se guarda en una variable
                        var files = $('#myfile' + i)[0].files[0];
                        //Se añade la variable del archivo al formData
                        fd.append('file', files);
                        //Se carga al servidor con ayuda de AJAX
                        $.ajax({
                            url: 'php/upload.php',
                            type: 'POST',
                            data: fd,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                if (response != 0) {
                                    console.log("Archivo subido");
                                } else {
                                    console.log("NO subido");
                                }
                            }
                        })
                        */

                        //A PARTIR DE AQUI ES PRUEBA
                        var cumple = $('#cumple' + i).val();
                        var observ = $('#observ' + i).val();
                        var nombreimg = $('#myfile' + i)[0].files[0].name;
                        var idCatalogo = i;
                        /*Bloque para la creacion de nuevo nombre para cambiar a la imagen guardada y guardarlo en DB
                        Se da por entendido que las imagenes sin la nomenclatura son cargas que no eran correctas*/
                        // crea un nuevo objeto `Date`
                        var today = new Date();
                        // `getDate()` devuelve el día del mes (del 1 al 31)
                        var day = today.getDate();
                        // `getMonth()` devuelve el mes (de 0 a 11)
                        var month = today.getMonth() + 1;
                        // `getFullYear()` devuelve el año completo
                        var year = today.getFullYear();
                        var hour = today.getHours();
                        var minute = today.getMinutes();
                        var second = today.getSeconds();
                        //se obtiene la extension del nombre+
                        let extension = nombreimg.split(".").pop();
                        //se concatenan los datos y se asignan a la variable del nuevo nombre
                        var nombreimgNuevo = month + '' + day + '' + year + '-' + hour + '' + minute + '' + second+ '-' + i + '.'+extension;
                        

                        $.ajax({
                            url: "php/guardarDetalleImagen2.php",
                            method: "POST",
                            data: {
                                param0: cumple,
                                param1: observ,
                                param2: idCatalogo,
                                param3: idCabeceraInsertada,
                                param4: nombreimg,
                                param5: nombreimgNuevo
                            },
                        }).done(function (res) {
                            console.log(res);
                        })

                        //FIN DE LA PRUEBA

                    } else {
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
                });
                alert("Cabecera añadido correctamente");
            } else { //
                alert("EL REGISTRO NO PUDO SER AÑADIDO");
            }
        });
    });
})