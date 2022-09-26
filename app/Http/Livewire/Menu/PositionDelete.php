<?php

namespace App\Http\Livewire\Menu;

use App\Models\MenuPosition;
use Livewire\Component;

class PositionDelete extends Component
{
    protected $listeners = ['initSetDeleteData'];
    public $positionId;
    public $title;
    public function render()
    {
        if (!empty($this->positionId)) {
            $menu = MenuPosition::find($this->positionId);
            $this->title = $menu->title;
        }
        return view('livewire.menu.position-delete');
    }
    public function initSetDeleteData($data)
    {
        $this->positionId = $data['positionId'];
    }
    public function delete()
    {
        MenuPosition::find($this->positionId)->delete();
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
