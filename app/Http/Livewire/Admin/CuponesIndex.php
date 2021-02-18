<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cupon;
use Livewire\Component;
use Livewire\WithPagination;

class CuponesIndex extends Component
{
    use withPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $cupones = Cupon::where('nombre','LIKE', '%' . $this->search . '%')->latest('id')->paginate(20);

        return view('livewire.admin.cupones-index', compact('cupones'));
    }
}
