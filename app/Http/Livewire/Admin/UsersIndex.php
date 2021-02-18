<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use withPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function limpiarPage(){
        $this->reset('page');
    }


    public function render()
    {

        $usuarios = User::where('name', 'LIKE', '%'. $this->search . '%')
                        ->orWhere('email', 'LIKE', '%'. $this->search . '%')
                        ->paginate(20);

        return view('livewire.admin.users-index', compact('usuarios'));
    }
}
