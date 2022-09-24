<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refreshRoleList'=>'$refresh'];
    public $name;
    public $search;
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $dataRole = ModelsRole::where('name','like','%'.$this->search.'%')->paginate(12);
        return view('livewire.user.role',compact('dataRole'));
    }
    public function setEdit($id)
    {
        $this->emit('initSetEditRole',['roleId'=>$id]);
    }
    public function setDelete($id)
    {
        $this->emit('initSetDeleteRole', ['roleId'=>$id]);
    }
}
