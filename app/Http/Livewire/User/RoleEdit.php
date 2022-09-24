<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleEdit extends Component
{
    protected $listeners = ['initSetEditRole'];
    public $name;
    public $roleId;
    public function render()
    {
        if ($this->roleId > 0) {
            $role = Role::find($this->roleId);
            $this->name = $role->name;
        }
        return view('livewire.user.role-edit');
    }
    public function save()
    {
        $this->validate([
            'name' => 'required|unique:roles,name,'.$this->roleId
        ]);

        try {
            if($this->roleId > 0){
                $role = Role::find($this->roleId);
            }else{
                $role = new Role();
            }
    
            $role->name  = $this->name;
            $role->guard_name = 'web';
            if($role->save()){
                session()->flash('alert','success');
                session()->flash('msg',__('Role Berhasil disimpan'));
                $this->reset();
                $this->emit('refreshRoleList');
            }
        } catch (\Throwable $th) {
            session()->flash('alert','danger');
            session()->flash('msg',$th);
        }
    }
    public function clear()
    {
        $this->reset();
        $this->roleId  = 0;
    }
    public function initSetEditRole($data)
    {
        $this->roleId = $data['roleId'];
    }
}
