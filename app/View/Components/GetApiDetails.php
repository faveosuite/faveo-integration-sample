<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GetApiDetails extends Component
{
    public $name;
    public $description;
    public $endpoint;
    public $method;
    public $parameters;

    public function __construct($name, $description, $endpoint, $method,$parameters)
    {
        $this->name = $name;
        $this->description = $description;
        $this->endpoint = $endpoint;
        $this->method = $method;
        $this->parameters = $parameters;
    }
    public function render(): View|Closure|string
    {
        return view('components.get-api-details');
    }
}
