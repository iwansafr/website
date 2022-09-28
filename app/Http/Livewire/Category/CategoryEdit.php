<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryEdit extends Component
{
    protected $listeners = ['initSetEditData'];
    public $title;
    public $categoryId;
    public $link;
    public $parent;
    public $categoryParent;
    public $order;
    public $slug;
    
    public function getParent()
    {
        $this->categoryParent = [];
        if ($this->categoryId > 0) {
            $categoryParent = Category::where('parent',null)->whereNot('id',$this->categoryId)->get();
        }else{
            $categoryParent = Category::where('parent',null)->get();
        }
        foreach ($categoryParent as $item) {
            $this->categoryParent[$item->id] = $item->title;
        }
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|unique:categories,title,'.$this->categoryId,
            'slug' => 'required',
        ]);

        try {
            if($this->categoryId > 0){
                $category = Category::find($this->categoryId);
            }else{
                $category = new Category();
            }
    
            $category->title            = $this->title;
            $category->parent           = $this->parent;
            $category->slug             = $this->slug;
            if($category->save()){
                session()->flash('alert','success');
                session()->flash('msg',__('Category Berhasil disimpan'));
                if (empty($this->categoryId)) {
                    $this->reset();
                }
                $this->emit('refreshDataList');
            }
        } catch (\Throwable $th) {
            session()->flash('alert','danger');
            session()->flash('msg',$th);
        }
    }
    public function clear()
    {
        $this->reset();
        $this->categoryId  = 0;
    }
    public function initSetEditData($data)
    {
        $this->categoryId = $data['dataId'];
        if ($this->categoryId > 0) {
            $category     = Category::find($this->categoryId);
            $this->title  = $category->title;
            $this->parent = $category->parent;
            $this->slug   = $category->slug;
        }
    }
    public function render()
    {
        $this->getParent();
        $this->setSlug();
        return view('livewire.category.category-edit');
    }
    public function setSlug()
    {
        $title = $this->title;
        $slug = strtolower(str_replace(' ','-',$title));
        if (empty($this->categoryId)) {
            $slugCount = Category::where('slug', $slug)->count('id');
        }else{
            $slugCount = Category::where('slug', $slug)->whereNot('id', $this->categoryId)->count('id');
        }
        $numberSlug = '';
        if($slugCount > 0){
            $slugCount++;
            $numberSlug = $slugCount;
        }
        $this->slug = $slug.$numberSlug;
    }
}
