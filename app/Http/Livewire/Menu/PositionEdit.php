<?php

namespace App\Http\Livewire\Menu;

use App\Models\MenuPosition;
use Livewire\Component;

class PositionEdit extends Component
{
    protected $listeners = ['initSetEditData'];
    public $title;
    public $positionId;
    
    public function render()
    {
        return view('livewire.menu.position-edit');
    }
    public function save()
    {
        $this->validate([
            'title' => 'required|unique:menu_positions,title,'.$this->positionId
        ]);

        try {
            if($this->positionId > 0){
                $menu = MenuPosition::find($this->positionId);
            }else{
                $menu = new MenuPosition();
            }
    
            $menu->title  = $this->title;
            if($menu->save()){
                session()->flash('alert','success');
                session()->flash('msg',__('Menu Position Berhasil disimpan'));
                if (empty($this->positionId)) {
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
        $this->positionId  = 0;
    }
    public function initSetEditData($data)
    {
        $this->positionId = $data['positionId'];
        if ($this->positionId > 0) {
            $menu = MenuPosition::find($this->positionId);
            $this->title = $menu->title;
        }
    }
}
