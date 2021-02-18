<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Establecimiento;

class EstablecimientosIndex extends Component
{

    use withPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {

        $establecimientos = Establecimiento::where('nombre','LIKE', '%' . $this->search . '%')->latest('id')->paginate(20);

        return view('livewire.admin.establecimientos-index', compact('establecimientos'));
    }
}
