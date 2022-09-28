<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryDelete extends Component
{
    protected $listeners = ['initSetDeleteData'];
    public $categoryId;
    public $title;
    public function render()
    {
        if (!empty($this->categoryId)) {
            $menu = Category::find($this->categoryId);
            $this->title = $menu->title;
        }
        return view('livewire.category.category-delete');
    }
    public function initSetDeleteData($data)
    {
        $this->categoryId = $data['dataId'];
    }
    public function delete()
    {
        Category::find($this->categoryId)->delete();
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
