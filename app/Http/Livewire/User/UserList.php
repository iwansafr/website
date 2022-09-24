<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refreshUserList'=>'$refresh'];
    public $name;
    public $search;
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $dataUser = User::with('roles')->where('name','like','%'.$this->search.'%')->paginate(12);
        return view('livewire.user.user-list',compact('dataUser'));
    }
    public function setEdit($id)
    {
        $this->emit('initSetEditUser',['userId'=>$id]);
    }
    public function setDelete($id)
    {
        $this->emit('initSetDeleteUser', ['userId'=>$id]);
    }
}
