<?php

namespace App\Http\Livewire\Menu;

use App\Models\Menu;
use Livewire\Component;
use Livewire\WithPagination;

class MenuList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refreshDataList'=>'$refresh'];
    public $title;
    public $search;
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $dataMenu = Menu::with('menu_position')->with('menu_parent')->where('title','like','%'.$this->search.'%')->orderBy('order','asc')->paginate(12);
        return view('livewire.menu.menu-list',compact('dataMenu'));
    }
    public function setEdit($id)
    {
        $this->emit('initSetEditData',['menuId'=>$id]);
    }
    public function setDelete($id)
    {
        $this->emit('initSetDeleteData', ['menuId'=>$id]);
    }
}
