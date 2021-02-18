<?php

namespace App\Http\Livewire\Admin;

use App\Models\Codigo;
use Livewire\Component;
use Livewire\WithPagination;

class CodigosIndex extends Component
{
    use withPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $codigos = Codigo::where('codigo','LIKE', '%' . $this->search . '%')->latest('id')->paginate(20);

        return view('livewire.admin.codigos-index', compact('codigos'));
    }
}
