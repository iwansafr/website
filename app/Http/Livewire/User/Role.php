<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name;
    public $roleId = 0;
    public function render()
    {
        $dataRole = ModelsRole::paginate(3);
        return view('livewire.user.role',compact('dataRole'));
    }
    public function save()
    {
        $this->validate([
            'name' => 'required|unique:roles,name,'.$this->roleId
        ]);

        try {
            if($this->roleId > 0){
                $role = ModelsRole::find($this->roleId);
            }else{
                $role = new ModelsRole();
            }
    
            $role->name  = $this->name;
            $role->guard_name = 'web';
            if($role->save()){
                session()->flash('alert','success');
                session()->flash('msg',__('Role Berhasil disimpan'));
                $this->reset();
            }
        } catch (\Throwable $th) {
            session()->flash('alert','danger');
            session()->flash('msg',$th);
        }

        $this->roleId  = 0;
    }
}
