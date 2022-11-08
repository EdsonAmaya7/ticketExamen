document.addEventListener("DOMContentLoaded", () => {
    tabla_admin_control
})


let tabla_admin_control = $('#adminControl').DataTable({
    language: {
        url: "https://cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json",
    },
    scrollY: "300px",
    scrollX: "500px",
    scrollCollapse: true,
    info: true,
    searching: true,
    paging: false,
    ordering: true,
    autoWidth: true,
    ajax: {
        url: route('getNiveles'),
        type: "get",
    },

    columns: [
        { data: "folio" },
        { data: "nombreTramite" },
        { data: "nombre" },
        { data: "paterno" },
        { data: "materno" },
        { data: "nivelIngresar" },
        { data: "municipio" },
        { data: "asunto" },
        { data: "status" },
        { data: "curp" },
        {
            data: "id",
            render: function (id) {
                // return id;
                return `<a href="#" onclick="deleteTicket(${id});"><i class="fas fa-trash" style="color:red"></i></a>
                 <a href=${ route("ticket.edit",id)} ><i class="fas fa-edit" style="color:#51723c"></i></a>
                  `;
            }
        }
    ],

})

async function deleteTicket(id) {
    event.preventDefault();

    let url = route('ticket.destroy', id)

    let init = {
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": window.CSRF_TOKEN,
            "Content-Type": "application/json",
            Accept: "application/json",
        },
    }
    let req = await fetch(url, init);

    if (req.ok) {
        Swal.fire({
            timer: 1500
            , icon: 'success'
            , title: 'Success'
            , text: "Ticket eliminado con exito"
        });

        await tabla_admin_control.ajax.url(route('getTickets')).load();
    } else {
        Swal.fire({
            icon: 'error'
            , title: 'Error'
            , text: "Error al eliminar el ticket"
        });
    }
}