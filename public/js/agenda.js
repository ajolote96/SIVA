
document.addEventListener("DOMContentLoaded", function () {
    var bandera = false;
    var titleDefault = document.getElementById("nombreSolic").value;
    var rpe = document.getElementById("RPESolic").value;
    var descripDefault = document.getElementById("descSolic").value;
    var fechaInicio = document.getElementById("oculto").value;
    var fechaFin = document.getElementById("oculto2").value;
    var fechaNueva = new Date(fechaFin);
    var aumentar = fechaNueva.getDate() + 1;
    var fechaAuxFin = fechaNueva.setDate(aumentar);
    //var fechaFinAux = fechaToDate.setDate(fechaToDate.getDate()+1);
    console.log(fechaNueva);


    let formulario = document.querySelector("#formularioEventos");

    var calendarEl = document.getElementById("agenda");
    var calendar = new FullCalendar.Calendar(calendarEl, {
        timeZone: 'UTC',
        initialView: "dayGridMonth",
        locale: "es",
        displayEventTime: false,
        selectable: true,
        selectOverlap: false,



        headerToolbar: {
            left: "prev,next prevYear,nextYear today",
            center: "title",
            right: "listYear, dayGridMonth, dayGridWeek, timeGridDay",
        },

        events:[{
            title: titleDefault + " - RPE: " + rpe,
            descripcion: descripDefault,
            start: fechaInicio,
            end: fechaNueva
        }],

        //events: baseURL+"/evento/mostrar",
        /*selectOverlap: function(event) {
            console.log(event);
            if(event.length != 0){
                bandera = true;
                $("#evento").modal("hide");
                alert("No puedes registrar en una fecha ya ocupada");
            }else{
                //
            }
        },*/


        eventSources: {
            url: baseURL + "/evento/mostrar",
            method: "POST",
            extraParams: {
                _token: formulario._token.value,
            },
        },




        dateClick: function (info) {



            formulario.reset();
            formulario.start.value = info.dateStr;
            formulario.end.value = info.dateStr;


            if(bandera == true){
                $("#evento").modal("hide");
                bandera = false;
            }else{
                $("#evento").modal("show");
            }

        },

        eventClick: function (info) {
            var evento = info.event;
            console.log(evento);
           // console.log(evento.start); //Wed Sep 01 2021 00:00:00 GMT-0500 (hora de verano central)

            axios
                .post(baseURL + "/evento/editar/" + info.event.id)
                .then((respuesta) => {
                    formulario.id.value = respuesta.data.id;
                    formulario.title.value = respuesta.data.title;
                    formulario.descripcion.value = respuesta.data.descripcion;
                    formulario.start.value = respuesta.data.start;
                    formulario.end.value = respuesta.data.end;
                    if(bandera == true){
                        $("#evento").modal("hide");
                        bandera = false;
                    }else{
                        $("#evento").modal("show");
                    }
                })
                .catch(error => {
                    if (error.response) {
                        console.log(error.response.data);
                    }
                })
        },


    });




    calendar.render();


    document
        .getElementById("btnGuardar")
        .addEventListener("click", function () {
                enviarDatos("/evento/agregar");

        });
    document
        .getElementById("btnEliminar")
        .addEventListener("click", function () {
            enviarDatos("/evento/borrar/" + formulario.id.value);
        });
    document
        .getElementById("btnModificar")
        .addEventListener("click", function () {
            enviarDatos("/evento/actualizar/" + formulario.id.value);
        });

    function enviarDatos(url) {
        const datos = new FormData(formulario);

        const nuevaURL = baseURL + url;

        axios
            .post(nuevaURL, datos)
            .then((respuesta) => {
                calendar.refetchEvents();
                $("#evento").modal("hide");
            })
            .catch((error) => {
                if (error.response) {
                    console.log(error.response.data);
                }
            });
    }

});
