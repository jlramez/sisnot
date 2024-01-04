<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Consulta;
use App\Models\Tipood;

class Consultas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $no, $tipoods_id, $noexp, $actor, $demandado, $fecha_audiencia, $estados_id, $areas_id, $empleados_id, $fecha_registro, $estatus, $observaciones;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.consultas.view', [
			'tipoods' => Tipood::latest(),
            'consultas' => Consulta::latest()
						->orWhere('no', 'LIKE', $keyWord)
						->orWhere('tipoods_id', 'LIKE', $keyWord)
						->orWhere('noexp', 'LIKE', $keyWord)
						->orWhere('actor', 'LIKE', $keyWord)
						->orWhere('demandado', 'LIKE', $keyWord)
						->orWhere('fecha_audiencia', 'LIKE', $keyWord)
						->orWhere('estados_id', 'LIKE', $keyWord)
						->orWhere('areas_id', 'LIKE', $keyWord)
						->orWhere('empleados_id', 'LIKE', $keyWord)
						->orWhere('fecha_registro', 'LIKE', $keyWord)
						->orWhere('estatus', 'LIKE', $keyWord)
						->orWhere('observaciones', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->no = null;
		$this->tipoods_id = null;
		$this->noexp = null;
		$this->actor = null;
		$this->demandado = null;
		$this->fecha_audiencia = null;
		$this->estados_id = null;
		$this->areas_id = null;
		$this->empleados_id = null;
		$this->fecha_registro = null;
		$this->estatus = null;
		$this->observaciones = null;
    }

    public function store()
    {
        $this->validate([
		'no' => 'required',
		'tipoods_id' => 'required',
		'noexp' => 'required',
		'actor' => 'required',
		'demandado' => 'required',
		'fecha_audiencia' => 'required',
		'estados_id' => 'required',
		'areas_id' => 'required',
		'empleados_id' => 'required',
		'fecha_registro' => 'required',
		'estatus' => 'required',
		'observaciones' => 'required',
        ]);

        Consulta::create([ 
			'no' => $this-> no,
			'tipoods_id' => $this-> tipoods_id,
			'noexp' => $this-> noexp,
			'actor' => $this-> actor,
			'demandado' => $this-> demandado,
			'fecha_audiencia' => $this-> fecha_audiencia,
			'estados_id' => $this-> estados_id,
			'areas_id' => $this-> areas_id,
			'empleados_id' => $this-> empleados_id,
			'fecha_registro' => $this-> fecha_registro,
			'estatus' => $this-> estatus,
			'observaciones' => $this-> observaciones
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Consulta Successfully created.');
    }

    public function edit($id)
    {
        $record = Consulta::findOrFail($id);
        $this->selected_id = $id; 
		$this->no = $record-> no;
		$this->tipoods_id = $record-> tipoods_id;
		$this->noexp = $record-> noexp;
		$this->actor = $record-> actor;
		$this->demandado = $record-> demandado;
		$this->fecha_audiencia = $record-> fecha_audiencia;
		$this->estados_id = $record-> estados_id;
		$this->areas_id = $record-> areas_id;
		$this->empleados_id = $record-> empleados_id;
		$this->fecha_registro = $record-> fecha_registro;
		$this->estatus = $record-> estatus;
		$this->observaciones = $record-> observaciones;
    }

    public function update()
    {
        $this->validate([
		'no' => 'required',
		'tipoods_id' => 'required',
		'noexp' => 'required',
		'actor' => 'required',
		'demandado' => 'required',
		'fecha_audiencia' => 'required',
		'estados_id' => 'required',
		'areas_id' => 'required',
		'empleados_id' => 'required',
		'fecha_registro' => 'required',
		'estatus' => 'required',
		'observaciones' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Consulta::find($this->selected_id);
            $record->update([ 
			'no' => $this-> no,
			'tipoods_id' => $this-> tipoods_id,
			'noexp' => $this-> noexp,
			'actor' => $this-> actor,
			'demandado' => $this-> demandado,
			'fecha_audiencia' => $this-> fecha_audiencia,
			'estados_id' => $this-> estados_id,
			'areas_id' => $this-> areas_id,
			'empleados_id' => $this-> empleados_id,
			'fecha_registro' => $this-> fecha_registro,
			'estatus' => $this-> estatus,
			'observaciones' => $this-> observaciones
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Consulta Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Consulta::where('id', $id)->delete();
        }
    }
}