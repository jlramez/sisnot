@section('title', __('Expedientes'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-file"></i>
							Listado de expedientes a notificar</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar expedientes ...">
						</div>
							<div class="float-right">							
									<button type="button" wire:click.prevent="export()" class="btn btn-sm btn-danger">
									<i class="fa-solid fa-file-excel"></i>  Reporte general</button>														 
								<div class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createDataModal">
									<i class="fa fa-plus"></i>  Nuevo expediente
								</div>
							</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.expedientes.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Expediente</th>
								<th>Tipo de expediente</th>
								<th>Actuario asignado</th>
								<th>Tipo de procedimiento</th>
								<th>Tipo de Actuación</th>								
								<th>Fecha inicial (Entrega archivo)</th>
								<th>Fecha asignacion actuario </th>
								<th>Fecha límite notificación</th>
								<th>Partes notificadas</th>
								<th>Notifiación realizada</th>
								<th>Plazo de notificación</th>
								<th>Días  restantes</th>
								<th>Observaciones</th>
								<th>Semaforización antes de notificar</th>
								
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@forelse($expedientes as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->noexp }}</td>
								<td>{{ $row->tipoods->descripcion ?? 'sin dato'}}</td>
								<td>{{ $row->actuarios->pa }} {{ $row->actuarios->sa }} {{ $row->actuarios->nombre }}</td>
								<td>{{ $row->tipos->descripcion  ?? 'no hay descripción'}}</td>
								<td>{{ $row->actuacion_text ?? 'no hay descripcion' }}</td>
								<td>{{ $row->fecha_inicial }}</td>
								<td>{{ $row->fecha_asignacion  }}</td>
								<td>{{ $row->fecha_limite }}</td>
								<td>
									@foreach($row->asigna_partes as $parte)
									<span class="badge bg-secondary">{{$parte->partes->descripcion}} / {{$parte->date}}</span>
							        @endforeach	
								</td>	
								@if ($row->fecha_notificacion==NULL)
									<td align="center"><i class="fa-solid fa-xmark text-danger"></i></td>
									@else 
									<td  align="center"><i class="fa-solid fa-check text-success"></i></td>
								@endif
								<td>{{ abs((strtotime($row->fecha_limite) - strtotime($row->fecha_inicial))/(60 * 60)/24) }}</td>
								@if ( $row->fecha_notificacion)
									<td>{{ ((strtotime($row->fecha_limite) - strtotime($row->fecha_notificacion))/(60 * 60)/24) }}</td>
									@else
										<td>{{ ((strtotime($row->fecha_limite) - strtotime(date('Y-m-d')))/(60 * 60)/24)}}  </td>
								
								@endif
								<td>{{ $row->observaciones }}</td>
								<!--SEMAFORO-->
								@if($row->fecha_notificacion)
								<td><span class="badge bg-success">Notificado</span></td>
								@endif
								@if(is_null($row->fecha_notificacion))
																													
												@if ((strtotime($row->fecha_limite) - strtotime(date('Y-m-d')))/(60 * 60)/24<0)
														<td class="table-danger"> Vencido</td>
													@elseif (abs((strtotime($row->fecha_limite) - strtotime(date('Y-m-d')))/(60 * 60)/24)>=0 && abs((strtotime($row->fecha_limite) - strtotime(date('Y-m-d')))/(60 * 60)/24)<5)
																<td class="table-warning">  Riesgo vencimiento</td>
													
												@endif
												@if (((strtotime($row->fecha_limite) - strtotime(date('Y-m-d')))/(60 * 60)/24)>=5)
														<td class="table-success"> A tiempo </td>
															
												@endif
													
								@endif
								<!--SEMAFORO-->

								
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Acciones
										</a>
										<ul class="dropdown-menu">
											<!--<li><a class="dropdown-item" wire:click="notify({{$row->id}})"><i class="fa fa-check"></i> Notificar/ Cancelar notificación</a></li>-->
											<li><div class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addnotificationModal" wire:click="addnotifications({{$row->id}})"><i class="fa fa-circle-check"></i> Notificar partes </a></li>
											<li><div class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addcommentModal" wire:click="addcomment({{$row->id}})"><i class="fa fa-comment"></i> Observaciones </a></li>
											
											@role(['admin','coordinador'])
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a></li>
											@endrole
											@role(['admin','coordinador'])
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Expediente id {{$row->id}}? \nDeleted Expedientes cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a></li>  
											@endrole
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
					<div class="float-end">{{ $expedientes->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>