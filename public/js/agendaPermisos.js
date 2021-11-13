//nos sirve para multiples vistas con una misma consulta 
document.addEventListener('DOMContentLoaded', function() {

  let formulario2 = document.querySelector("#formularioPermiso");

  var calendar = document.getElementById('agendaPermiso');
  var calendar2 = new FullCalendar.Calendar(calendar, {
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
      url: baseURL+"/calendarioPermiso/mostrar",
      method:"POST",
      extraParams:{
        _token: formulario2._token.value,
      }
    },

    dateClick:function(info){
      formulario2.reset();
      formulario2.start.value=info.dateStr;
      formulario2.end.value=info.dateStr;

        $("#eventoPermiso").modal("show");
    },

    eventClick:function(info){
      var evento = info.event;
      console.log(evento);
      axios.post(baseURL+"/calendarioPermiso/editar/"+info.event.id).
      then(
        (respuesta) => {
          formulario2.id.value=respuesta.data.id;
          formulario2.title.value=respuesta.data.title;
          formulario2.descripcion.value=respuesta.data.descripcion;
          formulario2.start.value=respuesta.data.start;
          formulario2.end.value=respuesta.data.end;
          $("#eventoPermiso").modal("show");
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
  calendar2.render();
  document.getElementById("btnGuardar").addEventListener("click",function(){
      enviarDatos("/calendarioPermiso/agregar");
      

  });
  document.getElementById("btnEliminar").addEventListener("click",function(){
    enviarDatos("/calendarioPermiso/borrar/"+formulario2.id.value);
  });
  document.getElementById("btnModificar").addEventListener("click",function(){
    enviarDatos("/calendarioPermiso/actualizar/"+formulario2.id.value);
  });

  function enviarDatos(url){
    const datos = new FormData(formulario2);
    const nuevaURL = baseURL+url;
    console.log(nuevaURL);
''
    axios.post(nuevaURL,datos).
    then(
      (respuesta) => {
        calendar2.refetchEvents();
        $("#eventoPermiso").modal("hide");
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