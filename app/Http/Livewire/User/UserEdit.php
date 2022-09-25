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
    public $roles;
    public $roleOptions;
    public $roleList;
    public $userId;
    public $searchRole;
    
    public function mount()
    {
        $this->roleOptions = Role::all();
    }
    public function setRoles($value)
    {
        if($this->roleOptions->where('name',$value)){
            $this->roles[$value] = $value;
        }
    }
    public function render()
    {
        if (!empty($this->searchRole)) {
            $this->roleList = Role::where('name','like','%'.$this->searchRole.'%')->limit(4)->get();
        }else{
            $this->roleList = Role::all();
        }
        $this->upadateRole();
        return view('livewire.user.user-edit');
    }
    public function upadateRole()
    {
        $this->dispatchBrowserEvent('updateRole');
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
            $user->password  = bcrypt($this->password);
            if($user->save()){
                $user->assignRole($this->roles);
                session()->flash('alert','success');
                session()->flash('msg',__('User Berhasil disimpan'));
                if (empty($this->userId)) {
                    $this->resetExcept('roleOptions');
                    $this->roles = [];
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
            $user = User::find($this->userId);
            $this->name = $user->name;
            $this->email = $user->email;
            $this->password = $user->password;
            foreach ($user->roles as $item) {
                $this->roles[$item->name] = $item->name;
            }
            // $this->roles = $user->roles->first()->name;
        }
    }
}
