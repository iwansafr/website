<?php

namespace App\Http\Livewire\Menu;

use App\Models\Menu;
use Livewire\Component;

class MenuDelete extends Component
{
    protected $listeners = ['initSetDeleteData'];
    public $menuId;
    public $title;
    public function render()
    {
        if (!empty($this->menuId)) {
            $menu = Menu::find($this->menuId);
            $this->title = $menu->title;
        }
        return view('livewire.menu.menu-delete');
    }
    public function initSetDeleteData($data)
    {
        $this->menuId = $data['menuId'];
    }
    public function delete()
    {
        Menu::find($this->menuId)->delete();
        session()->flash('alert','success');
        session()->flash('msg',__('Menu Berhasil dihapus'));
        $this->reset();
        $this->emit('refreshDataList');
    }
    public function clear()
    {
        $this->reset();
    }
}
