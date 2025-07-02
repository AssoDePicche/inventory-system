<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $name;
    public $value;
    public $placeholder;
    public $rows;
    public $cols;

    public function __construct($name, $value = '', $placeholder = '', $rows = 4, $cols = 50)
    {
        $this->name = $name;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->rows = $rows;
        $this->cols = $cols;
    }

    public function render()
    {
        return view('components.textarea');
    }
}
