<?php

namespace App\Http\Livewire\Content;

use App\Models\Category;
use Livewire\Component;

class ContentEdit extends Component
{
    public $title;
    public $content;
    public $categoryList;
    public $categories;
    protected $rules = [
        'title' => 'required'
    ];

    public function mount()
    {
        $this->categoryList = Category::with('parentCategory')->get();
    }

    public function render()
    {
        return view('livewire.content.content-edit');
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

    }
}
