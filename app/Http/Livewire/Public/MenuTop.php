<?php

namespace App\Http\Livewire\Public;

use App\Models\Config;
use App\Models\Menu;
use Livewire\Component;

class MenuTop extends Component
{
    public $menu_top;

    public function mount()
    {
        $config = Config::getConfig('menu_top');
        $position_id = 0;
        if(!empty($config->data['menu_top'])){
            $position_id = $config->data['menu_top'];
        }
        $this->menu_top = Menu::where('menu_position_id', $position_id)->orderby('order','asc')->get();
    }

    public function render()
    {
        return view('livewire.public.menu-top');
    }
}
