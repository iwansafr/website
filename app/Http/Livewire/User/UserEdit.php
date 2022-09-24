<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserEdit extends Component
{
    protected $listeners = ['initSetEditUser'];
    public $name;
    public $email;
    public $password;
    public $roles = [];
    public $roleOptions;
    public $userId;
    
    public function mount()
    {
        $roleOptions = Role::all();
        foreach ($roleOptions as $item) {
            $this->roleOptions[$item->name] = $item->name;
        }
    }
    public function render()
    {
        return view('livewire.user.user-edit');
    }
    public function save()
    {
        $this->validate([
            'name' => 'required|unique:users,name,'.$this->userId,
            'email' => 'required|unique:users,email,'.$this->userId,
            'password' => 'required',
            'roles' => 'required',
        ]);

        try {
            if($this->userId > 0){
                $user = User::find($this->userId);
            }else{
                $user = new User();
            }
    
            $user->name  = $this->name;
            $user->email  = $this->email;
            $user->password  = $this->password;
            if($user->save()){
                $user->assignRole($this->roles);
                session()->flash('alert','success');
                session()->flash('msg',__('User Berhasil disimpan'));
                if (empty($this->userId)) {
                    $this->resetExcept('roleOptions');
                }
                $this->emit('refreshUserList');
            }
        } catch (\Throwable $th) {
            session()->flash('alert','danger');
            session()->flash('msg',$th);
        }
    }
    public function clear()
    {
        $this->resetExcept('roleOptions');
        $this->userId  = 0;
    }
    public function initSetEditUser($data)
    {
        $this->userId = $data['userId'];
        if ($this->userId > 0) {
            $role = User::find($this->userId);
            $this->name = $role->name;
        }
    }
}
