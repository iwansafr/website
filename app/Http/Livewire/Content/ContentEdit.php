<?php

namespace App\Http\Livewire\Content;

use App\Models\Category;
use App\Models\Content;
use Livewire\Component;

class ContentEdit extends Component
{
    public $title;
    public $slug;
    public $content;
    public $categoryList;
    public $categories;
    public $publish = 1;
    protected $rules = [
        'title' => 'required'
    ];

    public function mount()
    {
        $this->categoryList = Category::with('parentCategory')->get();
    }

    public function render()
    {
        $this->setSlug();
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
        $this->validate([
            'title' => 'required'
        ]);
        $content = new Content();
        $content->title = $this->title;
        $content->slug = $this->slug;
        $content->content = $this->content;
        $content->publish = $this->publish;
        if($content->save()){
            session()->flash('message','content berhasil disimpan');
            session()->flash('alert','success');
        }
        if(!empty($this->categories))
        {
            $categories = [];
            foreach ($this->categories as $key => $value) {
                $categories[] = $key;
            }
            $content->categories()->sync($categories);
        }
    }
    public function setSlug()
    {
        $title = $this->title;
        $slug = strtolower(str_replace(' ','-',$title));
        if (empty($this->contentId)) {
            $slugCount = Content::where('slug', $slug)->count('id');
        }else{
            $slugCount = Content::where('slug', $slug)->whereNot('id', $this->contentId)->count('id');
        }
        $numberSlug = '';
        if($slugCount > 0){
            $slugCount++;
            $numberSlug = $slugCount;
        }
        $this->slug = $slug.$numberSlug;
    }
}