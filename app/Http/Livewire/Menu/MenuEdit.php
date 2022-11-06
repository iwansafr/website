<?php

namespace App\Http\Livewire\Menu;

use App\Models\Menu;
use App\Models\MenuPosition;
use Livewire\Component;

class MenuEdit extends Component
{
    protected $listeners = ['initSetEditData'];
    public $title;
    public $menuPositionOptions;
    public $menuId;
    public $link;
    public $menu_position_id;
    public $parent;
    public $menuParent;
    public $order;
    
    public function mount()
    {
        $menuPosition = MenuPosition::all();
        foreach ($menuPosition as $item) {
            $this->menuPositionOptions[$item->id] = $item->title;
        }
        $menuParent = Menu::where('parent',null)->get();
        foreach ($menuParent as $item) {
            $this->menuParent[$item->id] = $item->title;
        }
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|unique:menus,title,'.$this->menuId,
            'menu_position_id' => 'required',
            'link' => 'required',
        ]);

        try {
            if($this->menuId > 0){
                $menu = Menu::find($this->menuId);
            }else{
                $menu = new Menu();
            }
    
            $menu->title            = $this->title;
            $menu->menu_position_id = $this->menu_position_id;
            $menu->parent           = $this->parent;
            $menu->link             = $this->link;
            $menu->order             = $this->order;
            if($menu->save()){
                session()->flash('alert','success');
                session()->flash('msg',__('Menu Berhasil disimpan'));
                if (empty($this->menuId)) {
                    $this->reset(['title','menu_position_id','parent','link','order']);
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
        $this->reset(['title','menu_position_id','parent','link','order']);
        $this->menuId  = 0;
    }
    public function initSetEditData($data)
    {
        $this->menuId = $data['menuId'];
        if ($this->menuId > 0) {
            $menu = Menu::find($this->menuId);
            $this->title = $menu->title;
            $this->menu_position_id = $menu->menu_position_id;
            $this->parent           = $menu->parent;
            $this->link             = $menu->link;
            $this->order            = $menu->order;
        }
    }
    public function render()
    {
        return view('livewire.menu.menu-edit');
    }
}
