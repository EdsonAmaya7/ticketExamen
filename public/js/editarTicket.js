async function datos() {
    let folio = document.getElementById('folio').value;
    let curp = document.getElementById('curp').value;

    const url = route("datosTicketUsuarios", [folio, curp])

    const init = {
        method: 'GET',
        headers: {
            Accept: 'application/json'
        }
    }

    const req = await fetch(url, init);

    if (req.ok) {
        // informacion traida en json
        const res = await req.json();

        document.getElementById('nombreTramite').value = res[0]['nombreTramite']
        document.getElementById('nombre').value = res[0]['nombre']
        document.getElementById('paterno').value = res[0]['paterno']
        document.getElementById('materno').value = res[0]['materno']
        document.getElementById('nivelIngresar').value = res[0]['nivelIngresar']
        document.getElementById('municipio').value = res[0]['municipio']
        document.getElementById('asunto').value = res[0]['asunto']
        document.getElementById('id').value = res[0]['id']
        document.getElementById('status').value = res[0]['status']

        document.getElementById('editar_ticket').onclick = async () => {
            const url2 = route('ticket.update', [document.getElementById('id').value = res[0]['id'], 1]);

            // Form
            const form = document.getElementById("formulario");


            // FormData
            const formData = new FormData(form);

            // init
            const init2 = {
                method: 'PUT',
                body: JSON.stringify(Object.fromEntries(formData)),
                headers: {
                    "X-CSRF-TOKEN": window.CSRF_TOKEN,
                    Accept: 'application/json',
                    'Content-Type': 'application/json'
                }
            }

            // req
            const req2 = await fetch(url2, init2);

            if (req2.ok) {
                Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    text: 'Datos actualizados correctamente'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se puedieron actualizar los datos'
                });
            }
        }
    }
}
// Consumo de la api de municipios
$.ajax({
    url: 'https://api.datos.gob.mx/v1/condiciones-atmosfericas',
    success: (data) => {
        data.results.forEach(municipio => {
            document.getElementById(
                "municipio"
            ).innerHTML += `<option value="${municipio["name"]}">${municipio["name"]}</option>">`;
        });
    }
})
