<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Consulta</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="no"></label>
                        <input wire:model="no" type="text" class="form-control" id="no" placeholder="No">@error('no') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <small><label>Original ó duplicado:</label></small>
                        <select wire:model="tipoods_id" name="tipoods_id" id="tipoods_id" class="form-control">
                            <option value="">--Seleccione--
                            </option>
                                @foreach ($tipoods as $row)
                                    <option value="{{ $row->id }}">{{$row->descripcion}}</option>
                                @endforeach
                        </select>
                    <div class="form-group">
                        <label for="noexp"></label>
                        <input wire:model="noexp" type="text" class="form-control" id="noexp" placeholder="Noexp">@error('noexp') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="actor"></label>
                        <input wire:model="actor" type="text" class="form-control" id="actor" placeholder="Actor">@error('actor') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="demandado"></label>
                        <input wire:model="demandado" type="text" class="form-control" id="demandado" placeholder="Demandado">@error('demandado') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_audiencia"></label>
                        <input wire:model="fecha_audiencia" type="text" class="form-control" id="fecha_audiencia" placeholder="Fecha Audiencia">@error('fecha_audiencia') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="estados_id"></label>
                        <input wire:model="estados_id" type="text" class="form-control" id="estados_id" placeholder="Estados Id">@error('estados_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="areas_id"></label>
                        <input wire:model="areas_id" type="text" class="form-control" id="areas_id" placeholder="Areas Id">@error('areas_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="empleados_id"></label>
                        <input wire:model="empleados_id" type="text" class="form-control" id="empleados_id" placeholder="Empleados Id">@error('empleados_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_registro"></label>
                        <input wire:model="fecha_registro" type="text" class="form-control" id="fecha_registro" placeholder="Fecha Registro">@error('fecha_registro') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="estatus"></label>
                        <input wire:model="estatus" type="text" class="form-control" id="estatus" placeholder="Estatus">@error('estatus') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="observaciones"></label>
                        <input wire:model="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones">@error('observaciones') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Consulta</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="no"></label>
                        <input wire:model="no" type="text" class="form-control" id="no" placeholder="No">@error('no') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tipoods_id"></label>
                        <input wire:model="tipoods_id" type="text" class="form-control" id="tipoods_id" placeholder="Tipoods Id">@error('tipoods_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="noexp"></label>
                        <input wire:model="noexp" type="text" class="form-control" id="noexp" placeholder="Noexp">@error('noexp') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="actor"></label>
                        <input wire:model="actor" type="text" class="form-control" id="actor" placeholder="Actor">@error('actor') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="demandado"></label>
                        <input wire:model="demandado" type="text" class="form-control" id="demandado" placeholder="Demandado">@error('demandado') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_audiencia"></label>
                        <input wire:model="fecha_audiencia" type="text" class="form-control" id="fecha_audiencia" placeholder="Fecha Audiencia">@error('fecha_audiencia') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="estados_id"></label>
                        <input wire:model="estados_id" type="text" class="form-control" id="estados_id" placeholder="Estados Id">@error('estados_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="areas_id"></label>
                        <input wire:model="areas_id" type="text" class="form-control" id="areas_id" placeholder="Areas Id">@error('areas_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="empleados_id"></label>
                        <input wire:model="empleados_id" type="text" class="form-control" id="empleados_id" placeholder="Empleados Id">@error('empleados_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_registro"></label>
                        <input wire:model="fecha_registro" type="text" class="form-control" id="fecha_registro" placeholder="Fecha Registro">@error('fecha_registro') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="estatus"></label>
                        <input wire:model="estatus" type="text" class="form-control" id="estatus" placeholder="Estatus">@error('estatus') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="observaciones"></label>
                        <input wire:model="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones">@error('observaciones') <span class="error text-danger">{{ $message }}</span> @enderror
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
