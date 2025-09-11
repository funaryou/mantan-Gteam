<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryImageBlock extends Component
{
    /**
     * Create a new component instance.
     */
    public $items;
    public $fs;
    public function __construct($items,$fs)
    {
        $this->items = $items;
        $this->fs = $fs;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-image-block');
    }
}
