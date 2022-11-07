// Agregar y generar el ticket
document.getElementById("generar_ticket").onclick = async () => {
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
        console.log("Dato insertado correctamente");
    } else {
        console.log("Error");
    }
}

// Consumo de la api
$.ajax({
    url: 'https://api.datos.gob.mx/v1/condiciones-atmosfericas',
    success: (data) => {
        data.results.forEach(element => {
            document.getElementById(
                "municipio"
            ).innerHTML += `<option value="${element["name"]}">${element["name"]}</option>">`;
        });
    }
})
