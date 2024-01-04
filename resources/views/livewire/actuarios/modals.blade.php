<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Actuario</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="noemp"># Empleado</label>
                        <input wire:model="noemp" type="text" class="form-control" id="noemp" placeholder="Noemp">@error('noemp') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="pa">Primer Apellido:</label>
                        <input wire:model="pa" type="text" class="form-control" id="pa" placeholder="Pa">@error('pa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="sa">SEgundo Apellido:</label>
                        <input wire:model="sa" type="text" class="form-control" id="sa" placeholder="Sa">@error('sa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>Ponencia:</label>
                        <select wire:model="ponencias_id" name="ponencias_id" id="ponencias_id" class="form-control">
                            <option value="{{$actuarios->ponencias->id ?? 'Seleccione'}}"> {{$actuarios->ponencias->descripcion ?? '--Seleccione--'}}
                            </option>
                                @foreach ($ponencias as $row)
                                    <option value="{{ $row->id }}">{{$row->descripcion}}</option>
                                @endforeach
                        </select>
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
                <h5 class="modal-title" id="updateModalLabel">Update Actuario</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="noemp"></label>
                        <input wire:model="noemp" type="text" class="form-control" id="noemp" placeholder="Noemp">@error('noemp') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="pa"></label>
                        <input wire:model="pa" type="text" class="form-control" id="pa" placeholder="Pa">@error('pa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="sa"></label>
                        <input wire:model="sa" type="text" class="form-control" id="sa" placeholder="Sa">@error('sa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombre"></label>
                        <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ponencias_id"></label>
                        <input wire:model="ponencias_id" type="text" class="form-control" id="ponencias_id" placeholder="Ponencias Id">@error('ponencias_id') <span class="error text-danger">{{ $message }}</span> @enderror
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
