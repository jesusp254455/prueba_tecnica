$("#frm_reg").submit(async function(event) {
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


async function list (){
    url = '?controlador=usuario&accion=listar';
    try {
        let respuesta = await fetch(url,{
            method:'GET'
        })
        if (respuesta.ok) {
            let r = await respuesta.json();
           let datos =  r.data;
           $('#dataTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/2.0.1/i18n/es-CO.json',
            },
            data: datos,
            columns: [
                { data: "nombres" },
                { data: "email" },
                {  data: "tipo_usuario",
                render: function(data, type, row) {
                    return data === 1 ? 'Admin' : 'Empleado';
                }},
                {  
                    data: null,
                    render: function(data, type, row) {
                        return `<a href="/edit_user/${row.uid}" class="edit" style="font-size: 25px;"><i class="bi bi-pencil-square"></i></a>
                                <a href="/user_deleted/${row.uid}" class="elim" style="font-size: 25px;"><i class="bi bi-trash"></i></a>`;
                    }
                 }
                
            ]
        });
        }
    } catch (error) {
        console.error("Error en la solicitud:", error);
    }
}


$(document).ready(function(){
    list();
})