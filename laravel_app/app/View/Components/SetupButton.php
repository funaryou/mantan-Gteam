<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SetupButton extends Component
{
    public $items;
    public $type;
    public $checked;
    /**
     * Create a new component instance.
     */
    public function __construct($items, $type, $checked)
    {
        $this->items = $items;
        $this->type = $type;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.setup-button', [
            'items' => $this->items,
            'type' => $this->type,
            'checked' => $this->checked,
        ]);
    }
}
