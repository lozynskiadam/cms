<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tabs extends Component
{
    protected static $tabs = [];

    public static function push(array $tab): void
    {
        Tabs::$tabs[] = $tab;
    }

    public static function pull(): array
    {
        $tabs = Tabs::$tabs;
        Tabs::$tabs = [];

        return $tabs;
    }

    public function __construct(public ?int $size = null)
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.tabs');
    }
}
