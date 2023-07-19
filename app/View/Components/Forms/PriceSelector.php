<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class PriceSelector extends Component
{
    /**
     * The max-price.
     *
     * @var string
     */
    public $maxPrice;

    /**
     * The page.
     *
     * @var string
     */
    public $page;

    /**
     * The page.
     *
     * @var string
     */
    public $parentClass;

    /**
     * The page.
     *
     * @var bool
     */
    public $hasLabel;
    
    /**
     * Create a new component instance.
     *
     * @param  string  $maxPrice
     * @param  string  $page
     * @return void
     */
    public function __construct($maxPrice, $page, $parentClass = '', $hasLabel = true)
    {
        //
        $this->maxPrice = $maxPrice;
        $this->page = $page;
        $this->parentClass = $parentClass;
        $this->hasLabel = $hasLabel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.price-selector');
    }
}
