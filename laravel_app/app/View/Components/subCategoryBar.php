<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class subCategoryBar extends Component
{
    /**
     * The sub categories collection.
     *
     * @var \Illuminate\Database\Eloquent\Collection
     */
    public $subCategories;
    /**
     * The selected sub category ID.
     *
     * @var int
     */
    public $selectSubCategoryId;
    /**
     * Create a new component instance.
     */
    public function __construct($subCategories = null, $selectSubCategoryId = 0)
    {
        $this->subCategories = $subCategories ?: collect();  
        $this->selectSubCategoryId = (int)$selectSubCategoryId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sub-category-bar', [
            'subCategories' => $this->subCategories,
            'selectSubCategoryId' => $this->selectSubCategoryId
        ]);
    }   
}
