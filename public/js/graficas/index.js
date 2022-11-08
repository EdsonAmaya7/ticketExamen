let ticketsGraf = document.getElementById('cantidadTickets');
let municipioEstado = document.getElementById('municipioEstado');
let municipioChange = document.getElementById("municipios")

let ticket = document.getElementById('ticket').value,
    ticketArray = JSON.parse(ticket);

let pendientes = 0, resueltos = 0;

let municipioEstadoChart = null;

ticketArray.forEach(element => {
    if (element.status == "pendiente") {
        pendientes += 1
    } else {
        resueltos += 1
    }
});

const ticketsChart = new Chart(ticketsGraf, {
    type: 'bar',
    data: {
        labels: ["Pendientes", "Resueltos"],
        datasets: [{
            label: ["Tickets"],
            data: [pendientes, resueltos],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        responsive: false
    }
});

function selectMunicipio(){
    if (Chart.getChart(municipioEstadoChart)){
        Chart.getChart(municipioEstadoChart).destroy();
      }
    municipioSeleccionado = document.getElementById("municipios").value
    municipioPendintes = ticketArray.filter(o => o.municipio == municipioSeleccionado && o.status == "pendiente").length;
    municipioResueltos = ticketArray.filter(o => o.municipio == municipioSeleccionado && o.status == "resuelto").length;

}
municipioChange.addEventListener("change", ()=>{
    
  municipioEstadoChart = new Chart(municipioEstado, {
    type: 'bar',
    data: {
        labels: ["pendientes","resueltos"],
        datasets: [{
            label: municipioSeleccionado,
            data: [municipioPendintes,municipioResueltos],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }
    ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        responsive: false
    }
});
})