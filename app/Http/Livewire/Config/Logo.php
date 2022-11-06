<?php

namespace App\Http\Livewire\Config;

use App\Models\Config;
use Livewire\Component;
use Livewire\WithFileUploads;

class Logo extends Component
{
    use WithFileUploads;
    public $title;
    public $image;
    public $showImage;
    public $logoConfig;
    public $imageUrl;
    
    public function mount()
    {
        $this->logoConfig = Config::getConfig('logo', ['title'=>'','image'=>'']);
        if(!empty($this->logoConfig->data['title'])){
            $this->title = $this->logoConfig->data['title'];
        }
        if(!empty($this->logoConfig->data['image'])){
            $this->image = $this->logoConfig->data['image'];
        }
        if(!empty($this->logoConfig->data['showImage'])){
            $this->showImage = $this->logoConfig->data['showImage'];
        }
    }

    public function updatedImage()
    {
        $this->imageUrl = '';
        $this->validate([
            'image' => 'image|max:1024',
        ]);
        $this->imageUrl = $this->image->temporaryUrl();
    }

    public function render()
    {
        return view('livewire.config.logo');
    }
    public function save()
    {
        $this->validate([
            'title' => 'required',
        ]);
        $logoConfig = Config::firstWhere('name', 'logo');
        try {
            if(!empty($this->imageUrl)){
                $image = $this->image->store('config/logo');
            }else{
                $image = $this->image;
            }
            $logoConfig->data = [
                'title' => $this->title,
                'image' => $image,
                'showImage' => $this->showImage
            ];
            $logoConfig->save();
            session()->flash('message','Logo Saved');
            session()->flash('alert','success');
        } catch (\Throwable $th) {
            session()->flash('message',$th);
            session()->flash('alert','danger');
        }
    }
}
