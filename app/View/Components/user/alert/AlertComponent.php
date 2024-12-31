<?php

namespace App\View\Components\user\alert;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AlertComponent extends Component
{
    // Public properties
    public $type;
    public $message;

    /**
     * Create a new component instance.
     */
    public function __construct($type="info", $message=null)
    {
        $this->type = $type;
        $this->message = $message;
    }

    // Render if has message
    public function hasMessage()
    {
        return $this->message !== null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.alert.alert-component');
    }
}
