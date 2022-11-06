<?php

namespace App\Http\Livewire\Config;

use App\Models\Config;
use App\Models\MenuPosition;
use Livewire\Component;

class MenuTop extends Component
{
    public $config;
    public $position_menu;
    public $menu_top;

    public function mount()
    {
        $this->config = Config::getConfig('menu_top');
        $this->position_menu = MenuPosition::getOptions();
        if (!empty($this->config->data['menu_top'])) {
            $this->menu_top = $this->config->data['menu_top'];
        }
    }

    public function render()
    {
        return view('livewire.config.menu-top');
    }
}
