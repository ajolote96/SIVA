document.addEventListener('DOMContentLoaded', function() {

    let formulario3 = document.querySelector("#formularioCursos");

    var calendarCur = document.getElementById('agendaCursos');
    var calendar3 = new FullCalendar.Calendar(calendarCur, {
      initialView: 'dayGridMonth',
      locale:"es",
      displayEventTime:TextTrackCueList,

      headerToolbar: {
        left:'prev,next prevYear,nextYear today',
        center:'title',
        right:'dayGridMonth, dayGridWeek, timeGridDay',
      },

      //events: baseURL+"/evento/mostrar",

      eventSources:{
        url: baseURL+"/calendarioCursos/mostrar",
        method:"POST",
        extraParams:{
          _token: formulario3._token.value,
        }
      },

      dateClick:function(info){
        formulario3.reset();
        formulario3.start.value=info.dateStr;
        formulario3.end.value=info.dateStr;

          $("#eventoCurso").modal("show");
      },

      eventClick:function(info){
        var evento = info.event;
        console.log(evento);
        
        axios.post(baseURL+"/calendarioCursos/editar/"+info.event.id).
        then(
          (respuesta) => {
            formulario3.id.value=respuesta.data.id;
            formulario3.title.value=respuesta.data.title;
            formulario3.descripcion.value=respuesta.data.descripcion;
            formulario3.start.value=respuesta.data.start;
            formulario3.end.value=respuesta.data.end;
            $("#eventoCurso").modal("show");
          }
          ).catch(
            error=>{
              if(error.response){
                console.log(error.response.data);
              }
            }

          )



      }

    });
    calendar3.render();
    document.getElementById("btnGuardar").addEventListener("click",function(){
        enviarDatos("/calendarioCursos/agregar");
        

    });
    document.getElementById("btnEliminar").addEventListener("click",function(){
      enviarDatos("/calendarioCursos/borrar/"+formulario3.id.value);
    });
    document.getElementById("btnModificar").addEventListener("click",function(){
      enviarDatos("/calendarioCursos/actualizar/"+formulario3.id.value);
    });

    function enviarDatos(url){

      const datos = new FormData(formulario3);

      const nuevaURL = baseURL+url;

      axios.post(nuevaURL,datos).
      then(
        (respuesta) => {
          calendar3.refetchEvents();
          $("#eventoCurso").modal("hide");
        }
        ).catch(
          error=>{
            if(error.response){
              console.log(error.response.data);
            }
          }

        )

    }



  });
