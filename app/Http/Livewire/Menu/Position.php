<?php

namespace App\Http\Livewire\Menu;

use App\Models\Menu;
use Livewire\Component;
use Livewire\WithPagination;

class Position extends Component
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
        $dataMenu = Menu::where('title','like','%'.$this->search.'%')->paginate(12);
        return view('livewire.menu.position',compact('dataMenu'));
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
