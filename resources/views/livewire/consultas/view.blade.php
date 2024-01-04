@section('title', __('Consultas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fa-solid fa-magnifying-glass"></i>
							Listado para consulta de expedientes </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar  expedientes ...">
						</div>
						<div class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Nuevo expediente
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.consultas.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>No</th>
								<th>Original ó duplicado</th>
								<th>No. de expediente</th>
								<th>Actor</th>
								<th>Demandado</th>
								<th>Fecha Audiencia</th>
								<th>Estado procesal</th>
								<th>Área</th>
								<th>Ser público</th>
								<th>Fecha Registro</th>
								<th>Estatus (Archivo)</th>
								<th>Observaciones</th>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@forelse($consultas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->no }}</td>
								<td>{{ $row->tipoods_id }}</td>
								<td>{{ $row->noexp }}</td>
								<td>{{ $row->actor }}</td>
								<td>{{ $row->demandado }}</td>
								<td>{{ $row->fecha_audiencia }}</td>
								<td>{{ $row->estados_id }}</td>
								<td>{{ $row->areas_id }}</td>
								<td>{{ $row->empleados_id }}</td>
								<td>{{ $row->fecha_registro }}</td>
								<td>{{ $row->estatus }}</td>
								<td>{{ $row->observaciones }}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Acciones
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Consulta id {{$row->id}}? \nDeleted Consultas cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a></li>  
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
					<div class="float-end">{{ $consultas->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>