<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refreshDataList'=>'$refresh'];
    public $title;
    public $search;
    public $cat_id;
    public $category;
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        if(!empty($this->cat_id)){
            $dataProduct = Product::leftJoin('product_category','product_id','=','products.id')->where('product_category.product_category_id',$this->cat_id)->where('products.title','like','%'.$this->search.'%')->paginate(12);
            $this->category = ProductCategory::findOrFail($this->cat_id);
            $dataProduct->transform(function($item, $key){
                $item->category = $this->category->title;
                return $item;
            });
            // dd($dataProduct);
        }else{
            $dataProduct = Product::where('title','like','%'.$this->search.'%')->paginate(12);
        }
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
