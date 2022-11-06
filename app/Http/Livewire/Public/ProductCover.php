<?php

namespace App\Http\Livewire\Public;

use App\Models\Config;
use App\Models\Product;
use Livewire\Component;

class ProductCover extends Component
{
    public $product_cover;
    public $category_id = 0;

    public function mount()
    {
        $config = Config::getConfig('product_cover');
        if(!empty($config->data['product_category_id'])){
            $this->category_id = $config->data['product_category_id'];
        }
        $this->product_cover = Product::with(['categories'=>function($query){
            $query->where('product_category_id', $this->category_id);
        }])->get();

    }
    public function render()
    {
        return view('livewire.public.product-cover');
    }
}
