<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class UserDelete extends Component
{
    protected $listeners = ['initSetDeleteUser'];
    public $userId;
    public $name;
    public function render()
    {
        if (!empty($this->userId)) {
            $user = User::find($this->userId);
            $this->name = $user->name;
        }
        return view('livewire.user.user-delete');
    }
    public function initSetDeleteUser($data)
    {
        $this->userId = $data['userId'];
    }
    public function delete()
    {
        User::find($this->userId)->delete();
        session()->flash('alert','success');
        session()->flash('msg',__('User Berhasil dihapus'));
        $this->reset();
        $this->emit('refreshUserList');
    }
    public function clear()
    {
        $this->reset();
    }
}
