<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Expediente;
use App\Models\Actuario;
use App\Models\Tipo;
use App\Models\Actuacione;
use App\Models\Tipood;
use App\Models\Part;
use App\Models\Asigna_parte;
use carbon\Carbon;
use App\Exports\ExpedientesExport;
use Maatwebsite\Excel\Facades\Excel;



class Expedientes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $actuacion_text, $selected_id, $keyWord, $noexp, $tipoods_id, $tipos_id, $actuaciones_id, $fecha_limite, $fecha_inicial, $fecha_asignacion, $actuarios_id, $observaciones, $partes=[], $fecha_notificacion;

    public function render()
    {
	
		
		$ponencia_id = auth()->user()->ponencias_id;
		
		$keyWord = '%'.$this->keyWord .'%';
		
		if($keyWord<>'%%')
		{
		
				//dd($ponencia_id);
				$expedientes= Expediente::latest()
				->orWhere('noexp', 'LIKE', $keyWord)->where('ponencias_id',$ponencia_id)->latest()
				->paginate(10);
			
	   }
		else
		{
			if($ponencia_id==NULL)
			{
				$expedientes=Expediente::latest()
				->paginate(10);
			}
			else
				{ 
					//dd($ponencia_id);
					$expedientes= Expediente::Where('ponencias_id', $ponencia_id)->latest()
							->paginate(10);
				}
		}
        return view('livewire.expedientes.view', [
			'actuarios' => Actuario::where('ponencias_id', auth()->user()->ponencias_id)
			 ->latest()->get(),
			'tipos' => Tipo::latest()->get(),
			'actuaciones' => Actuacione::latest()->get(),
			'tipoods' => Tipood::latest()->get(),
			'rsp' => Part::latest()->get(),
			'asigna_partes'=>Asigna_parte::latest()->get(),
			'expedientes' => $expedientes,
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->noexp = null;
		$this->tipoods_id = null;
		$this->tipos_id = null;
		$this->actuacion_text= null;
		$this->fecha_limite = null;
		$this->fecha_inicial = null;
		$this->fecha_asignacion = null;
		$this->actuarios_id=null;
		$this->partes_id=null;
		$this->fecha_notificacion=null;

    }

    public function store()
    {
        
		$this->validate([
		'noexp' => 'required',
		'tipoods_id' => 'required',
		'tipos_id' => 'required',
		'actuacion_text' => 'required',
		'fecha_limite' => 'required',
		'fecha_inicial' => 'required',
		'fecha_asignacion' => 'required',
		'actuarios_id' => 'required'
        ]);

        Expediente::create([ 
			'noexp' => $this-> noexp,
			'tipoods_id' => $this-> tipoods_id,
			'tipos_id' => $this-> tipos_id,
			'actuaciones_id' => $this-> actuaciones_id,
			'actuacion_text' => $this->actuacion_text,
			'fecha_limite' => $this-> fecha_limite,
			'fecha_inicial' => $this-> fecha_inicial,
			'fecha_asignacion' => $this-> fecha_asignacion,
			'actuarios_id' => $this-> actuarios_id,
			'ponencias_id' => auth()->user()->ponencias_id,
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Expediente Successfully created.');
    }

    public function edit($id)
    {
        $record = Expediente::findOrFail($id);
        $this->selected_id = $id; 
		$this->noexp = $record-> noexp;
		$this->tipoods_id = $record-> tipoods_id;
		$this->tipos_id = $record-> tipos_id;
		$this->actuacion_text= $record-> actuacion_text;
		$this->fecha_limite = $record-> fecha_limite;
		$this->fecha_inicial = $record-> fecha_inicial;
		$this->fecha_asignacion = $record-> fecha_asignacion;
		$this->actuarios_id = $record-> actuarios_id;
		
    }

    public function update()
    {
        $this->validate([
		'noexp' => 'required',
		'tipoods_id' => 'required',
		'tipos_id' => 'required',
		'actuacion_text' => 'required',
		'fecha_limite' => 'required',
		'fecha_inicial' => 'required',
		'fecha_asignacion' => 'required',
		'actuarios_id' => 'required',
		
		
        ]);

        if ($this->selected_id) {
			$record = Expediente::find($this->selected_id);
            $record->update([ 
			'noexp' => $this-> noexp,
			'tipoods_id' => $this-> tipoods_id,
			'tipos_id' => $this-> tipos_id,
			'actuacion_text' => $this-> actuacion_text,
			'fecha_limite' => $this-> fecha_limite,
			'fecha_inicial' => $this-> fecha_inicial,
			'fecha_asignacion' => $this-> fecha_asignacion,
			'actuarios_id' => $this-> actuarios_id,
			'ponencias_id' => auth()->user()->ponencias_id,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Expediente Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Expediente::where('id', $id)->delete();
        }
    }

	public function notify($id)
    {
        if ($id) 
		{
			$record = Expediente::find($id);
            if($record->fecha_notificacion)
			  {
				$record->fecha_notificacion = NULL;
				$record->save();         
				session()->flash('message', 'Notificación cancelada satisfactoriamente.');
			  }
			  else
			  	{
					$record->fecha_notificacion = carbon::parse(now())->toDateString();
					$record->save();         
					session()->flash('message', 'Notificación realizada satisfactoriamente.');
			  	}
        }
    }
	public function addcomment($id)
    {
        $this->selected_id = $id; 				
    }
	public function store_comment()
    {
        $this->validate([
		'observaciones' => 'required',
	
		
        ]);
		
        if ($this->selected_id) {
			$record = Expediente::find($this->selected_id);
            $record->update([ 
			'observaciones' => $this-> observaciones,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Observación alacenada correctamente.');
        }
    }
	public function addnotifications($id)
    {
        
        $record = Expediente::findOrFail($id);
        $this->selected_id = $id; 
		$this->noexp = $record-> noexp;

    }
	public function store_parts()
    {
        
        $this->validate([
            'partes' => 'required',
			'fecha_notificacion' => 'required',
          
            ]);
           
            
			foreach ($this->partes as $partes_id=>$valor)
    		{
				//dd($this->selected_id,$valor,$this->fecha_notificacion);	
				if ($this->selected_id)
					{
						$record=Expediente::find($this->selected_id);
						if($record->fecha_notificacion==NULL)
							{
								$record->fecha_notificacion=$this->fecha_notificacion;
								$record->save();
							}
					}
				Asigna_parte::create([ 
					'expedientes_id' => $this-> selected_id,
					'partes_id' => $valor,
					'date' => $this-> fecha_notificacion,
				]);
            }
            $this->resetInput();
			$this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Notificacion realizada correctamente.');
    }
	public function export() 
    {
        return Excel::download(new ExpedientesExport, 'expedientes_2023.xlsx');
    }
}