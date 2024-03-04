$("#frm_reg").submit(async function (event) {
    event.preventDefault(); // Evitar el envío automático del formulario
    let url = $(this).attr("action");
    let data = $(this).serialize();
    try {
        let response = await fetch(url, {
            method: 'POST',
            body: data,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        });
        if (response.ok) {
            let respuestda = await response.json();
            Swal.fire(
                respuestda.mensaje,
                '',
                respuestda.icono
            );
            $("#frm_reg").trigger("reset")
        } else {
            console.error("Error en la solicitud");
            // Aquí puedes manejar errores específicos según la respuesta del servidor
        }
    } catch (error) {
        console.error("Error en la solicitud:", error);
        // Aquí puedes manejar errores de conexión, etc.
    }
});


async function list() {
    url = '?controlador=usuario&accion=listar';
    try {
        let respuesta = await fetch(url, {
            method: 'GET'
        })
        if (respuesta.ok) {
            let r = await respuesta.json();
            let datos = r.data;
           
            if ($.fn.DataTable.isDataTable('#dataTable')) {
                $('#dataTable').DataTable().destroy(); // Destruir DataTable existente si existe
            }
            $('#dataTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/2.0.1/i18n/es-CO.json',
                },
                data: datos,
                columns: [
                    { data: "nombres" },
                    { data: "email" },
                    {
                        data: "tipo_usuario",
                        render: function (data, type, row) {
                            return data === '1' ? 'Administrador' : 'Empleado';
                        }
                    },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return `<a href="?controlador=usuario&accion=editar&uid=${row.uid}" class="edit" style="font-size: 25px;"><i class="bi bi-pencil-square"></i></a>
                                <a href="?controlador=usuario&accion=eliminar&uid=${row.uid}" id="elin${row.uid}" onclick="eliminar('${row.uid}', event)" style="font-size: 25px;"><i class="bi bi-trash"></i></a>`;
                        }
                    }

                ]
            });
        }
    } catch (error) {
        console.error("Error en la solicitud:", error);
    }
}


$(document).ready(function () {
    list();
});


$(document).on('click', '.edit', async function (event) {
    event.preventDefault();
    let url = $(this).attr("href");
    try {
        let respuesta = await fetch(url, {
            method: 'GET',
        });
        if (respuesta.ok) {
            let r = await respuesta.json();
         
            $("#tipo_usuario_act").val(r.data.tipo_usuario)
            // $("#subirfoto_act").val(r.data.photo);
            $("#nombres_act").val(r.data.nombres);
            $("#apellidos_act").val(r.data.apellidos);
            $("#email_act").val(r.data.email);
            $("#uid_act").val(r.data.uid);

        $("#modal_act").modal("show")
        }
    } catch (error) {
        console.error("Error al eliminar el usuario:", error);
        Swal.fire("Error", "Hubo un error al procesar su solicitud.", "error");
    }

    return false;
})


$("#frm_actualizar").submit(async function (event) {
    event.preventDefault(); // Evitar el envío automático del formulario
    let url = $(this).attr("action");
    let data = $(this).serialize();
    try {
        let response = await fetch(url, {
            method: 'POST',
            body: data,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        });
        if (response.ok) {
            let respuestda = await response.json();
            Swal.fire(
                respuestda.mensaje,
                '',
                respuestda.icono
            );
        } else {
            console.error("Error en la solicitud");
            // Aquí puedes manejar errores específicos según la respuesta del servidor
        }
    } catch (error) {
        console.error("Error en la solicitud:", error);
        // Aquí puedes manejar errores de conexión, etc.
    }
});


async function eliminar(uid, event) {
    event.preventDefault();
    let url = $(`#elin${uid}`).attr("href");
    Swal.fire({
        title: "Desea eliminar ese usuario?",
        text: "Usted no será capaz de revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminar!"
    }).then(async (result) => { // Hacer la función dentro de then() asíncrona
        if (result.isConfirmed) {
            try {
                let respuesta = await fetch(url, {
                    method: 'GET'
                });

                if (respuesta.ok) {
                    let data = await respuesta.json();
                    Swal.fire(data.mensaje, '', data.icono);
                    list(); // Actualizar la lista después de eliminar el usuario
                } else {
                    console.error('Error en la respuesta del servidor:', respuesta.status);
                    Swal.fire("Error", "Hubo un error al procesar su solicitud.", "error");
                }
            } catch (error) {
                console.error("Error al eliminar el usuario:", error);
                Swal.fire("Error", "Hubo un error al procesar su solicitud.", "error");
            }
        }
    });
    // Detener la propagación del evento de clic
    return false;
}
