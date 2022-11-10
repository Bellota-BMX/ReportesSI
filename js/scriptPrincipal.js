$(document).ready(function () {

    //Dejando los campos vacios
    let fecha, hEntrada, hSalida, pOrigen, pProced, pDest, tMerca, nEmpre; //Variables de la cabecera
    let idCabeceraInsertada; //Identificador de la cabecera
    let cantidadDetalles = 3; //La cantidad de detalles a guardar + 1 

    //Funcionamiento del boton guardar
    $('#guardar').on('click', function () {
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
                alert("Cabecera añadido correctamente");
            } else {
                alert("EL REGISTRO NO PUDO SER AÑADIDO");
            }
        });

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
                if(res=1){
                    console.log("Detalle registrado");
                }else{
                    console.log("Detalle no registrado");
                }
            })
        }
    });

})