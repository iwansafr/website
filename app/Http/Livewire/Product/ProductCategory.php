<?php

namespace App\Http\Livewire\Product;

use App\Models\ProductCategory as ModelsProductCategory;
use Livewire\Component;
use Livewire\WithPagination;

class ProductCategory extends Component
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
        $dataCategory = ModelsProductCategory::with('parentCategory')->where('title','like','%'.$this->search.'%')->paginate(12);
        return view('livewire.product.product-category',compact('dataCategory'));
    }
    public function setEdit($id)
    {
        $this->emit('initSetEditData',['dataId'=>$id]);
    }
    public function setDelete($id)
    {
        $this->emit('initSetDeleteData', ['dataId'=>$id]);
    }
}
