<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
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
        $dataCategory = Category::where('title','like','%'.$this->search.'%')->paginate(12);
        return view('livewire.category.category-list',compact('dataCategory'));
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
