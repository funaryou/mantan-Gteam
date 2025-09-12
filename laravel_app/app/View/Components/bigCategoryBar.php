<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BigCategoryBar extends Component
{
    /**
     * The big categories collection.
     *
     * @var \Illuminate\Database\Eloquent\Collection
     */
    public $bigCategories;

    /**
     * The selected big category ID.
     *
     * @var int
     */
    public $selectBigCategoryId;
    
    /**
     * Create a new component instance.
     *
     * @param  \Illuminate\Database\Eloquent\Collection  $bigCategories
     * @param  int  $selectBigCategoryId
     * @return void
     */
    public function __construct($bigCategories = null, $selectBigCategoryId = 0)
    {
        $this->bigCategories = $bigCategories ?: collect();
        $this->selectBigCategoryId = (int)$selectBigCategoryId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.big-category-bar', [
            'bigCategories' => $this->bigCategories,
            'selectBigCategoryId' => $this->selectBigCategoryId
        ]);
    }
}