<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct() {
        $this->middleware(function($request, $next) {
            if(session("toast_error") != null) {
                toast(session("toast_error"), "error");
            } else if(session("toast_success") != null) {
                toast(session("toast_success"), "success");
            }
            return $next($request);
        });
    }
}
