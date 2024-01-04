<<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/locales-all.js"></script>
  </head>
</html>
@extends('layouts.app')
@section('content')
<div class="container">
    <div id="agenda"></div>
</div>

<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
        let formulario=document.querySelector("#formularioEventos");
        var calendarEl = document.getElementById('agenda');        
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale:"es",
          displayEventTime:false,
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,listWeek',
          },
          //events: baseURL+"/evento/show" ,
          eventSources:
          {
            url: baseURL+"/evento/show",
            method: "POST",
            extraParams: 
            {
                _token:formulario._token.value,
                id: formulario.userid.value,
            }
          },
          dateClick:function(info)
          {
            formulario.reset();
            formulario.start.value=info.dateStr;
            formulario.end.value=info.dateStr;
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
                    formulario.users_id.value=respuesta.data.users_id;
                    $("#evento").modal("show");
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

        document.getElementById("btnGuardar").addEventListener("click",function()
        {
            
            enviarDatos("/evento/create");
        });
        document.getElementById("btnEliminar").addEventListener("click",function()
        {
            enviarDatos("/evento/delete/"+formulario.id.value);
        });
        document.getElementById("btnUpdate").addEventListener("click",function()
        {
            enviarDatos("/evento/update/"+formulario.id.value);
        });

        function enviarDatos(url){
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
       
      });

    </script>

<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#evento">
  Launch
</button>-->

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="evento" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Datos del evento</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">               
                    <form action="" id="formularioEventos">
                        {!! csrf_field() !!}
                        <div class="form-group d-none">
                          <label for="">Id</label>
                          <input type="text" class="form-control" name="userid" id="userid" aria-describedby="helpId" placeholder="" value={{$id}}>
                          <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                         <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
                        </div>
                        <div class="form-group">
                          <label for="">Titulo</label>
                          <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Escribe el título del evento">
                          <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
                        </div>
                        <div class="form-group">
                          <label for="">Descripción del evento</label>
                          <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                        </div>
                        <div class="form-group d-none">
                          <label for="">Start</label>
                          <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                          <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
                        </div>
                        <div class="form-group d-none">
                          <label for="">End</label>
                          <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                          <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
                        </div>
                        <div class="form-group ">
                          <label for="" >Empleado</label>
                                <select  name="users_id" id="users_id" class="form-control">
                                   <option>--Seleccione el empleado--</option>  
                                   @foreach ($empleados as $row) 
                                    <option  value="{{ $row->id }}">{{ $row->name }}</option>
                                   @endforeach
                              </select> 
                       </div>
                    </form> 
              
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
            <button type="button" class="btn btn-warning" id="btnUpdate">Actualizar</button>
            <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>
@endsection