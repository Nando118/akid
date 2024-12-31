<?php

namespace App\View\Components\user\auth\forget_password;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalForgetPasswordComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.auth.forget_password.modal-forget-password-component');
    }
}
