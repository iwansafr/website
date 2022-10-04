<?php

namespace App\Http\Livewire\Content;

use App\Models\Category;
use Livewire\Component;

class ContentEdit extends Component
{
    public $title;
    public $content;
    public $categoryList;
    protected $rules = [
        'title' => 'required'
    ];

    public function mount()
    {
        $this->categoryList = Category::with('parentCategory')->limit(12)->get();
    }

    public function render()
    {
        return view('livewire.content.content-edit');
    }
    public function save()
    {

    }
}
