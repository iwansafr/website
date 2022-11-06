<?php

namespace App\Http\Livewire\Config;

use App\Models\Config;
use App\Models\ProductCategory;
use Livewire\Component;

class ProductCover extends Component
{
    public $config;
    public $product_category;
    public $product_category_id;

    public function mount()
    {
        $this->config = Config::getConfig('product_cover');
        $this->product_category = Config::getOptions(new ProductCategory());
        if (!empty($this->config->data['product_category_id'])) {
            $this->product_category_id = $this->config->data['product_category_id'];
        }
    }

    public function save()
    {
        try {

            $this->config->data = ['product_category_id' => $this->product_category_id];
            $this->config->save();
            session()->flash('message', 'Product Cover Saved');
            session()->flash('alert', 'success');
        } catch (\Throwable $th) {
            session()->flash('message', $th);
            session()->flash('alert', 'danger');
        }
    }
    public function render()
    {
        return view('livewire.config.product-cover');
    }
}
