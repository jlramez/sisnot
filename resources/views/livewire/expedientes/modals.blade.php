<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Nuevo Expediente</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <small><label for="noexp">No. de expediente</label></small>
                        <input wire:model="noexp" type="text" class="form-control" id="noexp" placeholder="Noexp">@error('noexp') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <small><label>Tipo de expediente:</label></small>
                        <select wire:model="tipoods_id" name="tipoods_id" id="tipoods_id" class="form-control">
                            <option value=""> --Seleccione--
                            </option>
                                @foreach ($tipoods as $row)
                                    <option value="{{ $row->id }}">{{$row->descripcion}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <small><label>Tipo de procedimiento:</label></small>
                        <select wire:model="tipos_id" name="tipos_id" id="tipos_id" class="form-control">
                            <option value="">--Seleccione--
                            </option>
                                @foreach ($tipos as $row)
                                    <option value="{{ $row->id }}">{{$row->descripcion}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <small><label for="noexp">Actuación</label></small>
                        <input wire:model="actuacion_text" type="text" class="form-control" id="actuacion_text" placeholder="Tipo de actuación">@error('actuacion_text') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group d-none">
                        <small><label>Actuación:</label></small>
                        <select wire:model="actuaciones_id" name="actuaciones_id" id="actuaciones_id" class="form-control">
                            <option value=""> --Seleccione--
                            </option>
                                @foreach ($actuaciones as $row)
                                    <option value="{{ $row->id }}">{{$row->descripcion}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <small><label>Actuario asignado:</label></small>
                        <select wire:model="actuarios_id" name="actuarios_id" id="actuarios_id" class="form-control">
                            <option value="">--Seleccione--
                            </option>
                                @foreach ($actuarios as $row)
                                    <option value="{{ $row->id }}">{{$row->nombre}} {{$row->pa}} {{$row->sa}}</option>
                                @endforeach
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <small><label for="fecha_inicial">Fecha entrega a archivo:</label></small>
                        <input wire:model="fecha_inicial" type="date" class="form-control" id="fecha_inicial" placeholder="Fecha Inicial">@error('fecha_inicial') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <small><label for="fecha_asignacion">Fecha asignación a actuario:</label></small>
                        <input wire:model="fecha_asignacion" type="date" class="form-control" id="fecha_asignacion" placeholder="Fecha Asignacion">@error('fecha_asignacion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <small><label for="fecha_límite">Fecha límite de entrega:</label></small>
                        <input wire:model="fecha_limite" type="date" class="form-control" id="fecha_límite" placeholder="Fecha Límite">@error('fecha_límite') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Expediente</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="noexp"></label>
                        <input wire:model="noexp" type="text" class="form-control" id="noexp" placeholder="Noexp">@error('noexp') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <small><label>Tipo de expediente:</label></small>
                        <select wire:model="tipoods_id" name="tipoods_id" id="tipoods_id" class="form-control">
                            <option value=""> --Seleccione--
                            </option>
                                @foreach ($tipoods as $row)
                                    <option value="{{ $row->id }}">{{$row->descripcion}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <small><label>Tipo de procedimiento:</label></small>
                        <select wire:model="tipos_id" name="tipos_id" id="tipos_id" class="form-control">
                            <option value="">--Seleccione--
                            </option>
                                @foreach ($tipos as $row)
                                    <option value="{{ $row->id }}">{{$row->descripcion}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <small><label for="noexp">Actuación</label></small>
                        <input wire:model="actuacion_text" type="text" class="form-control" id="actuacion_text" placeholder="Tipo de actuación">@error('actuacion_text') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <small><label>Actuario asignado:</label></small>
                        <select wire:model="actuarios_id" name="actuarios_id" id="actuarios_id" class="form-control">
                            <option value="">--Seleccione--
                            </option>
                                @foreach ($actuarios as $row)
                                    <option value="{{ $row->id }}">{{$row->nombre}} {{$row->pa}} {{$row->sa}}</option>
                                @endforeach
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <small><label for="fecha_inicial">Fecha entrega a archivo:</label></small>
                        <input wire:model="fecha_inicial" type="date" class="form-control" id="fecha_inicial" placeholder="Fecha Inicial">@error('fecha_inicial') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <small><label for="fecha_asignacion">Fecha asignación a actuario:</label></small>
                        <input wire:model="fecha_asignacion" type="date" class="form-control" id="fecha_asignacion" placeholder="Fecha Asignacion">@error('fecha_asignacion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <small><label for="fecha_límite">Fecha límite de entrega:</label></small>
                        <input wire:model="fecha_limite" type="date" class="form-control" id="fecha_límite" placeholder="Fecha Límite">@error('fecha_límite') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
       </div>
    </div>
</div>

<!-- Comment Modal -->
<div wire:ignore.self class="modal fade" id="addcommentModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Agregar observación</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <div><small><label for="observacion">Observación:</label></small></div>
                        <textarea wire:model="observaciones" id="observaciones" name="observaciones" rows="3" cols="49"></textarea>
                    </div>                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store_comment()" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- addnotification Modal -->
<div wire:ignore.self class="modal fade" id="addnotificationModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Notificación y partes interesadas</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <small><label for="noexp">No. de expediente:</label></small>
                        <input wire:model="noexp" type="text" class="form-control" id="noexp" placeholder="noexp">@error('noexp') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <small><label for="partes">Parte a notificar:</label></small>
                    @foreach ($rsp as $partes)
                    <div class="form-group">
                        
                        <input wire:model="partes" type="checkbox" name="partes_id" id="partes" placeholder="Partes"  value="{{ $partes->id }}" > {{$partes->descripcion}} 
                   </div>
                    @endforeach
                    <div class="form-group">
                        <small><label for="fecha_notificacion">Fecha notificación:</label></small>
                        <input wire:model="fecha_notificacion" type="date" class="form-control" id="fecha_notificacion" placeholder="Fecha Notificació" required>@error('fecha_notificacion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store_parts()" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

