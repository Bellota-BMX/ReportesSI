$(document).ready(function () {


    //Dejando los campos vacios

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


        //Metodo/funcion ajax para insertar el nuevo usuario
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
        })
        
    });

})