<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addpermissionModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addpermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Asignar permisos</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="name"></label>
                <input wire:model="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            @foreach ($rsp as $permiso)
            <div class="form-group">
                <label for="name"></label>
                <input wire:model="permisos" type="checkbox" name="permisos" id="permisos" placeholder="Name"  value="{{ $permiso->name }}" > {{$permiso->name}} 
           </div>
            @endforeach
            <!--<div class="form-group">
                <label for="guard_name"></label>
                <input wire:model="guard_name" value="web" type="text" class="form-control" id="guard_name" placeholder="Guard Name">@error('guard_name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>-->

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="storepermissions()" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>