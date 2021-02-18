<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CategoriasIndex extends Component
{
    use withPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {

        $categorias = Category::where('nombre','LIKE', '%' . $this->search . '%')->latest('id')->paginate(20);

        return view('livewire.admin.categorias-index', compact('categorias'));
    }
}
