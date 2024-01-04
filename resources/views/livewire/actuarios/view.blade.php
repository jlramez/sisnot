@section('title', __('Actuarios'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-users"></i>
							Listado de actuarios </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar actuarios ...">
						</div>
						<div class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i> Nuevo actuario
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.actuarios.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>No. Empleado</th>
								<th>Primer Apellido</th>
								<th>Segundo Apellido</th>
								<th>Nombre</th>
								<th>Ponencia</th>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@forelse($actuarios as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->noemp }}</td>
								<td>{{ $row->pa }}</td>
								<td>{{ $row->sa }}</td>
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->ponencias->descripcion }}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Acciones
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirmar borrar actuario id {{$row->id}}? \nLos registtros eliminados no podrán recuperarse!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a></li>  
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
					<div class="float-end">{{ $actuarios->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>