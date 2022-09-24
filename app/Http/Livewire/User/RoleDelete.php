<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleDelete extends Component
{
    protected $listeners = ['initSetDeleteRole'];
    public $roleId;
    public $name;
    public function render()
    {
        if (!empty($this->roleId)) {
            $role = Role::find($this->roleId);
            $this->name = $role->name;
        }
        return view('livewire.user.role-delete');
    }
    public function initSetDeleteRole($data)
    {
        $this->roleId = $data['roleId'];
    }
    public function delete()
    {
        Role::find($this->roleId)->delete();
        session()->flash('alert','success');
        session()->flash('msg',__('Role Berhasil dihapus'));
        $this->reset();
        $this->emit('refreshRoleList');
    }
    public function clear()
    {
        $this->reset();
    }
}
