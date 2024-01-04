@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header"><h5><span class="text-center fa fa-home"></span> @yield('title')</h5></div>
			<div class="card-body">
				<h5>Hola <strong>{{ Auth::user()->name }},</strong> {{ __('haz ingresado a ') }}{{ config('app.name', 'Laravel') }}</h5>
				</br> 
				<hr>
								
			<div class="row">
					<div class="col-md-3">
						<div class="small-box bg-info">
							<div class="inner">
							  <h3>150</h3>
							  <p>Total de Notificaciones</p>
							</div>
							<div class="icon">
							  <i class="fas fa-folder"></i>
							</div>
							<a href="#" class="small-box-footer">
							 <i class="fas fa-arrow-circle-right"></i>
							</a>
						</div>
						  
						  
					</div>
					<div class="col-md-3">
						<div class="small-box">
						<div class="inner">
							<h3>23</h3>
							<p>Notificaciones realizadas a tiempo</p>
						</div>
						<div class="icon">
							<i class="fas fa-check"></i>
						</div>
						<a href="#" class="small-box-footer">
							 <i class="fas fa-arrow-circle-right"></i>
						</a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="small-box bg-gradient-warning">
							<div class="inner">
								<h3>44</h3>
								<p>Notificaciones realizadas en riesgo de no ser notificadas</p>
							</div>
							<div class="icon">
								<i class="fas fa-question"></i>
							</div>
							<a href="#" class="small-box-footer">
								 <i class="fas fa-arrow-circle-right"></i>
							</a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="small-box bg-gradient-danger">
							<div class="inner">
							  <h3>70</h3>
							  <p>Notificaciones no realizadas</p>
							</div>
							<div class="icon">
							  <i class="fas fa-xmark"></i>
							</div>
							<a href="#" class="small-box-footer">
							   <i class="fas fa-arrow-circle-right"></i>
							</a>
						  </div>
					</div>
				 </div>				
			</div>
		</div>
	</div>
</div>
</div>
@endsection