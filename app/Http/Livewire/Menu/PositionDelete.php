<?php

namespace App\Http\Livewire\Menu;

use App\Models\MenuPosition;
use Livewire\Component;

class PositionDelete extends Component
{
    protected $listeners = ['initSetDeleteData'];
    public $menuId;
    public $title;
    public function render()
    {
        if (!empty($this->menuId)) {
            $menu = MenuPosition::find($this->menuId);
            $this->title = $menu->title;
        }
        return view('livewire.menu.position-delete');
    }
    public function initSetDeleteData($data)
    {
        $this->menuId = $data['menuId'];
    }
    public function delete()
    {
        MenuPosition::find($this->menuId)->delete();
        session()->flash('alert','success');
        session()->flash('msg',__('Menu Position Berhasil dihapus'));
        $this->reset();
        $this->emit('refreshDataList');
    }
    public function clear()
    {
        $this->reset();
    }
}
