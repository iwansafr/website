<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $name;
    public $password;
    public $remember_me;
    public function render()
    {
        return view('livewire.auth.login');
    }
    public function login()
    {
        $this->validate([
            'name'=>'required',
            'password'=>'required'
        ]);

        if(Auth::attempt(['name'=>$this->name,'password'=>$this->password],$this->remember_me)){
            return redirect()->route('admin');
        }else{
            session()->flash('alert','danger');
            session()->flash('msg','Username atau Sandi tidak sesuai');
        }
    }
}
