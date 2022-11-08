async function datos() {
    let folio = document.getElementById('folio').value;
    let curp = document.getElementById('curp').value;
    var expresion = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/;

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

        console.log(res);

        document.getElementById('nombreTramite').value = res[0]['nombreTramite']
        document.getElementById('nombre').value = res[0]['nombre']
        document.getElementById('paterno').value = res[0]['paterno']
        document.getElementById('materno').value = res[0]['materno']
        document.getElementById('nivelIngresar_id').value = res[0]['nivelIngresar_id']
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
    type: 'GET',
    url: route('nivelesSelect'),
    success: (data) => {
        data.forEach(nivel => {
            document.getElementById(
                "nivelIngresar_id"
            ).innerHTML += `<option value="${nivel["id"]}">${nivel["nivelIngresar"]}</option>">`;
        });
    }
})

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
