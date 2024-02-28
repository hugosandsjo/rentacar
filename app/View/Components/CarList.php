<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CarList extends Component
{
    public $cars;
    public $startDate;
    public $endDate;
    public $passangers;

    public function __construct($cars, $startDate, $endDate, $passangers)
    {
        $this->cars = $cars;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->passangers = $passangers;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.car-list');
    }
}
