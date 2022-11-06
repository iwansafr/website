<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProductEdit extends Component
{
    public $title;
    public $price;
    public $slug;
    public $description = '';
    public $categoryList;
    public $categories;
    public $allCategories;
    public $searchCategory;
    public $productId;
    public $dataContent;
    public $publish = 1;
    protected $rules = [
        'title' => 'required'
    ];

    public function mount()
    {
        $dataContent = Product::find($this->productId);
        if(!empty($dataContent)){
            $this->title = $dataContent->title;
            $this->price = $dataContent->price;
            $this->slug = $dataContent->slug;
            $this->description = $dataContent->description;
            foreach ($dataContent->categories as $item) {
                $this->categories[$item->id] = $item->title;
            }
        }
        $this->allCategories = ProductCategory::with('parentCategory')->get(); 
        $this->categoryList = $this->allCategories;
    }

    public function render()
    {
        $this->setSlug();
        $this->searchCategory();
        return view('livewire.product.product-edit');
    }
    public function searchCategory()
    {
        if(!empty($this->searchCategory)){
            $categoryList = collect();
            $categoryList = $this->categoryList->filter(function($value, $key){
                return preg_match('~'.$this->searchCategory.'~',$value);
            });
            $this->categoryList = $categoryList;
        }else{
            $this->categoryList = $this->allCategories;
        }
    }
    public function setCategories($id)
    {
        $this->categories[$id] = $this->categoryList->find($id)->title;
    }
    public function removeCategories($id)
    {
        unset($this->categories[$id]);
    }
    public function save()
    {
        $this->validate([
            'title' => 'required',
            'price' => 'required'
        ]);
        try {
            DB::transaction(function(){
                if (!empty($this->productId)) {
                    $product = Product::find($this->productId);
                }else{
                    $product = new Product();
                }
                $product->title = $this->title;
                $product->price = $this->price;
                $product->slug = $this->slug;
                $product->description = $this->description;
                $product->publish = $this->publish;
                if($product->save()){
                    session()->flash('message','product berhasil disimpan');
                    session()->flash('alert','success');
                }
                if(!empty($this->categories))
                {
                    $categories = [];
                    foreach ($this->categories as $key => $value) {
                        $categories[] = $key;
                    }
                    $product->categories()->sync($categories);
                }
            });
        } catch (\Throwable $th) {
            session()->flash('message',$th->getMessage());
            session()->flash('alert','danger');
        }
        
    }
    public function setSlug()
    {
        $title = $this->title;
        $slug = strtolower(str_replace(' ','-',$title));
        if (empty($this->productId)) {
            $slugCount = Product::where('slug', $slug)->count('id');
        }else{
            $slugCount = Product::where('slug', $slug)->whereNot('id', $this->productId)->count('id');
        }
        $numberSlug = '';
        if($slugCount > 0){
            $slugCount++;
            $numberSlug = $slugCount;
        }
        $this->slug = $slug.$numberSlug;
    }
}
