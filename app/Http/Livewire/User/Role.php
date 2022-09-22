<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends Component
{
    public $name;
    public function render()
    {
        $data = ModelsRole::all();
        return view('livewire.user.role',compact('data'));
    }
    public function save()
    {
        $this->validate(
            ['name'=>'required|unique.roles.id']
        );
    }
}
