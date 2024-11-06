/* -------------------------------------------------------------- */
function actMasiva(vecGeneral, condi, extra) {
    $.ajax({
        url: "ini.php",
        type: "POST",
        data: { vecGeneral, condi, extra },
        beforeSend: function () {
            loaderefect(1);
        },
        success: function (data) {
            const data2 = JSON.parse(data);
            if (data2[1] == 1) {
                Swal.fire({ icon: 'success', title: 'Muy Bien!', text: data2[0] })
            }
            else {
                Swal.fire({ icon: 'error', title: '¡ERROR!', text: data2[1] })
            }
        },
        complete: function () {
            loaderefect(0);
        }
    });
}
/* -------------------------------------------------------------- */

/* primer tabla */
function tb_llena(condi, extra){
    $.ajax({
        url: "./includes/crud/tablas.php",
        method: "POST",
        data: { condi, extra },
        success: function (data) {
            $("#cuerpo").html(data);
            //Swal.fire({ icon: 'success', title: 'Muy Bien!', text: ':)' })
        }
    });    
}

/* -------------------------------------------------------------- */
/* PODRIAS AGREGAR UNA VALIDACION PARA QUE CONFIRMES SI QUIERE MANDARLOS A BODEGA */
function reciclarHerramienta(condi, extra){
    $.ajax({
        url: "./includes/crud/func.php",
        method: "POST",
        data: { condi, extra },
        success: function (data) {
            //alert(data+condi);
            const data2 = JSON.parse(data);
            //alert(data2[1]);
            if (data2[1] = 1) {
                Swal.fire({ icon: 'success', title: 'Muy Bien!', text: data2[0] }).then(() => {
                    //location.reload();
                    tb_llena(data2[2], data2[3] );
                });
            }
            else {
                Swal.fire({ icon: 'error', title: '¡ERROR!', text: data2[0] })
            }
        }
        
    });    
}

/* -------------------------------------------------------------- */
//Swal.fire({ icon: 'success', title: 'Muy Bien!', text: condi+extra })