<?php

namespace App\Http\Livewire\Product;

use App\Models\ProductCategory;
use Livewire\Component;

class ProductCategoryDelete extends Component
{
    protected $listeners = ['initSetDeleteData'];
    public $categoryId;
    public $title;
    public function render()
    {
        if (!empty($this->categoryId)) {
            $menu = ProductCategory::find($this->categoryId);
            $this->title = $menu->title;
        }
        return view('livewire.product.product-category-delete');
    }
    public function initSetDeleteData($data)
    {
        $this->categoryId = $data['dataId'];
    }
    public function delete()
    {
        ProductCategory::find($this->categoryId)->delete();
        session()->flash('alert','success');
        session()->flash('msg',__('Category Berhasil dihapus'));
        $this->reset();
        $this->emit('refreshDataList');
    }
    public function clear()
    {
        $this->reset();
    }
}
