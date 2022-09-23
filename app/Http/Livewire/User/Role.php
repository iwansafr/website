<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends Component
{
    public $name;
    public $roleId = 0;
    public function render()
    {
        $dataRole = ModelsRole::all();
        return view('livewire.user.role',compact('dataRole'));
    }
    public function save()
    {
        $this->validate([
            'name' => 'required|unique:roles,name'
        ]);

        $this->roleId  = 0;
    }
}
