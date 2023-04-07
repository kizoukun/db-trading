<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class Sidebar extends Component
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
        $user_bank_list = DB::select("SELECT ubl.*, bl.name, bl.code as bank_code FROM users_bank_list ubl JOIN bank_list bl ON bl.id = ubl.bank_id WHERE ubl.user_id = ?", [auth()->id()]);
        return view('components.app.sidebar', ["user_bank_list" => $user_bank_list]);
    }
}
