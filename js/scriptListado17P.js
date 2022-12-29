$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "php/obtenerCabeceras17P.php",
        //data: "data",
        //dataType: "json",
        success: function (response) {
            //Se convierte el JSON en un objeto de javascript
            var resultadoJSON = JSON.parse(response);
            //Se imprime el objeto en consola para pruebas
            console.log(resultadoJSON);
            //Se recorre cada resultado para añadirlo a la tabla
            $.each(resultadoJSON, function (index, value) {

                //console.log(index + " : " + value.empresaTransporte + '(' + value.pOrigen + ')');

                var itemtabla = `                
                    <tr>
                        <th scope="row">`+ value.idCabecera + `</th>
                        <td>`+ value.fecha + `</td>
                        <td>`+ value.empresaTransporte + `</td>
                        <td>`+ value.pOrigen + `</td>
                        <td>`+ value.pDestino + `</td>
                        <td><button type="submit" id="guardar" onclick="window.open('http://art.bellota.com.mx:8083/art/runReport?reportId=46&p-idCabecera=`+ value.idCabecera + `&public=true&user=UsuarioPrueba','popUpWindow','height=400,width=600,left=10,top=10,,scrollbars=yes,menubar=no')" class="btn btn-primary"> <i class="bi bi-file-earmark-pdf-fill"></i> Generar PDF</button></td>
                    </tr>
                `;
                $("#cuerpoTabla").append(itemtabla);
            });

        }
    });
});