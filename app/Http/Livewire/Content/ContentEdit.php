<?php

namespace App\Http\Livewire\Content;

use Livewire\Component;

class ContentEdit extends Component
{
    public $title;
    public $content;
    protected $rules = [
        'title' => 'required'
    ];
    public function render()
    {
        return view('livewire.content.content-edit');
    }
    public function save()
    {

    }
}
