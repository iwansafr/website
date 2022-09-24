<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Multiselect extends Component
{
    public $name;
    public $label;
    public $options;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name = '', $label = '', $options = [])
    {
        $this->name = $name;
        $this->options = $options;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.multiselect');
    }
}
