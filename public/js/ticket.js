// Agregar y generar el ticket
document.getElementById("generar_ticket").onclick = async () => {
    let curp = document.getElementById('curp').value;
    // var expresion = /^([A-Z&]|[a-z&]{1})([AEIOU]|[aeiou]{1})([A-Z&]|[a-z&]{1})([A-Z&]|[a-z&]{1})([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([HM]|[hm]{1})([AS|as|BC|bc|BS|bs|CC|cc|CS|cs|CH|ch|CL|cl|CM|cm|DF|df|DG|dg|GT|gt|GR|gr|HG|hg|JC|jc|MC|mc|MN|mn|MS|ms|NT|nt|NL|nl|OC|oc|PL|pl|QT|qt|QR|qr|SP|sp|SL|sl|SR|sr|TC|tc|TS|ts|TL|tl|VZ|vz|YN|yn|ZS|zs|NE|ne]{2})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([^A|a|E|e|I|i|O|o|U|u]{1})([0-9]{2})$/g;
        var expresion = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/;
    // URL
    const url = route("ticketTurno.store");

    // Form
    const form = document.getElementById("formulario");


    // FormData
    const formData = new FormData(form);

    formData.append("status", 0);
    // Inir
    const init = {
        method: "POST",
        body: formData,
        headers: {
            Accept: "application/json",
            'X-CSRF-TOKEN': $('#csrf').attr('content'),
        }
    }

    // req
    const req = await fetch(url, init)

    if (req.ok) {
        if (curp != "") {
            // El metodo exec encuentra coincidencias en una cadena, y si la encuentra entra
            if (expresion.exec(curp)) {
                const res = await req.json();
                Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    text: 'Datos capturados correctamente'
                });

                window.open(route('generarTicket', res.id));
            }
            // Si no la encuentra marca un error
            else {
                Swal.fire({
                    icon: 'error',
                    title: 'Advertencia',
                    text: 'La estructura de la CURP es incorrecto'
                });
                return false;
            }
        }

    } else {
        Swal.fire({
            icon: 'error',
            title: 'Advertencia',
            text: 'Favor de llenar todos los campos'
        });
    }
}

// Funcion para asignar el folio
function asignaFolio() {
    let municipio = document.getElementById("municipio").value;

    $.ajax({
        type: "GET",
        url: route('folioMunicipio', municipio),
        success: (data) => {
            let folio = data[0].numeroFolio + 1;
            let nuevoFolio = folio.toString().padStart(5, '0');
            document.getElementById("folio").value = nuevoFolio;
        }
    });
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

