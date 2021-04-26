<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Inputs extends Component
{
    public $for;
    public $type;
    public $label;
    public $placeholder;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($for, $type, $label, $placeholder)
    {
        $this->for = $for;
        $this->type = $type;
        $this->label = $label;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.inputs');
    }
}
