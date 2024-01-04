document.addEventListener
      ('DOMContentLoaded', function() 
        {
          var calendarEl = document.getElementById('agenda');
          let formulario=document.querySelector("#formularioEventos");
          var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale:'es',
            displayEventTime:false,
            headerToolbar: {
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth,listWeek',
            },
            eventSources:
          {
            url: baseURL+"/evento/show",
            method: "POST",
            extraParams: 
            {
                _token:formulario._token.value,
                id: formulario.areaid.value,
            }
          },
          dateClick:function(info)
          {
            formulario.reset();
            formulario.start.value=info.dateStr;
            formulario.end.value=info.dateStr;
            const addModal = new bootstrap.Modal('#evento');
            $("#evento").modal("show");
          },
          eventClick: function(info){
            var evento=info.event;
            console.log(evento);
            axios.post(baseURL+"/evento/edit/"+info.event.id).
            then(
                (respuesta) => {
                    formulario.id.value=respuesta.data.id;
                    formulario.title.value=respuesta.data.title;
                    formulario.descripcion.value=respuesta.data.descripcion;
                    formulario.start.value=respuesta.data.start;
                    formulario.end.value=respuesta.data.end;
                    formulario.areas_id.value=respuesta.data.areas_id;
                    
                }
            ).catch(
                error=>{
                    if(error.response)
                    {
                        console.log(error.response.data);
                    }
                }
            )

          }
            
          });
          calendar.render();
          function enviarDatos(url)
          {
              const datos= new FormData(formulario);
              const nuevaURL= baseURL+url;

              axios.post(nuevaURL,datos).
              then(
                  (respuesta) => {
                      calendar.refetchEvents();
                      $("#evento").modal("hide");
                  }
              ).catch(
                  error=>{
                      if(error.response)
                      {
                          console.log(error.response.data);
                      }
                  }
              )
          }
        }
      );