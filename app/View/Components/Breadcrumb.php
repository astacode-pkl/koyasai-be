<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $currentUrl;
    public $urls;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $urls = explode("/", url()->current());
        $urls = array_slice($urls, 3);
        $urls = str_replace('-', ' ', $urls);
        $currentUrl = end($urls);
        $this->urls = $urls;
        $this->currentUrl = $currentUrl;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrumb');
    }
}
