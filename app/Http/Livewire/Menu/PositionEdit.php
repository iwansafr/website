<?php

namespace App\Http\Livewire\Menu;

use App\Models\Menu;
use Livewire\Component;

class PositionEdit extends Component
{protected $listeners = ['initSetEditData'];
    public $title;
    public $menuId;
    
    public function render()
    {
        return view('livewire.menu.position-edit');
    }
    public function save()
    {
        $this->validate([
            'title' => 'required|unique:menus,title,'.$this->menuId
        ]);

        try {
            if($this->menuId > 0){
                $menu = Menu::find($this->menuId);
            }else{
                $menu = new Menu();
            }
    
            $menu->title  = $this->title;
            if($menu->save()){
                session()->flash('alert','success');
                session()->flash('msg',__('Menu Berhasil disimpan'));
                if (empty($this->menuId)) {
                    $this->reset();
                }
                $this->emit('refreshDataList');
            }
        } catch (\Throwable $th) {
            session()->flash('alert','danger');
            session()->flash('msg',$th);
        }
    }
    public function clear()
    {
        $this->reset();
        $this->menuId  = 0;
    }
    public function initSetEditData($data)
    {
        $this->menuId = $data['menuId'];
        if ($this->menuId > 0) {
            $menu = Menu::find($this->menuId);
            $this->title = $menu->title;
        }
    }
}
