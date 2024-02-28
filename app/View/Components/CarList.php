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
    public $passengers;

    public function __construct($cars, $startDate, $endDate, $passengers)
    {
        $this->cars = $cars;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->passengers = $passengers;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.car-list');
    }
}
