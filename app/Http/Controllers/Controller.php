<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function buildFailedValidationResponse(Request $request, array $errors)
    {
        if ($request->expectsJson()) {
            foreach ($errors as $key => $error) {
                $errors[$key] = array_first($error);
            }
            return $errors;
        }
    }
}
