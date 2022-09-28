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
    
    public function mount()
    {
        $categoryParent = Category::where('parent',null)->get();
        foreach ($categoryParent as $item) {
            $this->categoryParent[$item->id] = $item->title;
        }
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|unique:menus,title,'.$this->categoryId,
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
        $this->categoryId = $data['categoryId'];
        if ($this->categoryId > 0) {
            $category     = Category::find($this->categoryId);
            $this->title  = $category->title;
            $this->parent = $category->parent;
            $this->slug   = $category->slug;
        }
    }
    public function render()
    {
        $this->setSlug();
        return view('livewire.category.category-edit');
    }
    public function setSlug()
    {
        $title = $this->title;
        $slug = strtolower(str_replace(' ','-',$title));
        $slugCount = Category::where('slug', $slug)->count('id');
        $numberSlug = '';
        if($slugCount > 0){
            $slugCount++;
            $numberSlug = $slugCount;
        }
        $this->slug = $slug.$numberSlug;
    }
}
