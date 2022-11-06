<?php

namespace App\Http\Livewire\Public;

use App\Models\Config;
use Livewire\Component;

class Logo extends Component
{
    public $logoConfig;
    public function mount()
    {
        $this->logoConfig = Config::getConfig('logo');
    }
    public function render()
    {
        $logo = $this->logoConfig->data;
        return view('livewire.public.logo',compact('logo'));
    }
}
