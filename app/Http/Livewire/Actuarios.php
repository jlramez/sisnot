<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Actuario;
use App\Models\Ponencia;

class Actuarios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $noemp, $pa, $sa, $nombre, $ponencias_id;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.actuarios.view', [
            'ponencias' => Ponencia::latest()->get(),
            'actuarios' => Actuario::latest()
						->orWhere('noemp', 'LIKE', $keyWord)
						->orWhere('pa', 'LIKE', $keyWord)
						->orWhere('sa', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('ponencias_id', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->noemp = null;
		$this->pa = null;
		$this->sa = null;
		$this->nombre = null;
		$this->ponencias_id = null;
    }

    public function store()
    {
        $this->validate([
		'noemp' => 'required',
		'pa' => 'required',
		'sa' => 'required',
		'nombre' => 'required',
		'ponencias_id' => 'required',
        ]);

        Actuario::create([ 
			'noemp' => $this-> noemp,
			'pa' => $this-> pa,
			'sa' => $this-> sa,
			'nombre' => $this-> nombre,
			'ponencias_id' => $this-> ponencias_id
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Actuario Successfully created.');
    }

    public function edit($id)
    {
        $record = Actuario::findOrFail($id);
        $this->selected_id = $id; 
		$this->noemp = $record-> noemp;
		$this->pa = $record-> pa;
		$this->sa = $record-> sa;
		$this->nombre = $record-> nombre;
		$this->ponencias_id = $record-> ponencias_id;
    }

    public function update()
    {
        $this->validate([
		'noemp' => 'required',
		'pa' => 'required',
		'sa' => 'required',
		'nombre' => 'required',
		'ponencias_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Actuario::find($this->selected_id);
            $record->update([ 
			'noemp' => $this-> noemp,
			'pa' => $this-> pa,
			'sa' => $this-> sa,
			'nombre' => $this-> nombre,
			'ponencias_id' => $this-> ponencias_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Actuario Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Actuario::where('id', $id)->delete();
        }
    }
}