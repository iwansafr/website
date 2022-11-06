<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
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
        $dataProduct = Product::where('title','like','%'.$this->search.'%')->paginate(12);
        return view('livewire.product.product-list',compact('dataProduct'));
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
