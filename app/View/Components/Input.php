<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $placeholder;
    public $type;
    public $value;

    public function __construct($name, $placeholder = null, $type = 'text', $value = null)
    {
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->type = $type;
        $this->value = old($name, $value); // Fetch old value or default to provided value
    }

    public function render()
    {
        return view('components.input');
    }
}
