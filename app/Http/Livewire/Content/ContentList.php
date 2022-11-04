<?php

namespace App\Http\Livewire\Content;

use App\Models\Content;
use Livewire\Component;
use Livewire\WithPagination;

class ContentList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refreshDataList'=>'$refresh'];
    public $title;
    public $search;
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $dataContent = Content::where('title','like','%'.$this->search.'%')->paginate(12);
        return view('livewire.content.content-list',compact('dataContent'));
    }
    public function setEdit($id)
    {
        $this->emit('initSetEditData',['dataId'=>$id]);
    }
    public function setDelete($id)
    {
        $this->emit('initSetDeleteData', ['dataId'=>$id]);
    }
}
