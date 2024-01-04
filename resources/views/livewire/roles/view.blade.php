@section('title', __('Roles'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-user-lock"></i>
							Listado de roles </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar roles ...">
						</div>
						<div class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Nuevo rol
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.roles.modals')
						@include('livewire.roles.addpermission')
						@include('livewire.roles.updatepermission')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Name</th>
								<th>Guard Name</th>
								<th>Permisos</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($roles as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->name }}</td>
								<td>{{ $row->guard_name }}</td>
								<td>
									@foreach($row->getPermissionNames() as $permiso)
									<span class="badge bg-secondary">{{$permiso}}</span>
							        @endforeach	
								</td>	
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Acciones
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#addpermissionModal" class="dropdown-item" wire:click="addpermissions({{$row->id}})"><i class="fa fa-plus-circle"></i> Asignar Permisos </a>
											<li><a data-bs-toggle="modal" data-bs-target="#updatepermissionModal" class="dropdown-item" wire:click="editpermissions({{$row->id}})"><i class="fa fa-minus-circle"></i> Editar Permisos </a>
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Role id {{$row->id}}? \nDeleted Roles cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a></li>  
										</ul>
									</div>								
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No data Found </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $roles->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>