let tableNiveles = $('#niveles').DataTable({
    language: {
        url: "https://cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json",
    },
    info: true,
    searching: true,
    paging: false,
    ordering: true,
    ajax: {
        url: route('getNiveles'),
        type: "GET",
    },

    columns: [
        { data: "id" },
        { data: "nivelIngresar" },
        {
            data: "id",
            render: (data) => {
                return `
            <div class="form-group">
                <button onclick="modalEditar(${data})" style="border-radius: 5px" class="btn btn-warning"><i class="fa-solid fa-edit"></i></button>
                <button onclick="eliminarNivel(${data})" style="border-radius: 5px" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
            </div>
            `
            }
        }
    ]

})

// Modal para agregar un nuevo nivel
document.getElementById('agregar').onclick = async () => {
    // Construcción del modal
    let modal = new bootstrap.Modal(document.getElementById("exampleModal"));
    modal.toggle();
    document.getElementById(
        "exampleModalLabel"
    ).innerHTML = `Agregar RFC`;
    document.getElementById("exampleModalLabel").style = "color: white";
    document.getElementById("modal-body").innerHTML = `
        <style>
        .modal-content{
            box-shadow: black;
        }
        </style>
        <form id="formAgregar">
            <div class="mb-3">
                <label class="col-form-label">Nivel</label>
                <input placeholder="Nivel" type="text" class="form-control" id="nivelIngresar" name="nivelIngresar">
            </div>
        </form>
        <div class="row">
            <div class="col-md-12 text-end">
                <button id="agregarModal" class="btn btn-success">Agregar</button>
            </div>
        </div>
        `;
    modal.handleUpdate();

    document.getElementById("agregarModal").onclick = async () => {
        // URL
        const url = route("niveles.store");

        // Form
        const form = document.getElementById('formAgregar');

        // FormData
        const formData = new FormData(form);

        // Init
        const init = {
            method: 'POST',
            body: formData,
            headers: {
                Accept: 'application/json',
                "X-CSRF-TOKEN": window.CSRF_TOKEN,
            }
        }

        // Req
        const req = await fetch(url, init);

        if (req.ok) {
            tableNiveles.ajax.reload();
            Swal.fire({
                icon: 'success',
                title: 'Exito',
                text: 'Datos capturados correctamente'
            });
            modal.hide();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Exito',
                text: 'No se pudieron capturar los datos'
            });
        }
    }
}

// Eliminar un nivel
const eliminarNivel = async (id) => {
    Swal.fire({
        title: "¿Estas seguro de que deseas eliminar este elemento?",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: `Aceptar`,
        denyButtonText: `Cancelar`,
    }).then(async (result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            // URL
            const url = route('niveles.destroy', id);

            // init
            const init = {
                method: 'DELETE',
                headers: {
                    Accept: 'application/json',
                    "X-CSRF-TOKEN": window.CSRF_TOKEN,
                    'Content-Type': 'application/json'
                }
            }
            // req
            const req = await fetch(url, init);

            // Si la peticion fue exitosa, recarga la tabla y muestra un mensaje
            if (req.ok) {
                Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    text: 'Datos Eliminado correctamente'
                });
                tableNiveles.ajax.reload();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo eliminar este elemento'
                });
            }
        }
    });
}


// Actualizar un nivel
const modalEditar = async (id) => {
    // URL
    const url = route("nivelById", id);

    // init
    const init = {
        method: 'GET',
        headers: {
            Accept: 'application/json'
        }
    }

    // req
    const req = await fetch(url, init);

    if (req.ok) {
        const res = await req.json();
        // Construcción del modal
        let modal = new bootstrap.Modal(document.getElementById("exampleModal"));
        modal.toggle();
        document.getElementById(
            "exampleModalLabel"
        ).innerHTML = `Agregar RFC`;
        document.getElementById("exampleModalLabel").style = "color: white";
        document.getElementById("modal-body").innerHTML = `
        <style>
        .modal-content{
            box-shadow: black;
        }
        </style>
        <form id="formEditar">
            <div class="mb-3">
                <label class="col-form-label">Nivel</label>
                <input placeholder="Nivel" value="${res}" type="text" class="form-control" id="nivelIngresar" name="nivelIngresar">
            </div>
        </form>
        <div class="row">
            <div class="col-md-12 text-end">
                <button id="editarModal" class="btn btn-success">Editar</button>
            </div>
        </div>
        `;
        modal.handleUpdate();

        document.getElementById("editarModal").onclick = async () => {
            // URL
            const url = route('niveles.update', id);

            // Form
            const form = document.getElementById('formEditar');

            // FormData
            const formData = new FormData(form);

            // Init
            const init = {
                method: 'PUT',
                body: JSON.stringify(Object.fromEntries(formData)),
                headers: {
                    Accept: 'application/json',
                    "X-CSRF-TOKEN": window.CSRF_TOKEN,
                    'Content-Type': 'application/json'
                }
            }

            // Req
            const req = await fetch(url, init);

            if (req.ok) {
                tableNiveles.ajax.reload();
                modal.hide();
            }
        }
    }
}
